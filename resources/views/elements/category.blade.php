
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
            <ul class="category-list navbar-nav">
                @foreach($categories as $category)
                    <li class="category-item nav-item">
                        <a class="category-link" href="">
                            <span class="category-name">{{ $category }}</span>
                            <span class="category-count">508</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
