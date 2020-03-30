<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Content;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // public function addvideo()
        // {
        //     request()->validate([
        //         'filmname' => 'required|string',
        //         'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        //     ]);

        //     DB::insert('insert into Content (id, contentname, Content_added_at, contentid) values (?, ?, ?, ?)', [filmname]);
        //     $path = request('video')->store('videos');

        //     return $path;
        // }
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
                'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            ]);

            //CA MARCHE JE PLEURE
            $name = $request->get('filmname');
            $filmname = Http::get('https://api.themoviedb.org/3/search/movie?api_key=f3e0583eb3254bc512360eb077868839&query='.$name)
              ->json()['results'];
            
            $path = request('video')->moviestore('videos');
            
            $content = new Content([
                'path' => $path,
                'contentname' => $name,
                'contentid' => $filmname[0]['id'],
                'comment' => $filmname[0]['overview'],
                'vote' => $filmname[0]['vote_average'],
                'release_date' => $filmname[0]['release_date'],

            ]);

            // DB::insert('insert into Content (id, contentname, Content_added_at) values (?, ?, ?)', [filmname]);
            
            $content -> save();
            return redirect('home')->with('success',  'content added');
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
        //
    }
}
