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
            <th scope="col">Action</th>
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
            <td class="action-cell">
              <a href="{{route('tracks.show', $track)}}"><i class="bi bi-eye"></i></a>
              {{-- <td><a href="{{route('tracks.show', ['track'=$track->id])}}"><i class="bi bi-eye"></i></a></td> --}}

              <a href="{{ route('tracks.edit', $track)}}"><i class="bi bi-pencil"></i></a>

              <button class="bi bi-trash3 text-danger btn-icon" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $track->id }}"></button> 
              
            </td>   
          </tr>   
          @empty  
          @endforelse 
        </tbody>
      </table>     
    {{ $tracks->links('pagination::bootstrap-5')}}    
  </div>    
@endsection      

@section('modals')
  @forelse ($tracks as $track)
    <!-- Modal -->
    <div class="modal fade" id="delete-modal-{{ $track->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione !</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            Sei sicuro di voler eliminare la canzone {{ $track->title }} di {{ $track->author }} con ID - {{ $track->id }} selezionato? <br>
            L'operazione non è reversibile.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            
            <form action="{{ route('tracks.destroy', $track)}}" method="POST">
                @method('delete')
                @csrf 
                
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @empty  
  @endforelse
@endsection
    
        
     
    
  
   
