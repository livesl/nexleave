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


<div class="jumbotron" id="register">
    <div class="container ">
        <div class="row">
            <div class="credits text-center">
                <h3>
                    Register for New User
                </h3>

            </div>
            <br>

            <div  class="col-sm-4 "></div>


            <div class="col-sm-4 " >

                <!--
                -->                <?php echo form_open('register_ctrl'); ?>


                <div class="form-group">
                    <label for="username">First name:</label> 
                    <input type="text" class="form-control" placeholder="Enter first name" id="first" name="first" />
                    <?php echo form_error('first'); ?>
                </div>
                <div class="form-group">
                    <label for="username">Last name:</label> 
                    <input type="text" class="form-control" placeholder="Enter last name" id="last" name="last" />
                    <?php echo form_error('last'); ?>
                </div>
                <div class="form-group">
                    <label for="username">Phone No:</label> 
                    <input type="text" class="form-control" placeholder="Enter phone number" id="tp" name="tp"/>
                    <?php echo form_error('tp'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass"  />
                    <?php echo form_error('pass'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password:</label> 
                    <input type="password" class="form-control" placeholder="Confirm Password" id="passmatch" name="passmatch"  />
                    <?php echo form_error('passmatch'); ?>
                </div>
                <div class="form-group">
                    <label for="nic">NIC/PP:</label> 
                    <input type="text" class="form-control" placeholder="Enter NIC/PP" id="nic" name="nic"  />
                    <?php echo form_error('nic'); ?>
                </div>

                <div class="form-group">
                    <label for="dob">DOB:</label> 
                    <input type="text" class="form-control" placeholder="Enter DOB(yyyy-mm-dd)" id="dob" name="dob"  />
                    <?php echo form_error('dob'); ?>
                </div>

                <div class="form-group">
                    <label for="eduqlf">Education Qualification:</label> 
                    <input type="text" class="form-control" placeholder="Enter Edu/Qualification" id="eduqlf" name="eduqlf"  />
                    <?php echo form_error('eduqlf'); ?>
                </div>

                <div class="form-group">
                    <label for="proqlf">Professional Qualification:</label> 
                    <input type="text" class="form-control" placeholder="Enter Pro/Qualification" id="proqlf" name="proqlf"  />
                    <?php echo form_error('proqlf'); ?>
                </div>

                <div class="form-group">
                    <label for="basic_salory">Basic Salory:</label> 
                    <input type="text" class="form-control" placeholder="Enter Basic Salory" id="basic_salory" name="basic_salory"  />
                    <?php echo form_error('basic_salory'); ?>
                </div>

                 <div class="form-group">
                    <label for="imageuser">Image:</label> 
                    <input type="file" class="file" id="imageuser" name="imageuser" >
                    <!--<input type="submit" value="upload" id="uploadsubmit" name="uploadsubmit" />-->


                </div>



                <!--/////////////////////////////////////////////////////////////////////////////////-->

                <button type="submit" class="btn btn-primary">Register</button>
                <?php if (isset($message)) { ?> 
                    <h6 style="color:red;">Data inserted successfully!</h6><br>

                <?php } ?>

               

               
               


             


            </div>

            <div  class="col-sm-4 "></div>
        </div>
    </div>
</div><!--

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

