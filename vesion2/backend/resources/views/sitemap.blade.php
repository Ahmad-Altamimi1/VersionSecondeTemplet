<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
    xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1</priority>
    </url>

    @foreach ($posts as $post)
        @if (isset($post->VID))
            <url>
                <loc>{{ url('/') }}/videos/{{ $post->id }}/show</loc>
                <priority>0.5</priority>
                <video:video>
                    <video:thumbnail_loc>{{ asset('storage/' . $post->IMG . '') }}</video:thumbnail_loc>
                    <video:title>{{ $post->TITLE }}</video:title>
                    <video:publication_date>{{ \Carbon\Carbon::parse($post->DATE_SCHEDULER)->format('Y-m-d') }}</video:publication_date>
                    <video:description>
                        {{ $post->DESCRIPTION }}                    </video:description>
                    <video:player_loc>
                        https://www.youtube.com/embed/{{ $post->VID }}
                    </video:player_loc>
                </video:video>
            </url>
        @else
            <url>
                <loc>{{ url('/') }}/posts/{{ $post->id }}/show</loc>
                <priority>0.5</priority>
                <news:news>
                    <news:publication>
                        <news:name>{{ $post->TITLE }}</news:name>
                        <news:language>en</news:language>
                    </news:publication>
                    <news:publication_date>{{ \Carbon\Carbon::parse($post->DATE_SCHEDULER)->format('Y-m-d') }}</news:publication_date>
                    <news:title>{{ $post->TITLE }}</news:title>
                </news:news>
            </url>
        @endif
    @endforeach
    <!-- Next we add video extension tags -->



</urlset>
