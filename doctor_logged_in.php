<?php include("config/conn.php");
include_once('includes/session_login.php');
include "header.php"; ?>
<body>
<div class="container main">
  <h1 id="doctor">Welcome Dr. <?php echo $name; ?></h1>
  <p style="float: right; font-size: 25px;"><a href="includes/logout.php">
      <button type="button" class="btn btn-default">Logout</button>
    </a></p>
  <hr>

  <p id="patient">List of Patients</p>
  <table class="table table-hover table-bordered" id="doctable">
    <thead class="thead-inverse">
    <tr>
      <th>Patient ID</th>
      <th>Patient Name</th>
    </thead>
      <?php
      include("config/conn.php");
      $sql = "SELECT * FROM `users` WHERE type='patient'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0)
      {
      while ($row = mysqli_fetch_assoc($result))
      {
      ?>
    <tbody>
    <tr>
      <td><a href="doctor_viewing_patient.php?patient_id=<?php echo $row['id'] ?>"><?php echo $row['id']; ?></a>
      </td>
      <td><a href="doctor_viewing_patient.php?patient_id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></td>
        <?php
        }
        } else {
            echo "0 results";
        }
        ?>
    </tr>
    </tbody>
  </table>

</div>
<?php include "footer.php"; ?>
