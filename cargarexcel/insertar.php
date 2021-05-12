<?php
/**
 * Created by PhpStorm.
 * User: HILARI
 * Date: 02/01/2020
 * Time: 10:40
 */

define('SERVIDOR','185.27.134.10/db_sql.php?db=epiz_28562692_mall320');
define('USUARIO','epiz_28562692');
define('PASSWORD','cearWPXMsWI');
define('BD','epiz_28562692_mall320');

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
    //echo "<script>alert('Conexión con exito a la base de datos');</script>";
}catch (PDOException $e){
    echo "<script>alert('error al conectar con la base de datos');</script>";
}



$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];


$fecha = "2020-03-11 00:00:00";
$estado = "1";

//echo $d1." - ".$d2." - ".$d3." - ".$d4;

$sentencia = $pdo->prepare("INSERT INTO tb_libros
      ( titulo, autor, ano_publicacion, paginas, estado) 
VALUES(:titulo,:autor,:ano_publicacion,:paginas,:estado)");

$sentencia->bindParam(':titulo',$d1);
$sentencia->bindParam(':autor',$d2);
$sentencia->bindParam(':ano_publicacion',$d3);
$sentencia->bindParam(':paginas',$d4);

$sentencia->bindParam(':estado',$estado);
$sentencia->execute();
