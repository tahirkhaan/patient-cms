<?php

if (!isset($_GET) || !empty($_GET) && !empty($_GET['user_id']) && !empty($_GET['pulse']) && !empty($_GET['bp1']) && !empty($_GET['bp2']) && !empty($_GET['temp']) && !empty($_GET['glucose'])) {

    $userId = $str = ltrim($_GET['user_id'], '0');
    $pulse = $_GET['pulse'];
    $bp1 = $_GET['bp1'];
    $bp2 = $_GET['bp2'];
    $glucose = $_GET['glucose'];
    $temperature = $_GET['temp'];

    if (saveDataInDatabase($userId, $pulse, $bp1, $bp2, $glucose, $temperature)) {
        return json_encode(array('success' => true));
    } else {
        return json_encode(array('success' => false));
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

    $sql = "insert into patient_readings (user_id, pulse, bp1, bp2, glucose,temp) values ($userId, $pulse, $bp1, $bp2, $glucose, $temperature)";

    /*
        Pulse : Between 60 to 100 is normal
        BP1 = Below 120 or equal is normal
        BP2 = Below 80 or equal is normal
        Glucose : Below 200 is normal
        Temperature: Below 38 is normal
    */


    if (mysqli_query($conn, $sql)) {
        if (!($pulse >= 60 and $pulse <= 100 and $bp1 <= 120 and $bp2 <= 80 and $glucose < 200 and $temperature < 38)) {
            $sql = "SELECT * FROM users WHERE type LIKE 'doctor'";
            $result = mysqli_query($conn, $sql);
            $doctor = mysqli_fetch_assoc($result);

            // Get doctor's phone number

            // $doctorName = $doctor['name'];
            // $doctorID = $doctor['id'];
            $doctorNo = $doctor['phone'];

            // Send SMS alert
            echo json_encode(sendDoctorSMS($doctorNo, $userId));
        }
        return true;
    } else {
        return false;
    }
}

function sendDoctorSMS($phoneNo, $patientID)
{
    $message = "Alert: New data uploaded to website. Abnormal values detected. Please check data for Patient ID : " . $patientID;
    include_once __DIR__ . "/includes/send-sms.php";
    $response = sendSMS($phoneNo, $message);
    return json_decode($response);
}
