<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Доска</a></li>
    @can ('admin-panel')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'category' ? ' active' : '' }}" href="{{ route('admin.category.index') }}">Категории</a>
        </li>
    @endcan

</ul>