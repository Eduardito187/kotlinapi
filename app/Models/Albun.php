<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Albun extends Model{
    protected $table="albun";
    public $timestamps=false;
    protected $fillable = ['ID','Gestion','Foto'];
}
?>