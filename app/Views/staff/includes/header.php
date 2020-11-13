<!DOCTYPE html>

<html>
    <head>
           <!--Staff -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="/assets/style.css" rel="stylesheet" type="text/css"/>
        <title><?php
        echo $pageTitle;
        ?></title>

    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
<!--                <a class="navbar-brand" href="<?php echo base_url().'/staff';   ?>">STAFF</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <?php
                          echo anchor(base_url().'/staff/profile', 'Your Profile','class="nav-link"');
                            ?>
    
                        </li>
                        <li class="nav-item active">
                            <?php
                           
                            ?>
    
                        </li>
                        <li class="nav-item active">
                            <?php
                            echo anchor(base_url().'/staff/changepassword', 'Change Password','class="nav-link"');
                            ?>
                           
                        </li>
                        <li class="nav-item active">
                            <?php
                           echo anchor(base_url().'/login/logout', 'Logout','class="nav-link"');
                            ?>
                           
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p><i>Staff controller</i></p>
                </div>
            </div>
        </div>
