
<div class="col-md-4">
    <div class="category-block">
        <div class="category-block-header">
            <button class="navbar-toggler disabled" type="button"
                    data-toggle="collapse"
                    data-target="#navbarCategoryContent"
                    aria-controls="navbarCategoryContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span>Каталог тем</span>
            </button>
            <span class="show">Каталог тем</span>
        </div>


        <div class="category-block-content collapse navbar-collapse" id="navbarCategoryContent">
            @if(count($categories) > 0)
            <ul class="category-list navbar-nav">
                @foreach($categories as $category)
                    <li class="category-item nav-item">
                        <a class="category-link" href="{{ route('category', $category) }}">
                            <span class="category-name">{{ $category->name }}</span>
                            <span class="category-count">{{ $category->posts->count() }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @else
                <ul class="category-list navbar-nav">
                    <li class="category-item nav-item">
                        <a class="category-link" href="{{ route('home') }}">
                            Домой
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
