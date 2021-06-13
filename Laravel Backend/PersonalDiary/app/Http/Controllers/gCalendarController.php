<?php

namespace App\Http\Controllers;
use DateTime;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class gCalendarController extends Controller
{

    protected $client;

    public function __construct()
    {
        $this->middleware('auth');
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
        date_default_timezone_set('Asia/Kolkata');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $optParams = array(
                // 'maxResults' => 10,
                'singleEvents' => true,
                'orderBy' => 'startTime',  
                // 'sortOrder'=>'descending',              
              );
            $results = $service->events->listEvents($calendarId,$optParams);
            // return $results->getItems();
            // return view('calendar.index');
            $events = $results->getItems();
            // $eventsnewtofirst=  array_reverse($events);
            return view('calendar.index')->with('events',$events);

        } else {
            return redirect()->route('oauthCallback');
        }
    }


    public function events_raw_data()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            try{
                $this->client->setAccessToken($_SESSION['access_token']);
                $service = new Google_Service_Calendar($this->client);

                $calendarId = 'primary';
                $optParams = array(
                    // 'maxResults' => 10,
                    'singleEvents' => true,
                    'orderBy' => 'startTime',    
                    // 'sortOrder'=>'descending',              
                );
                $results = $service->events->listEvents($calendarId,$optParams);
                return $results->getItems();
            }
            catch (Exception $e)
            {
                return redirect()->route('oauthCallback');
            }
        } else {
            return redirect()->route('oauthCallback');
        }
    }

    

    public function oauth()
    {
        session_start();
        $rurl = action('App\Http\Controllers\gCalendarController@oauth');
        $this->client->setRedirectUri($rurl);

        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('calendar.index');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        session_start();
        $startDateTime = date('Y-m-d').'T'.$request->input('start_time').':00.000+05:30';
        $endDateTime = date('Y-m-d').'T'.$request->input('end_time').':00.000+05:30';

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->input('name'),
                'start' => [
                    'dateTime' => $startDateTime,
                    // 'timeZone' => 'Asia/Kolkata',
                ],
                'end' => [
                    'dateTime' => $endDateTime,
                    // 'timeZone' => 'Asia/Kolkata',
                ],

                'reminders' => ['useDefault' => false],
            ]);
            $results = $service->events->insert($calendarId, $event);
            if (!$results) {
                // return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
                return redirect()->route('calendar.index')->with('error','Event creation failed');
            }
            // return response()->json(['status' => 'success', 'message' => 'Event Created']);
            return redirect()->route('calendar.index')->with('Success','Event created ');
        } else {
            return redirect()->route('oauthCallback');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);
            $event = $service->events->get('primary', $id);

            if (!$event) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            // return response()->json(['status' => 'success', 'data' => $event]);
            return view('calendar.showEvent')->with('event',$event);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $service->events->delete('primary', $id);
            return redirect()->route('calendar.index');
        } else {
            return redirect()->route('oauthCallback');
        }
    }
}
