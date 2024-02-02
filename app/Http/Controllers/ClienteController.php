<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    const PAGINATION=10 ;
    public function index(Request $request)
    {       
        
        $cliente=Cliente::where('estado','=','1')->paginate($this::PAGINATION);
        // return view('categorias.index',compact('categoria','buscarpor'));
        return view('clientes.index',compact('cliente'));
    }

    public function create()
    {
        return view('clientes.create');
    }

   
    public function store(Request $request)
    {
        $data=request()->validate([
            'dni' => 'numeric|required|unique:clientes,dni',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',
        ],
        [
            'dni.required'=>'Ingrese dni del personal',
            'dni.unique'=>'DNI repetido',
            'dni.numeric'=>'El DNI debe ser solo numeros',
            'nombres.max'=>'Maximo 20 carateres para los nombres',
            'apellidos.max'=>'Maximo 20 carateres para los apellidos',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'telefono.max'=>'Maximo 9 carateres para el teléfono',
        ]);

        $cliente=new Cliente();
        $cliente->dni=$request->dni;
        $cliente->nombres=$request->nombres;
        $cliente->apellidos=$request->apellidos;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->estado='1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Nuevo Guardado ...!');
        
    }

    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'dni' => 'numeric|required',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',
        ],
        [
            'dni.required'=>'Ingrese dni del cliente',
            'dni.numeric'=>'El DNI debe ser solo numeros',
            'nombres.max'=>'Maximo 20 carateres para los nombres',
            'apellidos.max'=>'Maximo 20 carateres para los apellidos',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'telefono.max'=>'Maximo 9 carateres para el teléfono',
        ]);
        
        $cliente=Cliente::findOrFail($id);
        $cliente->dni=$request->dni;
        $cliente->nombres=$request->nombres;
        $cliente->apellidos=$request->apellidos;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Actualizado ...!');
    }

    public function confirmar($id){
        $cliente=Cliente::findOrFail($id);
        return view('clientes.confirmar',compact('cliente'));
    }
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Eliminado ...!');
    }

}
