<?php include "header.php"; ?>
<body>
    <div class="container main">
        <h1 id="doctor">Doctor Logged In</h1>
        <hr>
  
        
        <center>
            <p id="patient">List of Patients</p>
            <table class="table table-hover table-bordered" id="doctable">
                <thead class="thead-inverse">
                    <tr>
                        <th>Patient id</th>
                        <th>Patient Name</th>
                </thead>
     <?php 
        $sql ="SELECT * FROM `users` WHERE type='patient'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
        while($row = mysqli_fetch_assoc($result)) 
        {
     ?>
                <tbody>
                    <tr>
                        <td><a href="doctor_viewing_patient.php?patient_id=<?php echo $row['id'] ?>"><?php echo $row['id']; ?></a>
                        </td>
                        <td><?php echo $row['usersname']; ?></td>
    <?php
        }
        } else {
            echo "0 results";
        }
    ?>
                    </tr>
                </tbody>
            </table>
        </center>
    </div>


<?php include "footer.php"; ?>
