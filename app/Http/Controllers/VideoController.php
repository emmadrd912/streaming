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
    public function store(Request $request)
    {
            $request->validate([
                'filmname' => 'required|string',
                'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            ]);

            //CA MARCHE JE PLEURE
            $name = $request->get('filmname');
            $filmname = Http::get('https://api.themoviedb.org/3/search/movie?api_key=f3e0583eb3254bc512360eb077868839&query='.$name)
              ->json()['results'];

            $content = new Content([
                'contentname' => $name,
                'contentid' => $filmname[0]['id'],
            ]);

            // DB::insert('insert into Content (id, contentname, Content_added_at) values (?, ?, ?)', [filmname]);
            $path = request('video')->store('videos');
            $content -> save();
            return redirect('home')->with('success',  'content added');

            //curl examble to get the id

            // Tableau contenant les options de téléchargement
            // $options=array(
            //      CURLOPT_URL            => $url, // Url cible (l'url la page que vous voulez télécharger)
            //      CURLOPT_RETURNTRANSFER => true, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
            //      CURLOPT_HEADER         => false // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
            // );
            // Création d'un nouvelle ressource cURL
            // $CURL=curl_init();
            //
            //     // Configuration des options de téléchargement
            //      curl_setopt_array($CURL,$options);
            //
            //     // Exécution de la requête
            //     $content=curl_exec($CURL);      // Le contenu téléchargé est enregistré dans la variable $content. Libre à vous de l'afficher.
            //     $decoded = json_decode($content, true);
            //     $id = $decoded[results][0][id];
            //     $comment = $decoded[results][0][overview];
            //     $release_date = $decoded[results][0][release_date];
            //     $vote = $decoded[results][0][vote_average];
            //     $gender = "test";
            //     // Fermeture de la session cURL
            // curl_close($CURL);
            // End curl examble to get the id


            //curl examble to get the id

            // Complétez $url avec l'url cible (l'url de la page que vous voulez télécharger)
            // $url="https://api.themoviedb.org/3/search/movie?api_key=f3e0583eb3254bc512360eb077868839&query=Tron";

            // // Tableau contenant les options de téléchargement
            // $options=array(
            //     CURLOPT_URL            => $url, // Url cible (l'url la page que vous voulez télécharger)
            //     CURLOPT_RETURNTRANSFER => true, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
            //     CURLOPT_HEADER         => false // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
            // );
            // // Création d'un nouvelle ressource cURL
            // $CURL=curl_init();

            //     // Configuration des options de téléchargement
            //     curl_setopt_array($CURL,$options);

            //     // Exécution de la requête
            //     $content=curl_exec($CURL);      // Le contenu téléchargé est enregistré dans la variable $content. Libre à vous de l'afficher.
            //     $decoded = json_decode($content, true);
            //     print_r($decoded[results][0][id]);
            //     // Fermeture de la session cURL
            // curl_close($CURL);
            // End curl examble to get the id

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
