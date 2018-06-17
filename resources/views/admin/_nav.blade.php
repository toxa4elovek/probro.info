<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Доска</a></li>
    @can ('admin-panel')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'category' ? ' active' : '' }}" href="{{ route('admin.category.index') }}">Категории</a>
        </li>
    @endcan
    @can ('admin-panel')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'user' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link{{ $page === 'post' ? ' active' : '' }}" href="{{ route('admin.posts.index') }}">Посты</a>
    </li>

</ul>