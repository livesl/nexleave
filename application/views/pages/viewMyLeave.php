
<html >
    <head>

       <meta charset="utf-8" />
        <title>Nex Leave Application</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <link href="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-content/app.css" rel="stylesheet" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <link href="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-content/app.css" rel="stylesheet" />
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body >
        <div class="jumbotron">
            <div class="container ">
                <div class="row">
                    <div  class="col-sm-3 ">
                        <?php
                        if (isset($this->session->userdata['logged_in'])) {
                            $username = ($this->session->userdata['logged_in']['username']);
                            //    $email = ($this->session->userdata['logged_in']['email']);
                        } else {
                            // header("location: login");
                        }
                        ?>

                        welcome <?php echo $username; ?>

                        <?php echo form_open('login/unset_session_value'); ?>
                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Logout" />

                        <?php echo form_close(); ?>

                    </div>


                    <div class="col-sm-6 " >
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <!--                        <div class="navbar-header">
                                                            <a class="navbar-brand" href="#">WebSiteName</a>
                                                        </div>-->
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php echo site_url('welcome/admin'); ?>">Dashboard</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">File
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('welcome/applyleave'); ?>">Apply Leave</a></li>
                                            <li><a href="<?php echo site_url('welcome/register'); ?>">Register</a></li>
                                            <li><a href="<?php echo site_url('welcome/viewMyleave'); ?>">My Leaves</a></li>
                                            <!--<li><a href="#">Page 1-3</a></li>--> 
                                        </ul>
                                    </li>
                                    <li><a href="#">Settings</a></li> 
                                    <?php
                                    if ($this->session->userdata['logged_in']['username'] == "admin") {
                                        ?>     
                                        <li><a href="<?php echo site_url('welcome/viewapplyleave'); ?>">View</a></li> 
                                        <?php
                                    } else {
                                        ?>  
                                        <li><a href="<?php echo site_url('welcome/admin'); ?>">View</a></li> 
                                        <?php
                                    }
//                                       
                                    ?>

                                    <!--<li><a href="">View</a></li>--> 
                                    <li><a href="#">Reports</a></li> 

                                    <li><a href="index">Sign Out</a></li> 

                                </ul>
                            </div>
                        </nav>


                    </div>

                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


        <div class="jumbotron" ng-app="myApp"  >
            <div class="container ">
                <div class="row">
                    <!--////////code-->
                    <table class="table table-striped " id="tblviewmy" ng-controller="viewdetails1">



                        <tr>
                            <th>
                                #

                            </th>
                           
                            <th>
                                Assign Name

                            </th>

                            <th >
                                Reason

                            </th>
                            <th>
                                Leave Date(From)

                            </th>

                            <th>
                                Leave Date(to)

                            </th>
                            <th>
                                Status

                            </th>
                           

                        </tr>

                        <tr ng-repeat=" y in viewmy" >

                            <td>{{y.id}}</td>

                            <td>{{y.assigname}}</td>
                            <td>{{y.reason}}</td>
                            <td>{{y.leavedate_from}}</td>
                            <td>{{y.leavedate_to}}</td>
                            <td>{{y.status}}</td>


                        </tr>


                    </table>



                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>

        <!--/////////////////////////////////////foooter-->



        <div class="credits text-center">
            <p>
                <a href="#" target="_top">Leave Management Application</a>
            </p>
            <p>
                <a href="#" target="_top">NexSoft.io</a>
            </p>
        </div>
        <!-- AngularJs -->
        <script>
            
            var app = angular.module('myApp', []);
            app.controller('viewdetails1', function ($scope, $http) {
                $http.get("viewloadforusers")
                        .then(function (response) {
                            $scope.viewmy = response.data;
                         

                        });





            });



        </script>

        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="//code.angularjs.org/1.2.20/angular.js"></script>
        <script src="//code.angularjs.org/1.2.20/angular-route.js"></script>
        <script src="//code.angularjs.org/1.2.13/angular-cookies.js"></script>

        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app.js"></script>
        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-services/authentication.service.js"></script>
        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-services/flash.service.js"></script>

        <!-- Real user service that uses an api -->
        <!-- <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-services/user.service.js"></script> -->

        <!-- Fake user service for demo that uses local storage -->
        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-services/user.service.local-storage.js"></script>

        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/home/home.controller.js"></script>
        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/login/login.controller.js"></script>
        <script src="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/register/register.controller.js"></script>

        <!--date-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <!--date-->

    </body>
</html>







