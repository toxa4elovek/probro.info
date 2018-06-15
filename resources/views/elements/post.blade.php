<div class="col-md-8">
    <ul class="post-list">
        <li class="post-block">
            <div class="post-block-header">
                <h3>
                    <a class="post-block-header-link" href="#">{{ $post->title }}</a>
                </h3>
            </div>
            <div class="post-block-content">
                <nav aria-label="post-block-content-breadcrumb breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Категория</a></li>
                        <li class="breadcrumb-item"><a href="#">Категория</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Категория</li>
                    </ol>
                </nav>
                <div class="post-block-content-body">
                    <div class="body-content">
                        <img class="body-img-full rounded float-left img-fluid" src={{ $post->img }} alt="">
                        <p class="body-text text-justify">
                            {{ $post->description }}
                        </p>
                    </div>
                    <div class="statistics clear">
                        <div class="post-statistics">
                            <a href="#" class="fa fa-calendar">
                                <time>{{ $post->published_at }}</time>
                            </a>
                        </div>
                        <div class="post-statistics">
                            <a href="#" class="fa fa-user">
                                <span>{{ $post->owner->name }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>