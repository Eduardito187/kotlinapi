<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cancion extends Model{
    protected $table="cancion";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Imagen','Pista','Url_Cancion','Conteo','Letra'];
}
?>