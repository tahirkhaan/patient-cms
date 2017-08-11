<?php
error_reporting( E_ALL );
ini_set('display_errors', 1);

include("config/conn.php");
include_once('includes/session_login.php');
if (isset($_GET["patient_id"])) {
    $patient_id = $_GET["patient_id"];
}

$sql = "SELECT * FROM users WHERE id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_assoc($result);
$success = false;
$message = "";

$sql = "SELECT * FROM patient_readings WHERE user_id = " . $patient_id;
$result_patient_data = mysqli_query($conn, $sql);

if (isset($_POST['submit_medication'])) {
    $medication = $_POST['medication'];

    $sql = "SELECT * FROM patient_medication WHERE user_id = " . $patient_id;
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount > 0) {
        $sql = "UPDATE patient_medication SET medication='$medication' WHERE user_id=" . $patient_id;
    } else {
        $sql = "INSERT INTO patient_medication (medication, user_id)
VALUES ('$medication', '$patient_id')";
    }

    if (mysqli_query($conn, $sql)) {
        $success = true;
        $message = "Record updated successfully";
        if (sendSMS()) {
            $smsSent = true;
            $message = $message . " and SMS sent to the patient.";
        } else {
            $smsSent = false;
            $message = $message . " and SMS not sent because there was a problem with SMS gateway.";
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
      <button type="button" class="btn btn-default">Logout</button>
    </a></p>
  <hr>

  <div class="name">
    <p>Patient ID: <span id="pi"><?php echo $patient['id']; ?></span>
    </p>
    <p>Patient Name: <span id="pn"><?php echo $patient['name']; ?></span>
    </p>

  </div>
  <div class="medication">
      <? if ($success && $smsSent) { ?>
        <div class="alert alert-success">
          <strong>Success!</strong> <?php echo $message; ?>
        </div>
      <?php } elseif ($success && !$smsSent) { ?>
        <div class="alert alert-warning">
          <strong>Warning!</strong> <?php echo $message; ?>
        </div>
      <?php } else if ($message != "") { ?>
        <div class="alert alert-danger">
          <strong>Danger!</strong> <?php echo $message; ?>
        </div>
          <?php
      }
      ?>

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
        <td><?php echo $patient['timestamp']; ?></td>
        <td><?php echo $patient['pulse']; ?></td>
        <td><?php echo $patient['bp1'] . '/' . $patient['bp2']; ?></td>
        <td><?php echo $patient['temp']; ?></td>
        <td><?php echo $patient['glucose']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</div>

<?php
function sendSMS()
{
    return false;
}

include "footer.php"; ?>
