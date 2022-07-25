<?php
    //echo "Script de leitura de dados";
    //conexão com o banco de dados
    $dbHost = "localhost";//onde está o banco de dados
    $dbUser = "root";
    $dbPassword = "ifsp";
    $dbName = "store";
    $connection = mysqli_connect($dbHost,$dbUser,$dbPassword, $dbName);
    if($connection){
        //echo "<br />Conexão efetuada com sucesso! ";
        //Realizar a leitura do banco
        $query = "select * from products";
        $results = mysqli_query($connection, $query);
        //var_dump($results);
        //Entregar os dados para quem pediu
        $products = [];
        $index = 0;

        while($record = mysqli_fetch_row($results)){
            $product = new stdClass(); //criando um objeto
            $product->id =$record[0];
            $product->name =$record[1];
            $product->description =$record[2];
            $product->Category =$record[3];
            $product->urlProductImage =$record[4];
            $product->price =$record[5];
            $products[$index] = $product;
            $index = $index +1;

        }
        //var_dump($product);
        echo json_encode($products);

    }else{
        echo "<br />Conxão não efetuada!";
        echo "<br />". mysqli_connect_error();
    }


?>

?>