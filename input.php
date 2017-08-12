<?php

if (!isset($_GET) || !empty($_GET) && !empty($_GET['user_id']) && !empty($_GET['pulse']) && !empty($_GET['bp1']) && !empty($_GET['bp2']) && !empty($_GET['temp']) && !empty($_GET['glucose'])) {

    $userId = $_GET['user_id'];
    $pulse = $_GET['pulse'];
    $bp1 = $_GET['bp1'];
    $bp2 = $_GET['bp2'];
    $glucose = $_GET['glucose'];
    $temperature = $_GET['temp'];

    if (saveDataInDatabase($userId, $pulse, $bp1, $bp2, $glucose, $temperature)) {
        echo "Success";
    } else {
        echo "Fail";
    }
} else {
    echo "Please send the params i.e userid,  pulse = 'pulse' and BP as bp1 and bp2, glucose as glucose, temperature as temp";
}

function saveDataAsCsv($userId, $pulse, $bp1, $bp2, $glucose, $temperature)
{
    $list = array($userId, $pulse, $bp1, $bp2, $glucose, $temperature);
    $file = fopen("data.csv", "a+");
    if (fputcsv($file, $list)) {
        fclose($file);
        return true;
    }
    return false;
}

function saveDataInDatabase($userId, $pulse, $bp1, $bp2, $glucose, $temperature)
{
    include("config/conn.php");
    // TODO Set it up and debug this
    $sql = "insert into patient_readings (user_id, pulse, bp1, bp2, glucose,temp) values ($userId, $pulse, $bp1, $bp2, $glucose, $temperature)";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function sendDoctorSMS($phoneNo, $name, $id)
{
    $message = "Abnormal readings for patient ID = " + $id + ". Name = " + $name;
    include_once __DIR__ . "/includes/send-sms.php";
    $response = sendSMS($phone, $message);

    return false;
}
