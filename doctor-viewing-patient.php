<!DOCTYPE html>
<html>

<head>
    <title>Doctor Logged in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mainone">
        <h1 id="doctor">Doctor Viewing Patient</h1>
        <hr>
        <div class="name">
            <p>Patient ID :-<span id="pi">005</span>
            </p>
            <p>Patient Name :-<span id="pn">Ahmad Khan</span>
            </p>
        </div>
        <div class="medication">
            <div class="form-group">
                <label for="comment">Medication:-</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <br>
                 <button type="submit" class="btn btn-success" id="btn">Update Medication</button>
                 <br>
            </div>

           
            <h4>Record:</h4>
            <table class="table table-hover table-bordered"  cellspacing="0">
                <thead class="thead-inverse" <tr>
                    <th>Time Date</th>
                    <th>Pulse</th>
                    <th>B.P</th>
                    <th>Temperature</th>
                    <th>Glucose</th>
                </thead>
                <tbody>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3:00</td>
                        <td>72</td>
                        <td>120/80</td>
                        <td>50</td>
                        <td>100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>

</html>