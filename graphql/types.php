<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Models;

$PlayListType=new ObjectType([
    'name' => 'PlayListType',
    'description' => 'PlayListType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Prioridad'=>Type::int()
    ]
]);
?>
