<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CancionPlayList extends Model{
    protected $table="cancion_play_list";
    public $timestamps=false;
    protected $fillable = ['ID','Cancion','PlayList'];
}
?>