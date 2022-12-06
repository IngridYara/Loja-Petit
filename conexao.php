<?php 

$usuarios = 'root';
$senha = '';
$database = 'db_store';
$host = 'localhost:3307';

$mysqli = new mysqli($host, $usuarios, $senha, $database);

if ($mysqli->error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}