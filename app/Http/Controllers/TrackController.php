<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Track;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnValue;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('term')) {
            $term = $request->get('term');
            $tracks = Track::where('title', 'LIKE', "%$term%")->paginate(10)->withQueryString();
        }else {
             $tracks = Track::paginate(10);
        }
       
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $data = $this->validation($request->all());
        $track = new Track;      

        // * Medoto 1
        // $track->title = $data["title"];
        // $track->album = $data["album"];
        // $track->author = $data["author"];
        // $track->editor = $data["editor"];
        // $track->length = $data["length"];
        // $track->poster = $data["poster"];

        // * Medoto 2
        $track->fill($data);
        $track->save();

        return redirect()->route('tracks.show', $track);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }
    // // public function show(Int $id)
    // // {
    // //     $track = Track::find($id);
    // //     return view('tracks.show', compact('track'));
    // // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $data = $this->validation($request->all());
        $track->update($data); //come il fill, e poi anche salva
        return redirect()->route('tracks.show', $track);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {   
        // $track = Track::findOrFail($id);
        $track->delete();
        return redirect()->route('tracks.index');
        
    }

    private function validation($data) {
      
        $validator = Validator::make(
          $data,
          [
              'title' => 'required|string|max:50',
              'album' => 'nullable|string',
              'author' => 'required|string',
              'editor' => 'nullable|string',
              'length' => 'required|integer',
              'poster' => 'required|string',
          
          ],
          [
              // '*.required' => 'Il :attribuite è obbligatorio',
              'title.required' => 'Il titolo è obbligatorio',
              'title.string' => 'Il titolo deve essere una stringa',
              'title.max' => 'Il titolo deve essere massimo di 50 caratteri',
              
              'album.string' => 'Il titolo deve essere una stringa',
              
              'author.required' => 'L\'author è obbligatorio',
              'author.string' => 'L\'author deve essere una stringa',
           
              'editor.string' => 'L\'editor deve essere una stringa',
  
              'length.required' => 'La lungezza è obbligatorio',
              'length.length' => 'La lungezza deve essere un numero',
              
              'poster.required' => 'Il poster è obbligatorio',
              'poster.string' => 'Il poster deve essere una stringa',
             
          ]
          )->validate();
  
          return $validator;
      }
}