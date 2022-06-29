<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Albun;
class Artista extends Model{
    protected $table="artista";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Alias','Foto'];
    public function albun() {
        return $this->hasMany(Albun::class,'Artista','ID');
    }
}
?>