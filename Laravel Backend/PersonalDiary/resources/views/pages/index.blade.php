@extends('layouts.pagelayout')
@section('content')
        <div id="mainindexbody">
        <img class="images" src="{{ URL::to('/pics/image2.png') }}" style="position: absolute; top: -40px; right: 35px;">
	<img class="images" src="{{ URL::to('/pics/image3.png') }}" style="position: absolute; top: 350px; left: 35px;">

			<div class="content">
				<h1 style="font-size: 130px; font-family: 'Playfair Display', Serif; text-align: center;">PERSONAL DIARY</h1>
			</div>
			
		</div>
        </div>
@endsection