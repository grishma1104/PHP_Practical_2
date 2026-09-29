<?php 
include "db.php";
header("content-type:text/csv");
header("content-disposition:attachement; filename=p.csv");
$output=fopen("php://output","w");
fputcsv($output,array("ID","Name","Category","Price","Quantity","Brand","Description"));
$result=$conn->query("select * from products");
while($row=$result->fetch_assoc()){
    fputcsv($output,$row);
}

?>