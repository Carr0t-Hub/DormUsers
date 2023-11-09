<?php
// Establish a database connection (replace with your database configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pds_db";

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the POST request
$name = $_POST["name"];
$email = $_POST["email"];
$dateCheckIn = $_POST["dateCheckIn"];
$dateCheckOut = $_POST["dateCheckOut"];
$quantity = $_POST["quantity"];
$status = "requested";
$roomType = $_POST["rooms"];
$purpose = $_POST["purpose"];

$dateTimein = DateTime::createFromFormat('m-d-y', $dateCheckIn);
$dateTimeOut = DateTime::createFromFormat('m-d-y', $dateCheckOut);

$newdateCheckIn = $dateTimein->format('Y-m-d');
$newdateCheckOut = $dateTimeOut->format('Y-m-d');

//Today (YYYY-MM-DD)
$today = date("Y-m-d");
$query_add = '';


$ref_No = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'pds_db'
AND   TABLE_NAME   = 'dorm_reservation'";
$ref_res = $conn->query($ref_No);
$month = date("m");
$year = date("Y");

if ($ref_res->num_rows > 0) {
    // output data of each row
    while ($row = $ref_res->fetch_assoc()) {
        $controlNo2 =  $year . "-" . $month . "-" . sprintf("%04d", $row["AUTO_INCREMENT"]);
    }
} else {
}

$controlNo = $controlNo2;



//  $sql = "INSERT INTO dormreservation (
// controlNo, 
// dateFiled,
// `name`,
// `status`,
// `dateCheckIn`,
// `dateCheckOut`

// )
//  VALUES (
// '$controlNo', 
// '$today',
// '$name',
// '$Status',
// '$newdateCheckIn',
// '$newdateCheckOut'
// )";


$sql = "INSERT INTO dorm_reservation (
            controlNo,
            name,
            email,
            dateCheckIn,
            dateCheckOut,
            guestQty,
            roomType,
            purpose,
            status
            )
        VALUES (
            '$controlNo',
            '$name',
            '$email',
            '$newdateCheckIn',
            '$newdateCheckOut',
            '$quantity',
            '$roomType',
            '$purpose',
            '$status'
            )";


if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo $conn->error;
}

$conn->close();
