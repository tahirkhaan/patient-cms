<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/conn.php");
include_once('includes/session_login.php');
if (isset($_GET["patient_id"]) and $_GET["patient_id"] !== "") {
    $patient_id = $_GET["patient_id"];
} else {
    die("Please send in a patient ID");
}

$sql = "SELECT * FROM users WHERE id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$theMessage = "";
$patient = mysqli_fetch_assoc($result);
$success = false;
$message = "";

$patientName = $patient['name'];
$patientID = $patient['id'];
$patientNo = $patient['phone'];

$sql = "SELECT * FROM patient_readings WHERE user_id = " . $patient_id;
$result_patient_data = mysqli_query($conn, $sql);


if (isset($_POST['purge'])) {
    $sql1 = "DELETE FROM patient_medication WHERE TRUE";
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "DELETE FROM users WHERE type NOT LIKE 'doctor'";
    $result2 = mysqli_query($conn, $sql2);

    $sql3 = "DELETE FROM patient_readings WHERE TRUE";
    $result3 = mysqli_query($conn, $sql3);

    $success = true;
    $message = "Database purged, you can start afresh.";

    $_SESSION['errormsg'] = $message;
    header("location: ./");

}

if (isset($_POST['submit_medication'])) {
    $medication = $_POST['medication'];

    $sql = "SELECT * FROM patient_medication WHERE user_id = " . $patient_id;
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount > 0) {
        $sql = "UPDATE patient_medication SET medication='$medication' WHERE user_id=" . $patient_id;
    } else {
        $sql = "INSERT INTO patient_medication (medication, user_id) VALUES ('$medication', '$patient_id')";
    }

    if (mysqli_query($conn, $sql)) {
        $success = true;
        $message = "Medication updated successfully";
        $smsResult = sendPatientSMS($patientNo, $patientName);

        if ($smsResult->success) {
            $smsSent = true;
            $message = $message . " and SMS sent to the patient.";
        } else {
            $smsSent = false;
            $message = $message . " but SMS not sent because there was a problem with SMS gateway. Please buy more credits for SMS.";
        }
    } else {
        $success = false;
        $message = "Error updating record: " . mysqli_error($conn);
    }

}
$sql = "SELECT * FROM patient_medication WHERE user_id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$patient_medication = mysqli_fetch_assoc($result);
mysqli_close($conn);

include "header.php";
?>

<body>
<div class="container mainone">
  <h1 id="doctor">Medication details for <span id="pn"><?php echo $patient['name']; ?></span></h1>
  <p style="float: right; font-size: 25px;"><a href="includes/logout.php">
      <button type="button" class="btn btn-danger">Logout</button>
    </a></p>
  <hr>
  <div class="alert alert-danger danger-zone">
    <form action="" method="post" id="dangerzone">
      <button name="purge" onclick="dangerZone()" type="submit" class="btn btn-danger" style="float:none">Delete
        everything except the doctor's login
      </button>
    </form>
  </div>
  <div class="name">
    <h4>Patient ID: <span id="pi"><?php echo $patient['id']; ?></span>
    </h4>
    <h4>Patient Name: <span id="pn"><?php echo $patient['name']; ?></span>
    </h4>

  </div>
  <div class="medication">
      <?php if ($message !== "") { ?>
        <div class="alert <?php echo ($success and $smsSent) ? "alert-success" : "alert-danger" ?>">
            <?php
            echo $message;
            ?>
        </div>
      <?php } ?>

    <form action="" method="post" id="med">
      <div class="form-group">
        <h4>Medication:</h4>
        <textarea name="medication" class="form-control" rows="5"
                  id="medication"><?php echo $patient_medication['medication']; ?></textarea>
        <br>

        <button name="submit_medication" type="submit" class="btn btn-success" style="float: right">Update Medication
        </button>
    </form>
    <br>
  </div>
  <h4>Record:</h4>
  <table class="table table-hover table-bordered" cellspacing="0">
    <thead class="thead-inverse">
    <th>Time</th>
    <th>Pulse</th>
    <th>B.P</th>
    <th>Temperature</th>
    <th>Glucose</th>
    </thead>
    <tbody>
    <?php while ($patient = mysqli_fetch_assoc($result_patient_data)) { ?>
      <tr>
        <td><?php
            date_default_timezone_set('asia/karachi');
            echo date('d/m/Y h:i:s A', strtotime($patient['timestamp']));
            ?></td>
        <td><?php echo $patient['pulse']; ?></td>
        <td><?php echo $patient['bp1'] . '/' . $patient['bp2']; ?></td>
        <td><?php echo $patient['temp']; ?></td>
        <td><?php echo $patient['glucose']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<script>
  function dangerZone() {
    confirm("Are you sure?");
  }
</script>
<?php
function sendPatientSMS($phoneNo, $name)
{
    $message = "Dear " . $name . ", your medication has been updated at www.mypatientmonitoring.com";
    include_once __DIR__ . "/includes/send-sms.php";
    $response = sendSMS($phoneNo, $message);
    echo $response;
    print_r(json_decode($response));
    return json_decode($response);
}

include "footer.php"; ?>
