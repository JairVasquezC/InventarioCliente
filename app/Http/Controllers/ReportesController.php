<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function PDF(){
        $categoria=Categoria::where('estado','=','1')->get();
        $pdf = \PDF::loadView('reporte.categoria',compact('categoria'));
        return $pdf->download('Lista de Categoria.pdf');
    }

    public function PDFproductos(){
        $producto=Producto::where('estado','=','1')->get();
        $pdf = \PDF::loadView('reporte.producto',compact('producto'));
        return $pdf->download('Lista de Producto.pdf');
    }

    public function PDFclientes(){
        $cliente=Cliente::where('estado','=','1')->get();
        $pdf = \PDF::loadView('reporte.cliente',compact('cliente'));
        return $pdf->download('Lista de Cliente.pdf');
    }
}
