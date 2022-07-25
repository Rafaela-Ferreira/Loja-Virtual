<?php

    echo 'Script para receber e armazenar os dados de algum produto';

    $productName = $_GET['productName'];
    $productDescription = $_GET['productDescription'];
    $productCategoty =$_GET ['productCategory'];
    $productPrice = $_GET['productPrice'];
    $urlProductImage =$_GET ['urlProductImage'];


    //conexão com o banco de dados

    $hostname = 'localhost';
    $user = 'root';
    $password = 'ifsp';
    $database = 'store';

    $conn = mysqli_connect($hostname, $user, $password, $database);
    if($conn){
        echo 'Conexão com o banco efetuada com sucesso!!!';
        //Gravar os dados no banco de dados
        $query = "insert into products (productName, productDescription, productCategory, productUrlImage,productPrice) 
        values ('".$productName."','".$productDescription."','".$productCategoty."','".$urlProductImage."',".$productPrice.");";
        
        echo '<br />'.$query;
        $res = mysqli_query($conn, $query);

        if($res){
            echo '<h2>Produto incluido com sucesso!!!</h2>';
        }else{
            echo '<h2>Produto não incluido.</h2>';
        }

    }else{
        echo 'Conexão com o banco de dados não efetuada!!! <br />';
        echo mysqli_connect_error();
    }

    

?>