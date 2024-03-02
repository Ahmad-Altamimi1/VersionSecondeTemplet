

@foreach ($videos as $video)

                                    <div class="post featured-post-xl">
                                        <div class="details clearfix">
                                            {{-- @foreach ($groups as $group)
                                                @if ($group->id == $singlepost->TOPIC)

{{-- @dd( $video->); --}}
                                                        {{-- @if (end($str_arr) == $singletag->id) --}}
                                                        <a href="/tags/{{$video->tag->id}}/show"

                                                                class="category-badge lg">{{ $video->tag->TITLE }}</a>
                                                        {{-- @endif
                                                    @endforeach
                                                @endif
                                            @endforeach --}}

                                            <h4 class="post-title"><a
                                                    href="/videos/{{ $video->id }}/show">{{ $video->TITLE }}</a>
                                            </h4>
                                        </div>
                                        <a href="/videos/{{ $video->id }}/show">
                                            <div class="thumb rounded">
                                                <div class="inner data-bg-image"
                                                    data-bg-image="{{ asset('storage/' . $video->IMG . '') }}"></div>
                                            </div>
                                        </a>
                                    </div>
                                {{-- @endif --}}

                             {{-- @endif --}}
                        @endforeach
