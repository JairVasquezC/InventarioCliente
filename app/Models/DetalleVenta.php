<?php

namespace App\Models;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table="detalle_venta";
    protected $fillable=['cantidad'];
    public $timestamps=false;

    public function ventas(){
        return $this->hasOne(Ventas::class,'idventa','idventa');
    }

    public function productos(){
        return $this->hasMany(Producto::class,'idproducto','idproducto');
    }

}



