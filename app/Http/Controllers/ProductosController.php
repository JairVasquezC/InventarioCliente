<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $producto=Producto::where('estado','=','1')->paginate($this::PAGINATION);
        return view('productos.index',compact('producto'));
    }

    public function create()
    {
        $categoria=Categoria::where('estado','=','1')->get();
        return view('productos.create',compact('categoria'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:40',
            'precio' => 'required|min:0',
            'stock' => 'required|min:0',
        ],
        [
            'descripcion.required'=>'Ingrese descripción de producto',
            'descripcion.max'=>'Maximo 40 carcateres para la descripción',
            'precio.required'=>'Ingrese precio de producto',
            'precio.min'=>'Precio debe ser mayor a Cero',
            'stock.required'=>'Ingrese stock de producto',
            'stock.min'=>'Stock debe ser mayor a Cero',
        ]);


        // if($imagen = $request->file('imagen')){
        //     $rutaGuardarImg = 'imagen/';
        //     $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg,$imagenProducto);
        //     $producto['imagen'] = "$imagenProducto";
        // }
  
        $producto=new Producto();
        $producto->descripcion=$request->descripcion;
        $producto->idcategoria=$request->idcategoria;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->imagen=$request->imagen;
        $producto->estado='1';
        $producto->save();
        
        // return redirect()->route('producto.index');
        return redirect()->route('producto.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categoria=Categoria::where('estado','=','1')->get();
        return view('productos.edit',compact('producto','categoria'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:40',
            'precio' => 'required|min:0',
            'stock' => 'required|min:0',
        ],
        [
            'descripcion.required'=>'Ingrese descripción de producto',
            'descripcion.max'=>'Maximo 40 carcateres para la descripción',
            'precio.required'=>'Ingrese precio de producto',
            'precio.min'=>'Precio debe ser mayor a Cero',
            'stock.required'=>'Ingrese stock de producto',
            'stock.min'=>'Stock debe ser mayor a Cero',
        ]);
        $producto=Producto::findOrFail($id);
        $producto->descripcion=$request->descripcion;
        $producto->idcategoria=$request->idcategoria;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->imagen=$request->imagen;
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Actualizado ...!');
    }

    public function confirmar($id){
        $producto=Producto::findOrFail($id);
        $categoria=Categoria::where('estado','=','1')->get();
        return view('productos.confirmar',compact('producto','categoria'));
    }

    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->estado='0';
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Eliminado ...!');
    }
}
