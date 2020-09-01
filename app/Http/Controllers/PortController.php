<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;

class PortController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Port::with('country')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $port = new Port($request->all());
        $port->save();
        return $this->successResponse($port, '¡Puerto registrado correctamente!', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function show(Port $port)
    {
        return $this->successResponse($port->load('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Port $port)
    {
        $port->update($request->all());
        return $this->successResponse($port, '¡El puerto se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy(Port $port)
    {
        $port->delete();
        return $this->successResponse($port, '¡El puerto fue eliminado correctamente!', 204);
    }
}
