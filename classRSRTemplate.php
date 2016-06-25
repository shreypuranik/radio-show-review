<?php

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
}
