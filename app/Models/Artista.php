<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Albun;
use App\Models\Foto;
class Artista extends Model{
    protected $table="artista";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Alias','Foto'];
    public function albuns() {
        return $this->hasMany(Albun::class,'Artista','ID');
    }
    public function foto() {
        return $this->hasOne(Foto::class,'ID','Foto');
    }
}
?>