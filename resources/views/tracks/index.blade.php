@extends('layouts.app')

@section('page-name', 'Songs list')
    
@section('main-content')
  <div class="container">   
    
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
          </tr>
         @empty
        
          @endforelse  
        </tbody>
      </table>
    
        
     
    
  </div>
   
@endsection