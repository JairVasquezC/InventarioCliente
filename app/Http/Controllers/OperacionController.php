<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Ventas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperacionController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $venta = Ventas::where('estado','=','1')->where('idventa','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('ventas.index',compact('venta','buscarpor'));
    }

    public function create()
    {
    // $cliente=Cliente::where('estado','=','1')->get();
    // $tipo=Tipo::where('estado','=','1')->get();
    // $producto=Producto::where('estado','=','1')->get();
    // return view('ventas.create',compact('cliente','tipo','producto'));

    $cliente=DB::table('clientes')->get();
    $producto=DB::table('productos')->get();
    $tipo=Tipo::all();
    $tipou=Tipo::select('tipo_id','descripcion')->orderBy('tipo_id','DESC')->get();
    return view('ventas.create',compact('tipo','cliente','producto'));

    }

    public function store(Request $request){
            // $venta=new Ventas();
            // $venta->fecha_hora=$request->fecha_hora;
            // $cliente=Cliente::where('dni','=',$request->dni)->get();
            //      $idcliente=$cliente[0]->idcliente;              
            //      $venta->idcliente=$idcliente;
            // $venta->tipo_id=$request->tipo_id; 
            // $venta->serie_comprobante=$request->serie_comprobante;
            // $venta->num_comprobante=$request->num_comprobante;
            // $venta->fecha_hora=$request->fecha_hora;
            // $venta->total_venta=$request->total_venta;
            //         if ($request->tipo_id='2')
            //         {
            //             $venta->total_venta=$request->total_venta;
            //             $venta->subtotal='0';
            //             $venta->igv='0';
            //         }
            //         else
            //         {
            //             $venta->total_venta=$request->total_venta;
            //             $venta->subtotal=$request->total_venta-($request->total_venta*0.18);
            //             $venta->igv=$request->total_venta*0.18;
            //         }
            // $venta->estado='1';
            // $venta->save();

            // $detalleventa=$request->get('detalles');
            // $idproducto = $request->get('idproducto');
            // $cantidad = $request->get('cantidad');
            // $pventa = $request->get('precio');
            // $cont = 0;
            // while ($cont<count($idproducto)) 
            // {
            //     $detalle=new DetalleVenta();
            //     $detalle->idventa=$venta->idventa;
            //     $detalle->idproducto=$idproducto[$cont];
            //     $detalle->cantidad=$cantidad[$cont];
            //     $detalle->precio=$pventa[$cont];
            //     $detalle->save();
            //     Producto::ActualizarStock($detalle->idproducto,$detalle->cantidad);
            //         $cont=$cont+1;
            //     return redirect()->route('venta.index')->with('datos','Registro Nuevo Guardado ...!');
            // }
    
    

           try {
                DB::beginTransaction();
                    
                
                $cliente=Cliente::where('dni','=',$request->dni)->get();
                $idcliente=$cliente[0]->idcliente;   
                $venta=new Ventas();           
                $venta->idcliente=$idcliente;
                $venta->tipo_id=$request->tipo_id;
                $venta->serie_comprobante=$request->serie_comprobante;
                $venta->num_comprobante=$request->num_comprobante;
                $venta->fecha_hora=$request->fecha_hora;
            
                if ($request->tipo_id='2')
                {
                    $venta->total_venta=$request->total_venta;
                    $venta->subtotal='0';
                    $venta->igv='0';
                }
                else
                {
                    $venta->total_venta=$request->total_venta;
                    $venta->subtotal=$request->total_venta-($request->total*0.18);
                    $venta->igv=$request->total_venta*0.18;
                }

                $venta->estado='1';
                $venta->save();

                $detalleventa=$request->get('detalles');
                $idproducto = $request->get('idproducto');
                $cantidad = $request->get('cantidad');
                $pventa = $request->get('precio');
                $cont = 0;
                while ($cont<count($idproducto)) 
                {
                    $detalle=new DetalleVenta();
                    $detalle->idventa=$venta->idventa;
                    $detalle->idproducto=$idproducto[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->precio=$pventa[$cont];
                    $detalle->save();
                    Producto::ActualizarStock($detalle->idproducto,$detalle->cantidad);
                        $cont=$cont+1;
                    return redirect()->route('venta.index')->with('datos','Registro Nuevo Guardado ...!');
                }
           }catch (Exception $e) {
                    DB::rollback();
            }
            return redirect()->route('venta.index')->with('datos','Registro Nuevo Guardado ...!');
}

    public function edit($id)
    {
        $venta=Ventas::findOrFail($id);
        $cliente=Cliente::where('estado','=','1')->get();
        $producto=Producto::where('estado','=','1')->get();
        return view('ventas.edit',compact('venta','cliente','producto'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'cantidad' => 'numeric|required',
        ],
        [
            'cantidad.required'=>'Ingrese Cantidad',
        ]);
        
        $venta=Ventas::findOrFail($id);
        $venta->fecha=$request->fecha;;
        $venta->idcliente=$request->idcliente;
        $venta->idproducto=$request->idproducto;
        $venta->cantidad=$request->cantidad;
        $venta->save();
        return redirect()->route('venta.index')->with('datos','Registro Actualizado ...!');
    }

    public function confirmar($id){
        $venta=Ventas::findOrFail($id);
        $cliente=Cliente::where('estado','=','1')->get();
        $producto=Producto::where('estado','=','1')->get();
        return view('ventas.confirmar',compact('venta','cliente','producto'));
    }
    public function destroy($id)
    {
        $venta=Ventas::findOrFail($id);
        $venta->estado='0';
        $venta->save();
        return redirect()->route('venta.index')->with('datos','Registro Eliminado ...!');
    }

    public function ClienteCodigo($idcliente){
        return Cliente::where('idcliente','=',$idcliente)->get();
    }

    public function ProductoCodigo($idproducto){
        return Producto::where('idproducto','=',$idproducto)->get();
    }
}
