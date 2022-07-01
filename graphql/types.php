<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Models\Artista;
use App\Models\Albun;
use App\Models\Cancion;
use App\Models\PlayList;
use App\Models\CancionPlayList;

$PlayListType=new ObjectType([
    'name' => 'PlayListType',
    'description' => 'PlayListType',
    'fields' => function () use(&$CancionPlayListType){
        return [
            'ID'=>Type::int(),
            'Nombre'=>Type::string(),
            'Prioridad'=>Type::int(),
            'Musicas'=>[
                "type" => Type::listOf($CancionPlayListType),
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = PlayList::where('ID', $idPer)->with(['play_list'])->first();
                    if ($data->play_list==null) {
                        return null;
                    }
                    return $data->play_list->toArray();
                }
            ]
        ];
    }
]);
$CancionPlayListType=new ObjectType([
    'name' => 'CancionPlayListType',
    'description' => 'CancionPlayListType',
    'fields' => function () use(&$CancionType,&$PlayListType){
        return [
            'ID'=>Type::int(),
            'Cancion'=>[
                "type" => $CancionType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = CancionPlayList::where('ID', $idPer)->with(['cancion'])->first();
                    if ($data->cancion==null) {
                        return null;
                    }
                    return $data->cancion->toArray();
                }
            ],
            'PlayList'=>[
                "type" => $PlayListType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = CancionPlayList::where('ID', $idPer)->with(['play_list'])->first();
                    if ($data->play_list==null) {
                        return null;
                    }
                    return $data->play_list->toArray();
                }
            ],
        ];
    }
]);
$CancionType=new ObjectType([
    'name' => 'CancionType',
    'description' => 'CancionType',
    'fields' => function () use(&$FotoType,&$AlbumType){
        return [
            'ID'=>Type::int(),
            'Nombre'=>Type::string(),
            'Imagen'=>[
                "type" => $FotoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Cancion::where('ID', $idPer)->with(['foto'])->first();
                    if ($data->foto==null) {
                        return null;
                    }
                    return $data->foto->toArray();
                }
            ],
            'Pista'=>Type::string(),
            'Url_Cancion'=>Type::string(),
            'Conteo'=>Type::int(),
            'Letra'=>Type::string(),
            'Album'=>[
                "type" => $AlbumType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Cancion::where('ID', $idPer)->with(['albun'])->first();
                    if ($data->albun==null) {
                        return null;
                    }
                    return $data->albun->toArray();
                }
            ],
        ];
    }
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
            'Nombre'=>Type::string(),
            'Gestion'=>Type::int(),
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
