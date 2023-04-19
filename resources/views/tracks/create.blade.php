@extends('layouts.app')

@section('page-name', 'Nuova track')

@section('main-content')

<form action="{{ route('tracks.store')}}" method="POST" class="row gy-4 gx-5 ">
  @csrf
  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="title"  class="form-label me-4">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
  </div>

  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="album"  class="form-label me-4">Album</label>
      <input type="text" class="form-control" id="album" name="album">
    </div>
  </div>
  
  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="author"  class="form-label me-4">Author</label>
      <input type="text" class="form-control" id="author" name="author">
    </div>
  </div>

  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="editor"  class="form-label me-4">Editor</label>
      <input type="text" class="form-control" id="editor" name="editor">
    </div>
  </div>

  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="length"  class="form-label me-4">Length</label>
      <input type="text" class="form-control" id="length" name="length">
    </div>
  </div>

  <div class="col-4">
    <div class="input-group flex-nowrap ">
      <label for="poster"  class="form-label me-4">Poster</label>
      <input type="text" class="form-control" id="poster" name="poster">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-outline-success ms-auto">Salva</button>
  </div>

  
  
   
  
  
  
</form>

@endsection