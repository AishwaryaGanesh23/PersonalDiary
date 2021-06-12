@section('navigation')
<div class="sidebar" id="mysidebar">
    <a  id="posts" href="{{ route('posts.index') }}"><i class="fa fa-address-card-o"></i>&nbsp; Posts </a>
    
    <a  href="{{ route('tasks.index') }}"><i class="fa fa-edit"></i>&nbsp;To Do List</a>

    <a href="{{ route('calendar.index') }}" ><i class="fa fa-calendar"></i>&nbsp;Calendar</a> 
    @php
        date_default_timezone_set('Asia/Kolkata');
    @endphp
    <a>{{ date("Y-m-d H:i T") }}</a>
</div>
@endsection