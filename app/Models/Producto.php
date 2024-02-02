<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $primaryKey='idproducto';
    public $timestamps=false;
    protected $fillable=['descripcion','stock','precio','idcategoria','imagen','estado'];

        public function categoria(){
            return $this->hasOne(Categoria::class,'idcategoria','idcategoria');
        }

        public static function ActualizarStock($idproducto,$cantidad){
            return DB::select(
                DB::raw("UPDATE productos set stock = stock - '".$cantidad."' where idproducto ='".$idproducto."'")
            );
        }
    
}
