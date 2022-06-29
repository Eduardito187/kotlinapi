<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cancion;
use App\Models\PlayList;
class CancionPlayList extends Model{
    protected $table="cancion_play_list";
    public $timestamps=false;
    protected $fillable = ['ID','Cancion','PlayList'];
    public function cancion() {
        return $this->hasOne(Cancion::class,'ID','Cancion');
    }
    public function play_list() {
        return $this->hasOne(PlayList::class,'ID','PlayList');
    }
}
?>