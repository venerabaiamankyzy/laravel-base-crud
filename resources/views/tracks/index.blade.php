@extends('layouts.app')

@section('page-name', 'Songs list')
    
@section('main-content')
  <div class="container">  
    
    <div class="row my-3">
     <form class="col-8 d-flex" role="search">
        <input class="form-control me-sm-2" type="search" name="term" placeholder="Search">
        <button class="btn btn-outline-success my-0" type="submit">Search</button>
      </form>

      <div class="col-4 d-flex">
        <a href="{{ route('tracks.create')}}" type="button" class="btn btn-outline-success ms-auto">Crea track</a>
      </div>
    </div>

    
    
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Album</th>
            <th scope="col">Author</th>
            <th scope="col">Poster</th>
            <th scope="col">Length</th>
          </tr>
          </tr>
        </thead>
        <tbody>
          @forelse ($tracks as $track)
          <tr>
            <th scope="row">{{$track->id}}</th>
            <td>{{$track->title}}</td>
            <td>{{$track->album}}</td>
            <td>{{$track->author}}</td>
            <td>{{$track->poster}}</td>
            <td>{{$track->length}}</td>
            <td><a href="{{route('tracks.show', $track)}}"><i class="bi bi-eye"></i></a></td>
            {{-- <td><a href="{{route('tracks.show', ['track'=$track->id])}}"><i class="bi bi-eye"></i></a></td> --}}
            {{-- <td><a href="{{route('tracks.edit', $track)}}"><i class="bi bi-pencil"></i></a></td> --}}
          </tr>
         @empty
        
          @endforelse  
        </tbody>
      </table>
    {{ $tracks->links('pagination::bootstrap-5')}}
        
     
    
  </div>
   
@endsection