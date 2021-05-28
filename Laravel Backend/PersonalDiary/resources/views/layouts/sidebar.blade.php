@section('navigation')
<div class="sidebar" id="mysidebar">
    <a class="side_accordian" id="posts"> Posts &nbsp;<i class="fa fa-chevron-down"></i></a>
        <div class="acc_disp">
            <a href="{{ route('posts.index') }}" id="allPosts">All Posts</a>
            <a href="{{ route('posts.create') }}" id="newPost">New Post</a> 
        </div> 
    <a href="">To Do List</a>

    <a href="">Calendar</a> 
</div>
@endsection