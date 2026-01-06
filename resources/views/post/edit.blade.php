@extends('layouts.main')
@section('content')

<div>
  <form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="form-group mb-3">
      <label for="title">title</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $post->title }}">
    </div>
    <div class="form-group mb-3">
      <label for="content">content</label>
      <textarea class="form-control" name="content" id="content" placeholder="content">{{ $post->title }}</textarea>
    </div>
    <div class="form-group mb-3">
      <label for="image">image</label>
      <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{ $post->title }}">
    </div>
    <button type=" submit" class="btn btn-primary">Обновить</button>
  </form>
</div>
@endsection