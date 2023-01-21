<?php

namespace App\Http\Controllers;

use App\Models\publication;
use App\Http\Requests\StorepublicationRequest;
use App\Http\Requests\UpdatepublicationRequest;

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
    public function create()
    {
        //
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
    public function show(publication $publication)
    {
        //
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
