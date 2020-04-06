<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
include 'connection.php';
//logout
include('logout.php');

//remember me
include 'remember.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel='stylesheet' href="mycss/mycss.css">

        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Arvo">

        <title>myonlinenote</title>
    </head>
    <body>
        <!-- Navigation bar -->
        <nav role ='navigation' class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Online Notes</a>
                    <button type="button" class="navbar-toggle" data-target='#navbarCollapse' data-toggle='collapse'>
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->

        <div class="jumbotron" id="myContainer">
            <h1>Online Notes App</h1>
            <p>Your notes with you wherever you go</p>
            <p>easy to use, protects all your notes.</p>
            <button type="button" class="btn btn-lg green signup" data-toggle="modal" data-target="#exampleModal">Signup - its free</button>

        </div>

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <p>Codershift.com copyright  &copy; 2015-<?php $today = date(Y);
echo $today;
?></p>
            </div>
        </div>




        <!-- signup modal -->
        <form method="post" id="signupForm">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Signup today and Start using our Online Notes App!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="signupMessage"></div>

                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input id="username" class="form-control" type="text" name="username" placeholder="Username" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" class="form-control" type="password" name="password" placeholder="Password" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="password2" class="sr-only">Confirm Password</label>
                                <input id="password2" class="form-control" type="password" name="password2" placeholder="Confirm Password" maxlength="30">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn green" name="signup" value="Signup" >   
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- login modal -->
        <form method="post" id="loginForm">
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="loginMessage"></div>


                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email</label>
                                <input id="loginemail" class="form-control" type="email" name="loginemail" placeholder="Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input id="loginpassword" class="form-control" type="password" name="loginpassword" placeholder="Password" maxlength="30">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme">
                                    Remember me
                                </label>
                                <a class="pull-right" style="cursor: pointer;" data-dismiss="modal" href="#forgotPasswordModal" data-toggle="modal">Forgot Password?</a>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn green" name="login" value="Login" >   
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#exampleModal" data-toggle="modal">Register</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- forgot password modal -->
        <form method="post" id="forgotPassword">
            <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="forgotpasswordmessage"></div>


                            <div class="form-group">
                                <label for="originalEmail" class="sr-only">Email</label>
                                <input id="originalEmail" class="form-control" type="email" name="originalEmail" placeholder="Email" maxlength="50">
                            </div>




                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn green" name="submit" value="Submit" >   
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#exampleModal" data-toggle="modal">Register</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="myjs/myjs.js"></script>
</body>
                </html>
