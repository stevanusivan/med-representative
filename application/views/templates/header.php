<html>
  <head>
    <title>Farmaku</title>
    <!--<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">-->
    <link rel="stylesheet" text="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <!--<link rel="stylesheet" text="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" text="text/css" href="<?php echo base_url('assets/css/index.css'); ?>" />

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

  </head>
  <body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class = "container">
        <a class="navbar-brand" href="<?=base_url();?>">
          <img src="<?php echo base_url('assets/img/logo.png'); ?>" width="180px" height="35px"/>
        </a>


        <div class="collapse navbar-collapse" id="navbarColor01">
          <form class="form-inline my-2 my-lg-0" action="<?= base_url('pages/search');?>" method="post">
            <input class="form-control mr-sm-2" style="margin-top:15px" type="text" name="searchText" id="searchText" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" style="margin-top:15px" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
