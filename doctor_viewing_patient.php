<?php
 include ("config/conn.php");
 include_once('includes/session_login.php'); 
  include "header.php";
  if (isset($_GET["patient_id"]))
{
  $patient_id = $_GET["patient_id"];
}
  $sql = "SELECT * FROM users where id = " . $patient_id;
  $result = mysqli_query($conn, $sql);
  $patient = mysqli_fetch_assoc($result); 
  ?>
<body>
  <div class="container mainone">
    <h1 id="doctor">Viewing Medication Details for  <span id="pn"><?php  echo $name; ?></span></h1>
    <p  style="float: right; font-size: 25px;"><a href="includes/logout.php"><button type="button" class="btn btn-default">Logout</button></a></p>
      <hr>
  <div class="alert alert-success">
    <strong>Success!</strong>
    <?php
        if (isset($_SESSION['updatemsg'])) {
        echo $_SESSION['updatemsg'];
        $_SESSION['updatemsg'] = "";
      }
    ?>
</div>
 <?php

$sql = "SELECT * FROM patient_readings where user_id = " . $patient_id;
$result_patient_data = mysqli_query($conn, $sql);
?>
<?php
if (isset($_POST['submit_medication']))
{
  $medication = $_POST['medication'];

$sql = "SELECT * FROM patient_medication where user_id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0){
  $sql = "UPDATE patient_medication SET medication='$medication' WHERE user_id=" . $patient_id;
}else{
       $sql =  "INSERT INTO patient_medication (medication, user_id)
VALUES ('$medication', '$patient_id')";
}
  if (mysqli_query($conn, $sql))
  {
    $_SESSION['updatemsg'] =  "Record updated successfully";
    // smsFeature();
  }
  else
  {
    echo "Error updating record: " . mysqli_error($conn);
  }  
}
$sql = "SELECT * FROM patient_medication where user_id = " . $patient_id;
$result = mysqli_query($conn, $sql);
$patient_medication = mysqli_fetch_assoc($result);
mysqli_close($conn); ?>
    
  <div class="name">
    <p>Patient ID: <span id="pi"><?php echo $patient['id']; ?></span>
    </p>
    <p>Patient Name: <span id="pn"><?php echo $patient['name']; ?></span>
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
<?php
// function smsFeature(){
//   // Require the bundled autoload file - the path may need to change
// // based on where you downloaded and unzipped the SDK

//     require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
//     use Twilio\Rest\Client;
// // Use the REST API Client to make requests to the Twilio REST API
 

// // Your Account SID and Auth Token from twilio.com/console
// $sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
// $token = 'your_auth_token';
// $client = new Client($sid, $token);

// // Use the client to do fun stuff like send text messages!
// $client->messages->create(
//     // the number you'd like to send the message to
//     '+923129577572',
//     array(
//         // A Twilio phone number you purchased at twilio.com/console
//         'from' => '+923129577572',
//         // the body of the text message you'd like to send
//         'body' => "Hey Jenny! Good luck on the bar exam!"
//     )
// );

// } 
 ?>

<?php include "footer.php"; ?>