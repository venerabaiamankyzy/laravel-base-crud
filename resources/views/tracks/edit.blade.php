@extends('layouts.app')

@section('page-name', 'Modifica track '  .$track->title)

@section('main-content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tracks.update', $track) }}" method="POST" class="row gy-4 gx-5 ">
  @csrf
  @method('PUT')

  <div class="col-4">
    <label for="title"  class="form-label me-4">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $track->title}}">
    @error('title')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="album"  class="form-label me-4">Album</label>
    <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" value="{{ old('album') ?? $track->album}}">
    @error('album')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>
  
  <div class="col-4">
    <label for="author"  class="form-label me-4">Author</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') ?? $track->author}}">
    @error('author')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="editor"  class="form-label me-4">Editor</label>
    <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor') ?? $track->editor}}">
    @error('editor')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="length"  class="form-label me-4">Length</label>
    <input type="text" class="form-control @error('length') is-invalid @enderror" id="length" name="length" value="{{ old('length') ?? $track->length}}">
    @error('length')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="poster"  class="form-label me-4">Poster</label>
    <input type="text" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" value="{{ old('poster') ?? $track->poster}}"> 
    @error('poster')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>  


  <div class="col-12">
    <button type="submit" class="btn btn-outline-success ms-auto">Salva</button>
  </div>
</form>
@endsection  
  
   
  
  
  


