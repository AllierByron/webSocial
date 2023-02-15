<?php

namespace App\Http\Controllers;

use App\Models\publication;
use App\Http\Requests\StorepublicationRequest;
use App\Http\Requests\UpdatepublicationRequest;
use Illuminate\Support\Facades\Http;
use App\Models\forum;
use Laravel\Sail\Console\PublishCommand;
use Illuminate\Http\Request;


class PublicationController extends Controller
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
    public function create(Request $request)
    {
        publication::create([
            'titulo'=>$request->input('postName'),
            'descripcion'=>$request->input('postDesc'),
            'contenido'=>$request->input('content'),
            'user_id'=>auth()->id(),
            'forum_id'=>$request->input('forumID'),
            'estado'=>'Activo'
        ]);

        return redirect()->route('expl');
        // echo "forumID: ".$request->input('forumID');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepublicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepublicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public static function show($id, $forum_id)
    {
        switch ($id) {
            //el primer caso es solo para la api de memes
            case 1:
                $memes = Http::get('https://meme-api.com/gimme/5');
                $forumName = forum::select('nombre')->where('id',$forum_id)->first();
                $memesRea = json_decode($memes);
                session(['memes'=>$memesRea->memes,'forumName'=> $forumName->nombre]);
                
                return redirect()->route('forumMemes');

                break;
            case 2:

                $pubs = publication::where('forum_id', $forum_id)->get();
                $forum = forum::where('id',$forum_id)->where('estado','Activo')->first();

                // dd(json_decode($pubs));

                if(!$pubs){
                    return redirect()->route('forum')->with('noForums', 'no foros');
                }else{
                    session(['data'=>json_decode($pubs),'forum'=> $forum]);
                    return redirect()->route('forum');
                }

                break;
            default:
                # code...
                break;
        }

        // return dd($memesRea->memes);
        // return redirect()->route('dede');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepublicationRequest  $request
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepublicationRequest $request, publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(publication $publication)
    {
        //
    }
}
