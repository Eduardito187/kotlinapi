<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require('mutations/Mutacion.php');

$mutations=array();
//$mutations+=$Mutacion;
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields' => $mutations
]);
?>
