@extends('layouts.main')
@section('content')

<div>
  <form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="form-group mb-3">
      <label for="title">title</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="title">
    </div>
    <div class="form-group mb-3">
      <label for="content">content</label>
      <textarea class="form-control" name="content" id="content" placeholder="content"></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="image">image</label>
      <input type="text" class="form-control" name="image" id="image" placeholder="image">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
  </form>
</div>
@endsection