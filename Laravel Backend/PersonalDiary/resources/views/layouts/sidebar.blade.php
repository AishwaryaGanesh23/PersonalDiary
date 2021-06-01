@section('navigation')
<div class="sidebar" id="mysidebar">
    <a class="side_accordian" id="posts" href="{{ route('posts.index') }}"> Posts </a>
    
    <a class="side_accordian" href="{{ route('posts.index') }}">To Do List</a>

    <a href="" class="side_accordian">Calendar</a> 
</div>
@endsection