<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Serie;
use DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contents = Content::all();
      $series = Serie::all();
      return view('catalog', compact('contents','series'));
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
        $date = catalogfree::where('updated at');
        //$diff = time() - strtotime($date); 
       // if($diff >= 86400 || $diff == NULL)
        //{
            $random_contents = Content::all()->random(2);
            $first_random_content = $random_contents->toArray()[0]['contentid'];
            $second_random_content = $random_contents->toArray()[1]['contentid'];
            $random_series = Serie::all()->random(1);
            $first_random_series = $random_series->toArray()[0]['episode_id'];

            DB::table('catalogfrees')->updateOrInsert(
                ['id'=> 1],
                ['contentid' => $first_random_content]);
            DB::table('catalogfrees')->updateOrInsert(
                ['id'=> 2],
                ['contentid' => $second_random_content]);
            DB::table('catalogfrees')->updateOrInsert(
                    ['id'=> 3],
                    ['contentid' => $first_random_series]);
            // $catalogfrees->contentid=$first_random_content;
            // $catalogfrees->save();  

        //}


    //   $random_series = Serie::all()->random(1);
      return view('catalogfree', compact('random_contents','random_series'));
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
        return view('search', compact('contents','series'));
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
