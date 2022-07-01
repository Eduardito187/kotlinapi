<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;
use App\Models\Artista;
use App\Models\Cancion;
class Albun extends Model{
    protected $table="albun";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Gestion','Foto','Artista'];
    public function foto() {
        return $this->hasOne(Foto::class,'ID','Foto');
    }
    public function artista() {
        return $this->hasOne(Artista::class,'ID','Artista');
    }
    public function canciones() {
        return $this->hasMany(Cancion::class,'Albun','ID');
    }
}
?>