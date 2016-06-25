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
    <div class="col-sm-2"></div>

    <div class="col-sm-7">
<br />
    <form>
        <fieldset class="form-group">
            <label for="exampleInputEmail1">Show Name</label>
            <input type="text" class="form-control" id="showNameInput" placeholder="Enter show name (eg The Breakfast Show)">
        </fieldset>
        <fieldset class="form-group">
            <label for="exampleInputEmail1">Show Host(s)</label>
            <input type="text" class="form-control" id="showHostInput" placeholder="Enter show host (eg Jack Radio and Jill Radio)">
        </fieldset>




        <button type="submit" id="showDetailsSubmit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <div class="col-sm-3 pageSideBlurb">
        <br /><p>Fill in the form with the show name, and show host. Once this is done, the show will appear in the list shows that are available to reviewed.</p>
</div>
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