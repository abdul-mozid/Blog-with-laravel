<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{Request::is('author/dashboard')?'active':''}}">
            <a href="{{route('author.dashboard')}}">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li class="{{Request::is('author/post*')?'active':''}}">
            <a href="{{route('author.post.index')}}">
                <i class="material-icons">view_module</i>
                <span>Post</span>
            </a>
        </li>
    </ul>
</div>
