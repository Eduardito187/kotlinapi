<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Models\Artista;
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
    ]
]);
?>
