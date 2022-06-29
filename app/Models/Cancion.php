<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\CancionPlayList;
use App\Models\Foto;
use App\Models\Albun;
class Cancion extends Model{
    protected $table="cancion";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Imagen','Pista','Url_Cancion','Conteo','Letra','Albun'];
    public function foto() {
        return $this->hasOne(Foto::class,'ID','Imagen');
    }
    public function albun() {
        return $this->hasOne(Albun::class,'ID','Albun');
    }
    public function play_list() {
        return $this->hasMany(CancionPlayList::class,'Cancion','ID');
    }
}
?>