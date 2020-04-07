<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::all();
        return view('agendas.index', compact('agendas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blade()
    {
        $agendas = Agenda::all();
        return view('agenda', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function moviestore(Request $request)
    {
          $request->validate([
              'filmname' => 'required|string',
          ]);

          //CA MARCHE JE PLEURE
          $name = $request->get('filmname');
          $filmname = Http::get('https://api.themoviedb.org/3/search/movie?api_key=f3e0583eb3254bc512360eb077868839&query='.$name)
            ->json()['results'];

          $agenda = new Agenda([
              'name' => $filmname[0]['title'],
              'comment' => $filmname[0]['overview'],
              'vote' => $filmname[0]['vote_average'],
              'release_date' => $filmname[0]['release_date'],
              'poster_path' => $filmname[0]['poster_path'],
              'backdrop_path' => $filmname[0]['backdrop_path'],

          ]);
          $agenda -> save();
          return redirect('/agendas')->with('success',  'Agenda added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function seriestore(Request $request)
     {
         $request->validate([
             'serie_name' => 'required|string',
         ]);

         $name = $request->get('serie_name');
         $serieinfo = Http::get('https://api.themoviedb.org/3/search/tv?api_key=f3e0583eb3254bc512360eb077868839&query='.$name)
         ->json()['results'];

         $idserie = $serieinfo[0]['id'];

         $season_number = $request->get('number_season');
         $episode_number = $request->get('number_episode');

         $episode = Http::get("https://api.themoviedb.org/3/tv/{$idserie}/season/{$season_number}/episode/{$episode_number}?api_key=f3e0583eb3254bc512360eb077868839");

       //////////////////////////////////////////////////////////////////:

         $agenda = new Agenda([
             'episode_name' => $episode['name'],
             'name' => $serieinfo[0]['name'],
             'comment' => $episode['overview'],
             'vote' => $episode['vote_average'],
             'release_date' => $episode['air_date'],
             'backdrop_path' => $serieinfo[0]['backdrop_path'],
             'still_path' => $episode['still_path'],

         ]);

         $agenda -> save();
         return redirect('/agendas')->with('success',  'Agenda added');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect('/agendas')->with('Success', 'Agenda deleted');
    }

}
