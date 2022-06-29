<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Albun;
use App\Models\Cancion;
class Foto extends Model{
    protected $table="foto";
    public $timestamps=false;
    protected $fillable = ['ID','Url'];
    public function albun() {
        return $this->hasOne(Albun::class,'Foto','ID');
    }
    public function cancion() {
        return $this->hasOne(Cancion::class,'Imagen','ID');
    }
}
?>