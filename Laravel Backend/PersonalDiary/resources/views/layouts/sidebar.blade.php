@section('navigation')
<div class="sidebar" id="mysidebar">
    <a  id="posts" href="{{ route('posts.index') }}"><i class="fa fa-address-card-o"></i>&nbsp; Posts </a>
    
    <a  href="{{ route('tasks.index') }}"><i class="fa fa-edit"></i>&nbsp;To Do List</a>

    <a href="{{ route('calendarEvents.index') }}" ><i class="fa fa-calendar"></i>&nbsp;Calendar</a> 
</div>
@endsection