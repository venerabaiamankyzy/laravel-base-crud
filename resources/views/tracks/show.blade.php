@extends('layouts.app')

@section('page-name', $track->title)
    
@section('main-content')
  <div class="container">
    
    <div class="card" style="width: 18rem;">
      <img src="{{$track->poster}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$track->author}}</h5>
        <p class="card-text">{{$track->album}}</p>
        <p class="card-text">{{$track->length}}</p>
       
      </div>
    </div>
    <div class="d-flex justify-content-end my-4 mx-3">
      <a href="{{ route('tracks.index')}}" class="btn btn-primary text-end">Torna alla lista</a>
    </div>
  </div>
   
@endsection