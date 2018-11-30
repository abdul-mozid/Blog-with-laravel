<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{Request::is('admin/dashboard*')?'active':''}}">
            <a href="{{route('admin.dashboard')}}">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li class="{{Request::is('admin/tag*')?'active':''}}">
            <a href="{{route('admin.tag.index')}}">
                <i class="material-icons">tag</i>
                <span>TAG</span>
            </a>
        </li>
        <li class="{{Request::is('admin/category*')?'active':''}}">
            <a href="{{route('admin.category.index')}}">
                <i class="material-icons">list</i>
                <span>Category</span>
            </a>
        </li>
        <li class="{{Request::is('admin/post*')?'active':''}}">
            <a href="{{route('admin.post.index')}}">
                <i class="material-icons">view_module</i>
                <span>Post</span>
            </a>
        </li>
    </ul>
</div>