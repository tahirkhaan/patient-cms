<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Patient logged in</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">

</head>

<body style="font-size: 14px;">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 style="padding-top: 25px; ">Patient logged in</h2>
        <hr>
        <h5 style="font-weight: bold;">Patient Name : <span id="pi">Ahmed shah</span>
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

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>

</body>

</html>