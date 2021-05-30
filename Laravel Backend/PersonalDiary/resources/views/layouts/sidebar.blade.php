@section('navigation')
<div class="sidebar" id="mysidebar">
    <a class="side_accordian" id="posts"> Posts &nbsp;<i class="fa fa-chevron-down"></i></a>
        <div class="acc_disp">
            <a href="{{ route('posts.index') }}" id="allPosts">View All</a>
            <a href="{{ route('posts.create') }}" id="newPost">New Post</a> 
        </div> 
    <a class="side_accordian">To Do List &nbsp;<i class="fa fa-chevron-down"></i></a>
        <div class="acc_disp">
            <a href="{{ route('posts.index') }}" >View All</a>
            <a href="{{ route('posts.create') }}" >New Task</a> 
        </div> 

    <a href="">Calendar</a> 
</div>
@endsection