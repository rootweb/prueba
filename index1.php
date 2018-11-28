<?php
 
 
include 'Db.php';
 
 
$database = $firebase->getDatabase();
 
/*Inicio escribir*/
 
$newPost = $database
    ->getReference('blog/posts')
    ->push([
        'title' => 'Primer post',
        'body' => 'Hola, este es el primer post del blog'
    ]);
   
/*Fin escribir*/
 
/*Inicio leer*/
$reference = $database->getReference('blog/posts');
 
$value = $reference->getValue();
 
 
    foreach($value as $v)
    {
    echo $v["body"];
    }  
   
    /*Fin leer*/
?>