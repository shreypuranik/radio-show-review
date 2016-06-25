<?php
include_once("class.RSRData.php");
/**
 * Class RSRTemplate
 */
class RSRTemplate
{


    /**
     * Get the header HTML
     * @return string
     */
    public static function getPageHeader()
    {

    $html =<<<EOD

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
            background: #563d7c;
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
        .page-header{
            text-align:center;
        }


    </style>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="#">Radio Show Reviews</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=add-shows">Add shows</a></li>
                <li><a href="index.php?page=view-shows">View shows</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div class="row headline">
    <div class="page-header">
        <h1><span style="color:#003300;">Improve your station sound</span> <small>with feedback that matters</small></h1>
    </div>
</div>
EOD;
    return $html;
    }

    /**
     * Get the main page body html
     * @return string
     */
    public static function getPageMainBody()
    {

        $html = "";

        switch($_GET['page'])
        {
            case "home":

                break;
            case "add-shows":
                $html =<<<EOD
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
EOD;
                break;
            case "view-shows":
                $r = new RSRData();
                $datas = $r->getAvailableShowsForReview();
                $html =<<<EOD
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
EOD;
                foreach($datas as $id => $value){
                    $showName = $value['showName'];
                    $showHost = $value['showHost'];
                    $id = (string)$value['_id'];

                    $html .="<tr>";
                    $html .= "<td>".$showName."</td>";
                    $html .= "<td>".$showHost."</td>";
                    $html .= "<td><a href='viewShow.php?id=".$id."'>More info</a></td>";
                    $html .= "</tr>";

                }

                $html .=<<<EOD
                            </tbody>
            </table>
    </div>
</div>
EOD;
                break;
        }

        return $html;
    }





    /**
     * Get the page Footer HTML
     * @return string
     */
    public static function getPageFooter()
    {
        $html = <<<EOD
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
EOD;
        return $html;

    }
}


