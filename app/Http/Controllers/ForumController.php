<?php

namespace App\Http\Controllers;

use App\Models\forum;
use App\Http\Requests\StoreforumRequest;
use App\Http\Requests\UpdateforumRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
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
        $foro = forum::where('nombre', $request->input('forumName'))->first();

        if(!$foro){
            forum::create([
                'nombre'=> $request->input('forumName'),
                'descripcion'=>$request->input('descripcion'),
                'estado'=>'Activo',
                'user_id'=>auth()->id()
            ]);

            $foro_id = forum::select('id')->where('nombre', $request->input('forumName'))->first();

            $AdminController = new AdminController();
            $UserForumController = new UserForumController();
            
            $AdminController->create(auth()->id(),$foro_id->id);
            $UserForumController->create(auth()->id(),$foro_id->id);

            return redirect()->route('crForo')->with('msj1','Comunidad creada correctamente');
        }else{
            return redirect()->route('crForo')->with('msj2','Comunidad existente');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreforumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreforumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public static function show(/*forum $forum*/)
    {
        // session(['saludo'=>'e hola']);

        $forums = forum::select('id','nombre','descripcion')->where('estado','Activo')->get();

        session(['foros'=>$forums]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateforumRequest  $request
     * @param  \App\Models\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateforumRequest $request, forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(forum $forum)
    {
        //
    }
}
