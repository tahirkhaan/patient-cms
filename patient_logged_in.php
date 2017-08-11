<?php
include("config/conn.php");
include_once('includes/session_login.php');
include "header.php";
?>
  <body>
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2 id="doctor" style="padding-top: 25px; ">Welcome <span id="pn"><?php echo $name; ?></span></h2></center>
      <p style="float: right; font-size: 25px;"><a href="includes/logout.php">
          <button type="button" class="btn btn-default">Logout</button>
        </a></p>
      <hr>
      <h5 style="font-weight: bold;">Patient ID : <span id="pi"><?php echo $idSession; ?></span>
      </h5>
      <h5 style="font-weight: bold;">Patient Name : <span id="pnn"><?php echo $name; ?></span>
      </h5>
        <?php
        $sql = "SELECT * FROM patient_readings WHERE user_id = " . $idSession;
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM patient_medication WHERE user_id = " . $idSession;
        $result1 = mysqli_query($conn, $sql);
        $patient_medication = mysqli_fetch_assoc($result1);
        ?>
      <div class="form-group">
        <label for="comment">Medication:</label>
        <textarea class="form-control" rows="5" id="comment"
                  readonly><?php echo $patient_medication['medication']; ?></textarea>
      </div>

      <h4>Record:</h4>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Time/Date</th>
          <th>Pulse</th>
          <th>B.P</th>
          <th>Temp</th>
          <th>Glucose</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($patient = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $patient['timestamp']; ?></td>
            <td><?php echo $patient['pulse']; ?></td>
            <td><?php echo $patient['bp1'] . '/' . $patient['bp2']; ?></td>
            <td><?php echo $patient['temp']; ?></td>
            <td><?php echo $patient['glucose']; ?></td>
          </tr>
        <?php } ?>
        </tbody>
    </div>
    </table>
  </div>
</div>
<?php include "footer.php";
