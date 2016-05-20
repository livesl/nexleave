
<!DOCTYPE html>
<!--<html  ng-app="myApp"  lang="en-US">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        
    </head>
    


    <body >-->
<!--<script>

    var app = angular.module('myApp', []);
    app.controller('decontroller', function ($scope, $http) {

        $scope.people = [];
        $http.get("welcome/ajax_load_data").success(function (result) {
            $scope.people = result;
            //  alert(result);


        });


    });

</script>-->


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

<div class="jumbotron"   ng-app="myApp" ng-controller="decontroller">
    <div class="container ">
        <div class="row">
            <div  class="col-sm-4 "></div>


            <div class="col-sm-4 " id="applyleave">

                <?php echo form_open('leaveadd_ctrl'); ?>
                <?php if (isset($message)) { ?> 
                    <h6 style="color:red;">Data inserted successfully!</h6><br>

                <?php } ?>
                <div class="form-group">
                    <label for="username">Reason:</label> 
                    <input type="text" class="form-control" placeholder="Enter reason" id="reason" name="reason"/>
                    <?php echo form_error('reason'); ?>


                </div>
                <div  class="form-group"  >
                    <label for="username">Assign Person:</label> 
                    <select  class="form-control" id="assignperson" name="assignperson" ng-model="AP"  ng-options ="AP.name for AP in people track by AP.name  "  >
                        <option value="AP.name">--Select--</option>



                    </select>



                </div>

                <div class="form-group">
                    <label for="username">Date(From):</label> 
                    <input type="text" class="form-control" id="datepickerfrom" name="datepickerfrom" placeholder="Click here" >
                    <div class="checkbox">
                        <label> <input type="checkbox" value="1"   id="halftime" name="halftime">Half Day Only</label>
                    </div>

                </div>

                <div class="form-group">
                    <label for="username">Date(To):</label> 
                    <input type="text" class="form-control" id="datepickerto" name="datepickerto" placeholder="Click here">

                </div>

                <input id="btn_applyleave" name="btn_applyleave" type="submit" class="btn btn-primary" value="Apply" />


                <?php echo form_close(); ?>




            </div>

            <div  class="col-sm-4 "></div>
        </div>
    </div>
</div>

<script>





    var app = angular.module('myApp', []);
    app.controller('decontroller', function ($scope, $http) {

        $scope.people = [];
        $http.get("ajax_load_data").success(function (result) {
            $scope.people = result;
//            $scope.people = result[];
//              alert(result);

        });


    });
//    $("#btn_applyleave").click(function () {
//
//        $.ajax({
//            type: 'POST',
//            url: "sendmail",
//            data: {},
//            success: function (data) {
//                alert("Leave applied and mail has been sent to admin");
//            }
//
//
//
//        });
//
//
//    });






//    $(document).ready(function () {
//
//        $("#btn_applyleave").click(function () {
//            $.ajax({
//                type: 'POST',
//                url: "controllers/leaveadd_ctrl.php",
//                data:{
//                    userid:"1",
//                    assignid:"31";,
//                    reason:"reason1",
//                    leavedate:"2015-01-01",
//                    half:"1",
//                    leaveto:"2016-01-01",
//                    status:"0"
//                
//            },
//                        success: function (data) {
//                            alert(data);
//                        }
//
//
//
//            });
//
//
//
//        });
//
//
//    });
//




</script>





<link rel="stylesheet" href="/code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<script>

    $(function () {


        $("#datepickerfrom").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
        $("#datepickerto").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});


    });



</script>





<!--
    </body>
</html>-->












