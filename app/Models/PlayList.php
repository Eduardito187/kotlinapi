<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PlayList extends Model{
    protected $table="paly_list";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Prioridad'];
}
?>