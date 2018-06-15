<div class="col-md-4">
    <div class="tab-block-left nav flex-column nav-pills" aria-orientation="vertical">
        <a class="tab-link nav-link {{ $page === 'profile' ? 'active' : '' }}"
           href="{{ route('cabinet.profile')  }}">Профиль</a>
        <a class="tab-link nav-link {{ $page === 'posts' ? 'active' : '' }}"
           href="{{ route('cabinet.post.index') }}">Посты</a>
    </div>
</div>