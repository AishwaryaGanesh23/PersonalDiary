@section('navigation')
<div class="sidebar" id="mysidebar">
    <a  id="posts" href="{{ route('posts.index') }}"><i class="fa fa-address-card-o"></i>&nbsp; Posts </a>
    
    <a  href="{{ route('tasks.index') }}"><i class="fa fa-edit"></i>&nbsp;To Do List</a>

    <a href="{{ route('calendar.index') }}" ><i class="fa fa-calendar"></i>&nbsp;Calendar</a> 
    @php
        date_default_timezone_set('Asia/Kolkata');
    @endphp
    <h4 style=" position: fixed; bottom: 2px; color: white; font-size: 15px; text-align: center">{{ date("Y-m-d H:i T") }} </h4>
</div>
@endsection