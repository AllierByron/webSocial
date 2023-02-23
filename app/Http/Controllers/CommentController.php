<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use stdClass;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pub_id)
    {
        //
        $like = comment::select('like')
                        ->where('estado', 'Activo')
                        ->where('publication_id',$pub_id)
                        ->first();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $pub_id)
    {
        //
        switch ($id) {
            case 1:
                $comment = Comment::where('user_id', auth()->id())
                                    ->where('estado', 'Activo')
                                    ->where('publication_id',$pub_id)
                                    ->first();

                if(!$comment){
                    $like = comment::create([
                        'publication_id'=> $pub_id,
                        'user_id'=> auth()->id(),
                        'like'=>true,
                        'estado'=>'Activo'
                    ]);
                    $like = json_decode($like);
                    $ruta = asset('upComment/2/'.$like->id);
                    return $ruta;
                }else{
                   return json_encode(CommentController::update(1, json_decode($comment)));
                }

                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecommentRequest  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($id, $com_id)
    {
        //
        switch ($id) {
            case 1:
                $comment = comment::find($com_id->id);
                $comment->like = true;
                $comment->save();
                $ruta = comment::select('publication_id')->where('id',$com_id->id)->get();
                $ruta = json_decode($ruta);
                $ruta[0]->url = asset('upComment/2/'.$comment->id);
                // json_encode($ruta);
                return $ruta;

                break;
            case 2:
                $comment = comment::find($com_id);
                $comment->like = false;
                $comment->save();
                $ruta = comment::select('publication_id')->where('id',$com_id)->get();
                $ruta = json_decode($ruta);
                $ruta[0]->url = asset('crComment/1/'.$comment->publication_id);
                json_encode($ruta);
                return $ruta;
                // return "asset('crear/1/".$comment->publication_id."')";
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
