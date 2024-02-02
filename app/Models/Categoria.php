<?php

namespace App\Models;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table="categorias";
    protected $primaryKey="idcategoria";
    public $timestamps=false;
    protected $fillable=['descripcion','estado'];

    public function productos(){
        return $this->hasMany(Producto::class,'idcategoria','idcategoria');
    }
}
