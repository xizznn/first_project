@extends('layouts.main')

@section('content')
<div>
  <a href="{{ route('post.create') }}" class="btn btn-primary mt-3 mb-3">Добавить</a>
</div>
@foreach ($posts as $post)
<div>
  <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
</div>
@endforeach

<div class="mt-3">
  {{ $posts->withQueryString()->links() }}
</div>

@endsection