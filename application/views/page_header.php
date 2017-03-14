<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WeShare</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>css/mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
</head>

<body>


    <header>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <strong><h3>WeShare4U</h3></strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link">หน้าแรก <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <button onclick="location.href = '<?php echo base_url(); ?>index.php/donate/donor';" class="btn btn-primary" id="donorBtn">บริจาค</button>
                    <a href="<?php echo base_url(); ?>index.php/donate/recipient" class="btn btn-primary">รับบริจาค</a>
                </div>
            </div>
        </nav>
	    <!--/.Navbar-->

    </header>
