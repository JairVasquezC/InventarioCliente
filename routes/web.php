<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', function () {
    return view('inicio');
})->middleware(['auth'])->name('principal');

require __DIR__.'/auth.php';


Route::get('home/',[HomeController::class,'index'])->name('home');

// Route::get('index',[VentaController::class,'index'])->name('index');
// Route::get('agregar',[VentaController::class,'agregar'])->name('agregar');
// Route::post('grabar',[VentaController::class,'grabar'])->name('grabar');
// Route::get('listar',[VentaController::class,'listado'])->name('listado');
// Route::get('ver/{c}',[VentaController::class,'ver']);
// /*PRENDA*/
// Route::resource('prendas',PrendaController::class);

/*CATEGORIA*/
Route::resource('categoria',CategoriaController::class); 
Route::get('cancelar',function(){
    return redirect()->route('categoria.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar');
Route::get('categoria/{id}/confirmar',[CategoriaController::class,'confirmar'])->name('categoria.confirmar');
Route::delete('categoria/eliminar/{id}',[CategoriaController::class,'eliminar'])->name('categoria.eliminar');

/*PRODUCTOS*/
Route::resource('producto',ProductosController::class); 
Route::get('producto/{id}/confirmar',[ProductosController::class,'confirmar'])->name('producto.confirmar');
Route::get('cancelarp',function(){
    return redirect()->route('producto.index')->with('datos','Acción Cancelada ...!');
})->name('cancelarp');

/*CLIENTES*/
Route::resource('cliente',ClienteController::class); 
Route::get('cliente/{id}/confirmar',[ClienteController::class,'confirmar'])->name('cliente.confirmar');
Route::get('cancelarc',function(){
    return redirect()->route('cliente.index')->with('datos','Acción Cancelada ...!');
})->name('cancelarc');

Route::resource('productos',VentasController::class); 
Route::get('venta/{id}/confirmar',[VentasController::class,'confirmar'])->name('venta.confirmar');
Route::get('cancelarv',function(){
    return redirect()->route('venta.index')->with('datos','Acción Cancelada ...!');
})->name('cancelarv');


Route::resource('venta',OperacionController::class); 
Route::get('venta/{id}/confirmar',[OperacionController::class,'confirmar'])->name('venta.confirmar');
Route::get('cancelarv',function(){
    return redirect()->route('venta.index')->with('datos','Acción Cancelada ...!');
})->name('cancelarv');



Route::get('/EncontrarCliente/{idcliente}', [OperacionController::class,'ClienteCodigo']);
Route::get('/EncontrarProducto/{idproducto}', [OperacionController::class,'ProductoCodigo']);
Route::get('/EncontrarTipo/{tipo_id}', [OperacionController::class,'PorTipo']);
 
Route::get('/pdf',[ReportesController::class,'PDF'])->name('descargarPDF');
Route::get('/pdfp',[ReportesController::class,'PDFproductos'])->name('descargarPDFP');
Route::get('/pdfc',[ReportesController::class,'PDFclientes'])->name('descargarPDFC');

// Route::resource('producto1',[ProductosController::class]);