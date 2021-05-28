@extends('layouts.pagelayout')
@section('content')
        <div id="mainindexbody">
        <img class="images" src="{{ URL::to('/pics/image2.png') }}" style="position: absolute;  left: 78%; top: 10vh;">
	<img class="images" src="{{ URL::to('/pics/image3.png') }}" style="position: absolute; top: 62vh; left: 2%;">

			<div class="content">
				<h1 style="font-size: 125px; font-family: 'Playfair Display', Serif; text-align: center;">PERSONAL DIARY</h1>
			</div>
			
		</div>
        </div>
@endsection