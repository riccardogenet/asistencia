<?php
if (isset($_POST)) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    
    require("conexion.php");
    if (empty($_POST['idp'])){
        $query = $pdo->prepare("INSERT INTO tarjetas1 (codigo, nombre) VALUES (:cod, :nom)");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":nom", $nombre);
        
        $query->execute();
        $pdo = null;
        
        echo "ok";
        
    }else{
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE tarjetas1 SET codigo = :cod, nombre = :nom WHERE id = :id");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":nom", $nombre);
        
        $query->bindParam("id", $id);
        $query->execute();
        $pdo = null;
        echo "modificado";
    }
    
}
