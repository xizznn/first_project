@extends('layouts.main')

@section('content')

<div>
  <div>{{ $post->id }}. {{ $post->title }}</div>
  <div>{{ $post->content }}</div>
  <div>
    <a href="{{ route('post.edit', $post->id) }}">Обновить</a>
  </div>
  <div>
    <form action="{{ route('post.delete', $post->id) }}" method="post">
      @csrf
      @method('delete')
      <input type="submit" value="Удалить" class="btn btn-danger">
    </form>
  </div>
</div>
<div>
  <a href="{{ route('post.index') }}">Вернуться</a>
</div>

@endsection