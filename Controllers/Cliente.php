<?php

namespace App\Http\Controllers;

use App\cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$clientes=Cliente::orderBy('id','DESC')->paginate(5);
        return view('Cliente.index',compact('clientes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'dureccuib'=>'required', 'telefono'=>'required', 'email'=>'required']);
        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $id
     * @return \Illuminate\Http\Response
     */
    public function show(c$id)
    {
		$clientes=Cliente::find($id);
        return  view('cliente.show',compact('clientes'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required', 'direccion'=>'required', 'telefonoi'=>'required', 'email'=>'required']);
 
        Cliente::find($id)->update($request->all());
        return redirect()->route('cliente.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index')->with('success','Registro eliminado satisfactoriamente');
    }  
	
	public function cargoCliente($id){
	$data = Cliente::select('clientes.nombre', 'cargos.nombre as cargo')
                ->leftjoin('cargos', 'clientes.idcargo', '=', 'cargos.id') as
                ->get();

     return $data;
	}
}
