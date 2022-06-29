<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\CancionPlayList;
class PlayList extends Model{
    protected $table="paly_list";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Prioridad'];
    public function play_list() {
        return $this->hasMany(CancionPlayList::class,'PlayList','ID');
    }
}
?>