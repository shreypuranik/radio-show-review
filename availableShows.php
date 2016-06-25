<?php
include_once("class.RSRData.php");
?>
<html>
<head>
    <title>Radio Show Review System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="scripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <style>
        .headerbox{
            background: #004c00;
            color: white;
        }
        .bs_input{
            width: 65%;
        }
        .footer{
            background: #2c2d2e;
            color: white;
        }

        .pageSideBlurb{
            color: grey;
        }
    </style>

</head>
<body>
<div class="row headerbox">
    <div class="col-sm-6 ">
        <h3>&nbsp; Radio Show Reviews</h3>
    </div>
    <div class="col-sm-6">
    </div>
</div>
<div class="container">
    <div class="row" id="showDetailsDiv">
<p>Available shows for review: </p>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>Show Name</th>
                <th>Show Hosts</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody>

<?php
$r = new RSRData();
$datas = $r->getAvailableShowsForReview();

foreach($datas as $id => $value){
    $showName = $value['showName'];
    $showHost = $value['showHost'];
    $id = (string)$value['_id'];

    echo "<tr>";
    echo "<td>".$showName."</td>";
    echo "<td>".$showHost."</td>";
    echo "<td><a href='viewShow.php?id=".$id."'>More info</a></td>";
    echo "</tr>";

}

?>
            </tbody>
            </table>
    </div>
</div>


<div class="row footer">
    <div class="col-sm-6 ">
        <span>&nbsp; Built with love, using PHP &amp; MongoDB</span>
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3 ">
        <span>&nbsp; Pull requests welcome. Fork me on <a href="https://github.com/shreypuranik/radio-show-review" target="_blank">GitHub</a>.</span>
    </div>
</div>

</body>
</html>