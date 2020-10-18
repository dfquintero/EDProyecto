<?php
$servername = "localhost";
$database = "prueba";
$username = "jorodriguezal";
$password = "12345";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: <br>" . mysqli_connect_error());
}
echo "Connected successfully <br>";

//Inserción en habitaciones
//10000 datos
/*for ($i = 1001; $i <=10000; $i++){
    $vivienda = rand( 1 , 1000);
    $area = rand(10, 500);
    $precio =  rand(100000, 5000000);
    $otro = 'otro';
    $vip = 1;
    $query = "INSERT INTO HABITACION VALUES ('".$i."', '".$vivienda."','".$area."','".$otro."', '".$precio."', '".$vip."');";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
     } else {
        echo "Error: " . $query . "" . mysqli_error($conn);
     }
}*/
//Inserción en habitaciones
//100000 datos
for ($i = 41484; $i <=100000; $i++){
    $vivienda = rand( 1 , 1000);
    $area = rand(10, 500);
    $precio =  rand(100000, 5000000);
    $otro = 'otro';
    $vip = 1;
    $query = "INSERT INTO HABITACION VALUES ('".$i."', '".$vivienda."','".$area."','".$otro."', '".$precio."', '".$vip."');";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
     } else {
        echo "Error: " . $query . "" . mysqli_error($conn);
     }
}

mysqli_close($conn);


?>