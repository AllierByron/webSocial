<?php

namespace App\Http\Controllers;

use App\Models\comunidad;
use App\Http\Requests\StorecomunidadRequest;
use App\Http\Requests\UpdatecomunidadRequest;

class ComunidadController extends Controller
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
     * @param  \App\Http\Requests\StorecomunidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecomunidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(comunidad $comunidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(comunidad $comunidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecomunidadRequest  $request
     * @param  \App\Models\comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecomunidadRequest $request, comunidad $comunidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(comunidad $comunidad)
    {
        //
    }
}
