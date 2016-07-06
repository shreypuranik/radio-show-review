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
            background: #003300;
            color: white;
            padding: 40px 0;
        }

        .pageSideBlurb{
            color: grey;
        }
        .page-header{
            text-align:center;
        }
        .options a {
        color: white;
        }
        .hide-form{
        display:none;
        }



    </style>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="index.php">Radio Show Reviews</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=add-shows">Add shows</a></li>
                <li><a href="index.php?page=view-shows">View today's shows</a></li>
                <li><a href="index.php?page=view-history">View past show reviews</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div class="row headline">
    <div class="page-header">
        <h1><span style="color:#003300;">Improve your station</span> <small>with feedback that matters</small></h1>
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
            case "view-history":
                $r = new RSRData();
                $datas = $r->getAvailableCollectionDates();
                $html =<<<EOD
                <div class="container">
    <div class="row" id="showDetailsDiv">
<p>Available dates with submitted show content (archive) </p>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>Date</th>
                <th>More Info</th>
            </tr>
            </thead>
            <tbody>
EOD;
                foreach($datas as $date){
                    $time = strtotime($date);
                    $dateFormat = date("l jS F Y", $time);
                    $html .="<tr>";
                    $html .= "<td>".$dateFormat."</td>";
                    $html .= "<td><button type='button' class='btn btn-primary btn-sm options'><a href='viewPastReviews.php?date=".$date."'>More info</a></button></td>";
                    $html .= "</tr>";

                }

                $html .=<<<EOD
                            </tbody>
            </table>
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
                <th>Feedback</th>
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
                    $html .= "<td><button type='button' class='btn btn-primary btn-sm options'><a href='viewShow.php?id=".$id."'>More info</a></button></td>";
                    $html .= "</tr>";

                }

                $html .=<<<EOD
                            </tbody>
            </table>
    </div>
</div>
EOD;
                break;
            default:
                $html =<<<EOD
                               <div class="container">
    <div class="row" id="showDetailsDiv">
    <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">The idea...</h3>
  </div>
  <div class="panel-body">
 <p>Running a radio station can be hard work, especially when there are lots of shows to maintain.This tool allows you to store reviews of shows from your station.</p>
 <p>On this version of the tool, you can:</p>
 <ul>
 <li><a href="index.php?page=add-shows">Add a new show to be reviewed</a></li>
 <li><a href="index.php?page=view-shows">Review an existing show that's in the system and was added today</a></li>
 <li><a href="index.php?page=view-history">Read past show reviews</a></li>
 </ul>
                </div>
</div>
    <div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">The technical bit</h3>
  </div>
  <div class="panel-body">
 <p>This application runs using PHP, and MongoDB. You will need to have both of these installed on your server. I've tried to make this as accessible as possible, but feel free to submit a <a href="https://github.com/shreypuranik/radio-show-review">pull request on GitHub</a>. </p>
                </div>
</div>
</div>
</div>
EOD;


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

    /**
     * Return the show view
     */
    public static function getShowView()
    {
        $showID = $_GET['id'];
        $rsrData = new RSRData();
        $date = (isset($_GET['date']) ? $_GET['date']: '');
        $showData = $rsrData->getExistingShowData($showID, $date);

        $showAddition = date("d M Y", $showData['date']);

        $formClassHTML = "";

        if (!empty($date)){
            $formClassHTML = "class='hide-form'";
        }
        $showReviewHTML = "";

        if (!empty($showData['showReview'])
            && !empty($showData['showReviewer']))
        {
            $reviewTime = date("d M Y", $showData['reviewTime']);
            $showReviewHTML =<<<EOD

              <div class="panel panel-warning" id="currentReview">
  <div class="panel-heading">
    <h3 class="panel-title">{$showData['showReviewer']} said on {$reviewTime}...</h3>
  </div>
  <div class="panel-body">
 <p>{$showData['showReview']}</p>

                </div>
                </div>
EOD;

        }


        $html = <<<EOD
                <div class="container">
<div class="row" id="showDetailsDiv">
    <div class="col-sm-2"></div>

    <div class="col-sm-7">
<br />
<h3>Show Review for {$showData['showName']}</h3>
    <form  {$formClassHTML}>
    <input type="hidden" name="showName" id="showName" value="{$showData['showName']}" />
        <fieldset class="form-group">
            <label for="exampleInputEmail1">Your name</label>
            <input type="text" class="form-control" id="reviewerNameInput" placeholder="Enter your name (eg Gary)">
        </fieldset>
        <fieldset class="form-group">
            <label for="exampleInputEmail1">Your review</label>
            <textarea class="form-control bs_input" rows="5" id="showReviewInput" name="showReview"></textarea>
        </fieldset>




        <button type="submit" id="showReviewSubmit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <div class="col-sm-3 pageSideBlurb">
        <br />
        <ul>
        <li>Show added on {$showAddition} </li>
        <li>Show hosts/personalities: {$showData['showHost']}</li>
        <li>X reviews to date</li>
        </ul>
</div>
</div>
{$showReviewHTML}
</div>
EOD;

        return $html;
    }

    /**
     * Get back the HTML for shows for
     * a supplied date
     * @param $date
     * @return string
     */
    public static function getShowsForDate($date)
    {
        $RSRData= new RSRData();
        $datas = $RSRData->getShowsForDate($date);
        $html =<<<EOD
                <div class="container">
    <div class="row" id="showDetailsDiv">
<p>Available shows for review: </p>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>Show Name</th>
                <th>Show Hosts</th>
                <th>Feedback</th>
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
            $html .= "<td><button type='button' class='btn btn-primary btn-sm options'><a href='viewShow.php?id=".$id."&date=".$date."'>More info</a></button></td>";
            $html .= "</tr>";

        }

        $html .=<<<EOD
                            </tbody>
            </table>
    </div>
</div>
EOD;

        return $html;
    }
}


