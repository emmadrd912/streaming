<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\Serie;
use App\Catalogfree;
use DB;
use App\Post;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contents = Content::orderBy('contentname', 'asc')->get();
      $series = Serie::orderBy('serie_name', 'asc')->get();
      return view('catalog', compact('contents','series'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
      $contents = Content::limit(12)->get();
      $series = Serie::all();
      return view('preview', compact('contents','series'));
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function random()
    {
        $date = Catalogfree::all()->first();
        $date = $date->toArray()["updated_at"];

        $diff = time() - strtotime($date);

        $contents = Content::all();
        $series = Serie::all();

        if($contents->isEmpty() or $series->isEmpty()) {
          return view('catalogfree', compact('series','contents'));
        } else {
          if($diff >= 300 || $date == NULL)
          {
              $contentsCount = 0;
              $random_series = Serie::all()->random(1);
              $random_contents = Content::all()->random(2);
              foreach(Catalogfree::all() as $catalog) {
                  $catalog->episode_id = null;
                  $catalog->contentid = null;
                  $catalog->save();
                  if($contentsCount < 2) {
                      $catalog->contentid = $random_contents[$contentsCount]->contentid;
                      $contentsCount++;
                  } else {
                      $catalog->episode_id = $random_series[0]->episode_id;
                  }
                  $catalog->save();
              }
          }
          $series = Catalogfree::whereHas('serie')->get()->map(function($item) {
              return $item->serie;
          });
          $contents = Catalogfree::whereHas('content')->get()->map(function($item) {
              return $item->content;
          });

          return view('catalogfree', compact('series', 'contents'));
        }

//300
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function search(Request $request) {
        $search = $request->get('search');
        $contents = DB::table('contents')->where('contentname', 'like', '%'.$search.'%')->get();
        $series = DB::table('series')->where('serie_name', 'like', '%'.$search.'%')->get();
        return view('search', compact('contents','series','search'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
