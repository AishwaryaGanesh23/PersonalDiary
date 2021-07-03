@extends('layouts.pagelayout')

@section('content')
	@guest
		
	@else
		@include('layouts.sidebar')
		
		@section('breadcrumb')
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				<a href="/home" class="breadcrumb-item">Home</a>
				<a class="breadcrumb-item active">About</a>
				
				</ol>
			</nav>
		@endsection
	@endguest

	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-10">
            	<div class="card content2">
                	<!-- <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; " >{{ __('Dashboard') }}</div> -->

        <!-- <div class="content2"> -->
					<h1 style="font-family: Georgia, Serif; text-align: center;">PERSONAL DIARY</h1>
						<h3 style="font-family: Georgia, Serif;">You can record special events.</h3> 
						<p style="font-family: Georgia, Serif;">
							People take photos so they can remember days out, parties, etc. A diary is like a completely personal, 
							written photo, recording the things only you saw in as much or as little detail as you like.
						</p>

						<h3 style="font-family: Georgia, Serif;">Keep your thoughts organized.</h3>
						<p style="font-family: Georgia, Serif;">
							Diaries help us to organize our thoughts and make them apprehensible. 
							You can record daily events, thoughts and feelings about certain experiences or opinions.
						</p>

						<h3 style="font-family: Georgia, Serif;">Set and achieve your goals.</h3>
						<p style="font-family: Georgia, Serif;">
							A diary is a good place to write your goals, ambitions and aspirations. 
							By keeping them in a diary, you can monitor your progress and feel motivated to continue to focus on your next milestone!
						</p>

						<h3 style="font-family: Georgia, Serif;">You can note down important dates or events using the calendar.</h3>
				</div>
			</div>
		</div>

			
	</div>
@endsection