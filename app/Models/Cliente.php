<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ventas;

class Cliente extends Model
{
    use HasFactory;
    protected $table="clientes";
    protected $primaryKey="idcliente";
    public $timestamps=false;
    protected $fillable=['dni','nombres','apellidos','direccion','telefono','estado'];

    public function ventas(){
        return $this->hasMany(Ventas::class,'idcliente','idcliente');
    }
    
}
