<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Artista extends Model{
    protected $table="artista";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Alias','Foto'];
}
?>