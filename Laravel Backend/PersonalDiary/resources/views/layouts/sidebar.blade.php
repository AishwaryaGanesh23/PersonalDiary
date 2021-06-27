@section('navigation')
<div class="sidebar" id="mysidebar">
    <a  id="posts" href="{{ route('posts.index') }}"><i class="fa fa-address-card-o"></i>&nbsp; Posts </a>
    
    <a  href="{{ route('tasks.index') }}"><i class="fa fa-edit"></i>&nbsp;Tasks</a>

    <a href="{{ route('calendar.index') }}" ><i class="fa fa-calendar-check-o"></i>&nbsp;Events</a> 
    <!-- <h4 id="sidedate">{{ date("Y-m-d H:i T") }} </h4> -->
</div>
@endsection