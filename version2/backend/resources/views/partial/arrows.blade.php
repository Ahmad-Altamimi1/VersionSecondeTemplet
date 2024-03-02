@php
 $tagvalue='';   
@endphp
@foreach ($children as $tag)
@if ($group->tags->contains('id', $tag->id))

<span>>{{$tag->TITLE}} </span>

@if($tag->children->isNotEmpty())

@include('partial.arrows', ['children' => $tag->children])

@endif
@endif

@endforeach