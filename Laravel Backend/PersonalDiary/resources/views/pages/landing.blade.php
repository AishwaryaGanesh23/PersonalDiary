@extends('layouts.pagelayout')
@section('content')
        <div id="mainindexbody">
        <img class="images1" src="{{ URL::to('/pics/image2.png') }}" style="position: absolute; top: -40px; right: 35px;">
	<img class="images1" src="{{ URL::to('/pics/image3.png') }}" style="position: absolute; top: 300px; left: 37px;">

			<div class="content1">
				<h1 style="font-size: 130px; font-family: 'Playfair Display', Serif; text-align: center;">PERSONAL DIARY</h1>
			</div>
			
		</div>
        </div>
@endsection