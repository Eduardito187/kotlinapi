<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Models\Artista;
use App\Models\Albun;
use App\Models\Cancion;
use App\Models\PlayList;
$rootQuery=new ObjectType([
    'name'=>'Query',
    'fields'=>[
        'Artistas'=>[
            'type'=>Type::listOf($ArtistaType),
            'resolve'=>function($root,$args){
                $data=Artista::get()->toArray();
                return $data;
            }
        ],
        'Artista'=>[
            'type'=>$ArtistaType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $data=Artista::find($args["ID"])->toArray();
                return $data;
            }
        ],
        'Albunes'=>[
            'type'=>Type::listOf($AlbumType),
            'resolve'=>function($root,$args){
                $data=Albun::get()->toArray();
                return $data;
            }
        ],
        'Albun'=>[
            'type'=>$AlbumType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $data=Albun::find($args["ID"])->toArray();
                return $data;
            }
        ],
        'Musicas'=>[
            'type'=>Type::listOf($CancionType),
            'resolve'=>function($root,$args){
                $data=Cancion::get()->toArray();
                return $data;
            }
        ],
        'Musica'=>[
            'type'=>$CancionType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $data=Cancion::find($args["ID"])->toArray();
                return $data;
            }
        ],
        'PlayList'=>[
            'type'=>Type::listOf($CancionType),
            'resolve'=>function($root,$args){
                $data=PlayList::get()->toArray();
                return $data;
            }
        ],
        'PlayLists'=>[
            'type'=>$CancionType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $data=PlayList::find($args["ID"])->toArray();
                return $data;
            }
        ],
    ]
]);
?>
