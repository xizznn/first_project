@extends('layouts.main')
@section('content')

<div>
  <form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="form-group mb-3">
      <label for="title">title</label>
      <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" placeholder="title">
      @error('title')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group mb-3">
      <label for="content">content</label>
      <textarea class="form-control" name="content" id="content" placeholder="content">{{ old('content') }}</textarea>
      @error('content')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group mb-3">
      <label for="image">image</label>
      <input value="{{ old('image') }}" type="text" class="form-control" name="image" id="image" placeholder="image">
      @error('image')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group mb-3">
      <label for="exampleFormControlSelect1">category</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
        @foreach ($categories as $category)
        <option
        {{ old('category_id') == $category->id ? ' selected' : '' }}
        value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect2">tags</label>
      <select multiple class="form-control" id="exampleFormControlSelect2" name="tags[]">
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
  </form>
</div>
@endsection