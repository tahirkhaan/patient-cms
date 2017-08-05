<?php include "header.php"; ?>
<body>
<div class="container mainone">
  <h1 id="doctor">Doctor Viewing Patient</h1>
  <p  style="float: right; font-size: 25px;"><a href="login/logout.php">Logout</a></p>
  <hr>
 <?php
if (isset($_GET["patient_id"]))
{
  $patient_id = $_GET["patient_id"];
}

$sql = "SELECT * FROM users where id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_assoc($result);
$sql = "SELECT * FROM patient_readings where user_id = " . $patient_id;
$result_patient_data = mysqli_query($conn, $sql);
$sql = "SELECT * FROM patient_medication where user_id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$patient_medication = mysqli_fetch_assoc($result);

if (isset($_POST['submit_medication']))
{
  $medication = $_POST['medication'];
  $sql = "UPDATE patient_medication SET medication='$medication' WHERE user_id=" . $patient_id;
  if (mysqli_query($conn, $sql))
  {
    echo "Record updated successfully";
  }
  else
  {
    echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} ?>
    
  <div class="name">
    <p>Patient ID: <span id="pi"><?php echo $patient['id']; ?></span>
    </p>
    <p>Patient Name: <span id="pn"><?php echo $patient['usersname']; ?></span>
    </p>
    
  </div>
  <div class="medication">
  <form action="" method="post" id="med" >
    <div class="form-group">
      <label for="medication">Medication:-</label>
      <textarea name="medication" class="form-control" rows="5" id="medication"><?php echo $patient_medication['medication'];?></textarea>
      <br>
      <button name="submit_medication" type="submit" class="btn btn-success" id="btn">Update Medication</button>
      </form><br>
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
      <?php while($patient = mysqli_fetch_assoc($result_patient_data)) {?>
   <tr>
        <td><?php echo $patient['timestamp'];?></td>
        <td><?php echo $patient['pulse'];?></td>
        <td><?php echo $patient['bp1'].'/'.$patient['bp2'];?></td>
        <td><?php echo $patient['temp'];?></td>
        <td><?php echo $patient['glucose'];?></td>
      </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
</div>

<?php include "footer.php"; ?>
