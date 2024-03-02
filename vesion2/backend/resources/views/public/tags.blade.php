@extends('layouts.welcome')

@section('content')
<style>
    .page-header{
        direction: rtl;
    }
</style>
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{ $tagbyid->TITLE }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">

                        {{-- <li class="breadcrumb-item"></li> --}}
                        {{-- <li class="breadcrumb-item active" aria-current="page"> <a href=""></a>{{ $tagbyid->TITLE }} --}}
                            <a href="{{route('home')}}">طبكم</a>
                        @foreach ($otherIds as $stag)

                        @foreach ($tags as $singletag)
                        @if ($stag == $singletag->id  )
                         <a href="{{ route('tagbyid', ['id' => $singletag->id])  }}"
>  {{  '/'. $singletag->TITLE  }}</a>

                        @endif
                        @endforeach
                        @endforeach
                        <a href="{{ route('tagbyid', ['id' => $tagbyid->id])  }}"
                         >  {{  '/'. $tagbyid->TITLE  }}</a>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <section style="text-align: right;" class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-12">

                    <div class="row gy-4">
                        <?php
                        $blognum = 6;
                        $xx = 0;
                        $large = 0;
                        $first = ($nm-1) * $blognum;
                        $last = $first + $blognum;
                        ?>
                        @foreach ($postintag as $singlepost)
                            @if ($first <= $xx && $xx < $last)
                                <div class="col-sm-4">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered">
                                        <div class="thumb top-rounded">
                                            <a href="/tags/{{ $singlepost->TAG }}/show"
                                                class="category-badge position-absolute">
                                                @foreach ($tags as $singletag)
                                                    @if ($singletag->id == $singlepost->TOPIC)
                                                        {{ $singlepost->tag->TITLE }}
                                                    @endif
                                                @endforeach
                                            </a>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div style="text-align: center;" class="inner">
                                                    <img style="height: 250px" src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">
                                                    {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a
                                                    href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                            </h5>
                                            <p class="excerpt mb-0"><?php echo mb_substr($singlepost->DESCRIPTION, 0, 120); ?> ...</p>
                                        </div>

                                    </div>
                                </div>
                            @elseif ($xx <= $last+1)
                                <?php
                                $large = 1;
                                ?>
                            @endif
                            <?php
                            $xx++;
                            ?>
                        @endforeach

                    </div>

                    @if ($large)
                        <nav>
                            <ul class="pagination justify-content-center">
                                @if ($nm != 1)
                                    <li class="page-item"><a class="page-link"
                                            href="/tags/{{ $tagbyid->id }}/show/<?php echo $nm - 1; ?>"><?php echo $nm - 1; ?></a>
                                    </li>
                                @endif


                                <li class="page-item active" aria-current="page">
                                    <span class="page-link"><?php echo $nm; ?></span>
                                </li>
                                <?php

                                // $wordCount = $wordCount - 6;
                                ?>
                                <?php
                                $nextPage = $nm + 1;
                                ?>
                                @if ($wordCount > 0)
                                    <li class="page-item"><a class="page-link"
                                            href="/tags/{{ $tagbyid->id }}/show/<?php echo $nm + 1; ?>"><?php echo $nm + 1; ?></a>
                                    </li>
                                @endif
                                <?php
                                $wordCount = $wordCount - 6;
                                ?>
                                @if ($wordCount > 0)
                                    <li class="page-item"><a class="page-link"
                                            href="/tags/{{ $tagbyid->id }}/show/<?php echo $nm + 2; ?>"><?php echo $nm + 2; ?></a>
                                    </li>
                                @endif
                                <?php
                                $wordCount = $wordCount - 6;
                                ?>
                                @if ($wordCount > 0)
                                    <li class="page-item"><a class="page-link"
                                            href="/tags/{{ $tagbyid->id }}/show/<?php echo $nm + 3; ?>"><?php echo $nm + 3; ?></a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif


                </div>

            </div>

        </div>
    </section>



@endsection
