<?php 
   include_once('login/session_login.php');
    include "header.php";
    ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 style="padding-top: 25px; ">Patient logged in</h2>
        <hr>
        <h5 style="font-weight: bold;">Patient Name : <span id="pi"><?php  echo $login_session; ?></span>
            </h5>
        <div class="form-group">
          <label for="comment">Medication:</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
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
            <tr>
              <td>2</td>
              <td>70</td>
              <td>120/80</td>
              <td>104</td>
              <td>30</td>
            </tr>
            <tr>
              <td>2</td>
              <td>70</td>
              <td>120/80</td>
              <td>104</td>
              <td>30</td>
            </tr>
            <tr>
              <td>2</td>
              <td>70</td>
              <td>120/80</td>
              <td>104</td>
              <td>30</td>
            </tr>
            <tr>
              <td>2</td>
              <td>70</td>
              <td>120/80</td>
              <td>104</td>
              <td>30</td>
            </tr>
            <tr>
              <td>2</td>
              <td>70</td>
              <td>120/80</td>
              <td>104</td>
              <td>30</td>
            </tr>
          </tbody>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>

<?php include "footer.php"; ?>