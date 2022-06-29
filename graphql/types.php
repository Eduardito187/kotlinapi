<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

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
    'fields'=>[
        'ID'=>Type::int(),
        'Gesion'=>Type::string(),
        'Foto'=>Type::int(),
        'Artista'=>Type::string()
        
    ]
]);
$ArtistaType=new ObjectType([
    'name' => 'ArtistaType',
    'description' => 'ArtistaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Alias'=>Type::string(),
        'Foto'=>Type::int()
    ]
]);

?>
