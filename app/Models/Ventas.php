<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Tipo;

class Ventas extends Model
{
    use HasFactory;
    protected $table="ventas";
    protected $primaryKey="idventa";
    protected $fillable=['idcliente','tipo_id','serie_comprobante','num_comprobante','fecha_hora','total_venta','subtotal','igv','estado'];
    public $timestamps=false;

    public function clientes(){
        return $this->hasOne(Cliente::class,'idcliente','idcliente');
    }

    public function detalleventas(){
        return $this->hasMany(DetalleVenta::class,'idventa','idventa');
    }

    public function tipo(){
    return $this->hasOne(Tipo::class,'tipo_id','tipo_id');
    }
}
