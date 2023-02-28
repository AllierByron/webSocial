<?php

namespace App\Http\Controllers;

use App\Models\publication;
use App\Models\comment;
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
    public function index(Request $request)
    {
        //
        $post = publication::where('publications.id', $request->input(('id')))
                             ->where('publications.estado', 'Activo')
                             ->join('forums','forums.id','=','publications.forum_id')
                             ->join('users','users.id','=','publications.user_id')
                             ->select('publications.*','forums.nombre','users.name','users.foto_perfil')
                             ->get();
        
        $post = json_decode($post);

        $comments = new CommentController();
        $commentss = $comments->show(1,$post[0]->id);

        // session(['post'=> $post, 'comments'=> $commentss]);
        // dd(session('post'));
        // dd(session('comments'));
        return view('layouts/publication')->with('post', $post)->with('comments', $commentss);
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

        return redirect()->route('expl',['id'=>1]);
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
    public static function show($id, $forum_id = 0)
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

                $pubs = publication::where('forum_id', $forum_id)
                                     ->where('publications.estado', 'Activo')
                                     ->join('users','publications.user_id','=','users.id')
                                     ->select('publications.*','users.name','users.foto_perfil')
                                     ->get();
                $forum = forum::where('id',$forum_id)->where('estado','Activo')->first();

                // dd(json_decode($pubs));

                if(!$pubs){ 
                    return redirect()->route('forum')->with('noForums', 'no foros');
                }else{
                    session(['data'=>json_decode($pubs),'forum'=> $forum]);
                    
                    foreach (session('data') as $deta) {
                        $like = comment::where('user_id', auth()->id())
                                        ->where('estado', 'Activo')
                                        ->where('publication_id',$deta->id)
                                        ->where('like', true)
                                        ->first();

                        if(!$like){
                            $deta->url_like = asset('/crComment/1/'.$deta->id);
                        }else{
                            $deta->url_like = asset('/upComment/2/'.$like->id);
                        }
                    }

                    // dd(session('data'));
                    // return redirect()->route('forum');
                    return view('layouts/comunidad');
                }

                break;
            case 3:
                $pubs = publication::where('publications.user_id',auth()->id())
                                    ->where('publications.estado', 'Activo')
                                    ->join('forums','forums.id','=','publications.forum_id')
                                    ->join('users','users.id','=','publications.user_id')
                                    ->select('publications.*','forums.nombre','users.name','users.foto_perfil')
                                    ->get();

                if($pubs){
                    session(['data'=>json_decode($pubs)]);
                    foreach (session('data') as $deta) {

                        $deta->url = asset('/forum/2/'.$deta->forum_id);
                    }
                }else{
                    session(['data'=>""]);
                }   
                // dd(session('data'));
                return view('Usuario/perfil');

                break;
            default:
                # code...
                break;
        }

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
