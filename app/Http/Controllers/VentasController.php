<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(Request $request)
    {
        $idCategoria = $request->idcategoria;
        if ($idCategoria == -1) {
            return redirect()->route('productos.index');
        }
        $categoria = Categoria::where('estado','=','1')->get();
        $producto = Producto::where('estado','=','1')->get();
        if ($idCategoria != null) {
            $producto = Producto::where('estado','=','1')
                            ->where('idcategoria','=', $idCategoria)
                            ->get()
                            ;
        }
        return view('productos.ver',compact('producto', 'categoria', 'idCategoria'));
        
    }
}
