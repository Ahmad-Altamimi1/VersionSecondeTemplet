<div class="row">
    @foreach ($posts_thumbs as $posts_thumb)
    <div class="col-sm-4 pt-3">
            <div class="post post-grid rounded bordered">
                <div class="thumb top-rounded">

                                    <a href="/tags/{{ $posts_thumb->id }}/show"
                                        class="category-badge position-absolute">{{ $posts_thumb->TITLE }}</a>

                    <a href="/posts/{{ $posts_thumb->id }}/show">
                        <div style="text-align: center;" class="inner">
                            <img style="height: 250px ;aspect-ratio: 2;"
                                src="{{ asset('storage/' . $posts_thumb->IMG . '') }}"
                                alt="{{ $posts_thumb->TITLE }}" />
                        </div>
                    </a>
                </div>
                <div class="details">
                    <h5 class="post-title mb-3 mt-3"><a
                            href="/posts/{{ $posts_thumb->id }}/show">{{ Str::limit($posts_thumb->TITLE, 60) }}</a>
                    </h5>
                    <p class="excerpt mb-0">
                        {{ Str::limit($posts_thumb->DESCRIPTION, 150) }}</p>
                </div>
                <div
                    class="post-bottom clearfix d-flex align-items-center" style="opacity: 0">
                    <div class="social-share me-auto">

                        <ul class="icons list-unstyled list-inline mb-0"> </ul>
                    </div>
                    <div class="more-button float-end">
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    </div>
