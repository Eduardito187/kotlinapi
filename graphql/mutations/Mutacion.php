<?php

use App\Models\Artista;
use GraphQL\Type\Definition\Type;

function getUserIp(){
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';    
    return $ipaddress;
}
$Mutacion=[
    'validacion_login'=>[
        'type'=>Type::int(),
        'args'=>[
            'Usuario'=>Type::nonNull(Type::string()),
            'Contra'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            return 1;
        }
    ],
    'AddArtista'=>[
        'type'=>$ArtistaType,
        'args'=>[
            'Nombre'=>Type::nonNull(Type::string()),
            'Alias'=>Type::nonNull(Type::string()),
            'URL'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $data=new Artista([
                'ID'=>NULL,
                'Nombre'=>$args["Nombre"],
                'Alias'=>$args["Alias"],
                'Foto'=>1
            ]);
            $x=$data->save();
            return Artista::where('Nombre', $args['Nombre'])->first();
        }
    ],
    'EditArtista'=>[
        'type'=>$ArtistaType,
        'args'=>[
            'ID'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::string(),
            'Alias'=>Type::string()
        ],
        'resolve'=>function($root,$args){
            $a=Artista::find($args['ID']);
            $v=false;
            if ($a!=null) {
                Artista::where('ID', $args['ID'])->update([
                    'Nombre'=>isset($args["Nombre"])?$args["Nombre"]:$a->Nombre,
                    'Alias'=>isset($args["Alias"])?$args["Alias"]:$a->Alias
                ]);
                $v=true;
            }
            return Artista::find($args["ID"]);
        }
    ],
    'DelArtista' => [
        'type' => $ArtistaType,
        'args' => [
            'ID' => Type::nonNull(Type::int())
        ],
        'resolve' => function($root, $args) {
            $a = Artista::find($args['ID']);
            $v=false;
            if ($a!=null) {
                Artista::where('ID', $args['ID'])->delete();
                $v=true;
            }
            return $a;
        }
    ],
];
?>