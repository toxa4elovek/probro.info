<div class="col-md-8">
    <div class="post-item">
        <h2>{{ $post->category->name }}</h2>
    </div>
    <ul class="post-list">
        <li class="post-block">
            <div class="post-block-header">
                <h1 class="post-block-header-link">
                    {{ $post->title }}
                </h1>
            </div>
            <div class="post-block-content">
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