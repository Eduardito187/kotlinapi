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
            return $data->toArray();
        }
    ],
];
?>