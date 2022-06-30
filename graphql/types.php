<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Models\Artista;
use App\Models\Albun;

$PlayListType=new ObjectType([
    'name' => 'PlayListType',
    'description' => 'PlayListType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Prioridad'=>Type::int()
    ]
]);
$CancionPlayListType=new ObjectType([
    'name' => 'CancionPlayListType',
    'description' => 'CancionPlayListType',
    'fields'=>[
        'ID'=>Type::int(),
        'Cancion'=>Type::int(),
        'PlayList'=>Type::int()
    ]
]);
$CancionType=new ObjectType([
    'name' => 'CancionType',
    'description' => 'CancionType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Imagen'=>Type::int(),
        'Pista'=>Type::string(),
        'Url_Cancion'=>Type::string(),
        'Conteo'=>Type::int(),
        'Letra'=>Type::string(),
        'Album'=>Type::string()
    ]
]);

$FotoType=new ObjectType([
    'name' => 'FotoType',
    'description' => 'FotoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Url'=>Type::string()
        
    ]
]);
$AlbumType=new ObjectType([
    'name' => 'AlbumType',
    'description' => 'AlbumType',
    'fields' => function () use(&$FotoType,&$ArtistaType){
        return [
            'ID'=>Type::int(),
            'Gesion'=>Type::string(),
            'Foto'=>[
                "type" => $FotoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Albun::where('ID', $idPer)->with(['foto'])->first();
                    if ($data->foto==null) {
                        return null;
                    }
                    return $data->foto->toArray();
                }
            ],
            'Artista'=>[
                "type" => $ArtistaType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Albun::where('ID', $idPer)->with(['artista'])->first();
                    if ($data->artista==null) {
                        return null;
                    }
                    return $data->artista->toArray();
                }
            ]
        ];
    }
]);
$ArtistaType=new ObjectType([
    'name' => 'ArtistaType',
    'description' => 'ArtistaType',
    'fields' => function () use(&$FotoType,&$AlbumType){
        return [
            'ID'=>Type::int(),
            'Nombre'=>Type::string(),
            'Alias'=>Type::string(),
            'Foto'=>[
                "type" => $FotoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Artista::where('ID', $idPer)->with(['foto'])->first();
                    if ($data->foto==null) {
                        return null;
                    }
                    return $data->foto->toArray();
                }
            ],
            'Albunes'=>[
                "type" => Type::listOf($AlbumType),
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Artista::where('ID', $idPer)->with(['albuns'])->first();
                    if ($data->albuns==null) {
                        return null;
                    }
                    return $data->albuns->toArray();
                }
            ]
        ];
    }
]);

?>
