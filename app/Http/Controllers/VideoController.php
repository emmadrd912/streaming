<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Content;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contents = Content::all();
      return view('contents.index', compact('contents'));
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
        return view('contents.create');
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

            $path = request('video')->store('videos');

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
            return redirect('/contents')->with('success',  'content added');
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
      $content = Content::find($id);
      return view('contents.edit', compact('content'));
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
      $request->validate([
        'contentname'=>'required',
        'contentid'=> 'required|integer',
        'comment' => 'required|string',
        'vote' => 'required|numeric|min:0|max:10',
        'date' => 'required',
        'upvideo' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
      ]);
      $content = Content::find($id);
      $content->contentname = $request->get('contentname');
      $content->contentid = $request->get('contentid');
      $content->comment = $request->get('comment');
      $content->vote = $request->get('vote');
      $content->release_date = $request->get('date');
      Storage::Delete($content->path);
      $content->path = request('upvideo')->store('videos');
      $content->save();

      return redirect('/contents')->with('success', 'Content has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $content = Content::find($id);
      Storage::Delete($content->path);
      $content->delete();

      return redirect('/contents')->with('success', 'Content has been deleted Successfully');
    }
}
