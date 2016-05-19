

<div class="jumbotron" >
    <div class="container ">
        <div class="row">
            <div  class="col-sm-4 ">


            </div>


            <div class="col-sm-4 " >

                <!--                <form role="form" action="welcome/admin" >-->
               
                <?php echo form_open('welcome/admin'); ?>
                <div class="form-group">
                    <label for="username">User Name:</label> 
                    <input type="text" class="form-control" placeholder="Enter User Name" id="first" name="first" />
                     <?php echo form_error('first'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label> 
                    <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass" />
                     <?php echo form_error('pass'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

                <?php form_close() ?>

                <!--                </form>-->



                <br><br><br>
                <img src="<?php echo base_url(); ?>assest/img/logo.png" class="img-responsive" alt="Cinque Terre" width="304" height="236"> 



            </div>

            <div  class="col-sm-4 "></div>
        </div>
    </div>
</div>


<!--<script>
    $(document).ready(function () {
        $("#register").hide();
        $("#clickregister").click(function () {
            
             $("#register").slideDown();
            
            
        });



    });

</script>-->



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



