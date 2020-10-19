<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    echo "Connection failed : ".$e->getMessage();
}

$sql="SELECT * FROM products AS p JOIN categories AS c ON p.CategoryID=c.CategoryID";
$data = $conn->prepare($sql);
$data->execute();
$products = [];

while($row = $data->fetch(PDO::FETCH_OBJ))
{
    $products[] = 
        ["ProductID"=>$row->ProductID,
                  "ProductName"=>$row->ProductName,
                  "CategoryName"=>$row->CategoryName,
                  "UnitsInStock"=>$row->UnitsInStock
        ];
}
$abc=json_encode($products);
print_r($abc);

?>