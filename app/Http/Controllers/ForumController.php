<?php

namespace App\Http\Controllers;

use App\Models\forum;
use App\Http\Requests\StoreforumRequest;
use App\Http\Requests\UpdateforumRequest;

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
    public function create()
    {
        //
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
    public function show(forum $forum)
    {
        //
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
