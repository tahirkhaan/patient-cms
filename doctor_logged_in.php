<?php include("config/conn.php");
include_once('includes/session_login.php');
$message = "";
$success = false;
if (isset($_POST['update_phone_doctor']) and $_POST['phone_number'] !== "") {
    $phone = $_POST['phone_number'];
    // update phone #
    $sql = "UPDATE users SET phone='$phone' WHERE id LIKE '$idSession'";
    if (mysqli_query($conn, $sql)) {
        $success = true;
        $message = "Phone number updated successfully!";
    } else {
        $success = false;
        $message = "Phone number not updated due to a problem!";
    }
}
include "header.php"; ?>
<body>
<div class="container main">
  <h1 id="doctor">Welcome Dr. <?php echo $name; ?></h1>
  <p style="float: right; font-size: 25px;"><a href="includes/logout.php">
      <button type="button" class="btn btn-danger">Logout</button>
    </a></p>
  <hr>

  <p class="neat-heading">List of Patients</p>

    <?php
    include("config/conn.php");
    $sql = "SELECT * FROM `users` WHERE type='patient'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        ?>
      <table class="table table-hover table-bordered" id="doctable">
        <thead class="thead-inverse">
        <tr>
          <th>Patient ID</th>
          <th>Patient Name</th>
        </thead>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
              ?>

            <tbody>
            <tr>
              <td><a
                  href="doctor_viewing_patient.php?patient_id=<?php echo $row['id'] ?>"><?php printf("%03d", $row['id']); ?></a>
              </td>
              <td><a
                  href="doctor_viewing_patient.php?patient_id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a>
              </td>
            </tr>
            </tbody>

              <?php
          }
          ?>
      </table>
        <?php
    } else {
        ?>
      <div class="alert alert-danger">
        There are no patients right now. Once people register as patients, they'd start showing up here.
      </div>
        <?php
    }
    ?>

  <p class="neat-heading">Change your phone number</p>

    <?php if ($message !== "" and $success) { ?>
      <div class="alert alert-success ">
          <?php
          echo $message;
          ?>
      </div>
    <?php } elseif ($message !== "" and !$success) { ?>
      <div class="alert alert-danger ">
          <?php
          echo $message;
          ?>
      </div>
        <?php
    }
    ?>
  <form method="post" name="update_phone_doctor">
    <input style="width: 250px; height: 30px; " name="phone_number" value="<?php echo $phone; ?>"/>
    <button style="display: block; margin: 20px 0;" name="update_phone_doctor" class="btn btn-success">Change</button>
  </form>

</div>
<?php include "footer.php"; ?>
