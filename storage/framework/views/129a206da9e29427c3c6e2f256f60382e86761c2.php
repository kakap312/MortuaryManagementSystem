<?php $__env->startSection('title',"Account"); ?>
<?php $__env->startSection('content'); ?>
<div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img style='width:200px; height:170px; margin-top:50px; margin-bottom:10px;' src="<?php echo e(asset('img/companylogo.jpg')); ?>" />
                    <h3>O.V. OHIO'S Mortuary Management System</h3>
                    <p>Access to the most powerfull tool to manage your Mortuary shop</p>
                    <img src="<?php echo e(asset('img/mortuary.png')); ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="#">
                                <div class="logo">
                                    <img class="logo-size">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a id='loginlink' href="#" class="active">Login</a>
                            <!--<a id='registerlink' href='#'>Register</a>-->
                        </div>
                        <form id="loginform" data-action="account/login" enctype="multipart/form-data">
                            <input type='hidden' id='dashboardroute' data-action="<?php echo e(route('dbroute')); ?>" ></input>
                                <input class="form-control" data-action="account/validateusername" type="text" id='username' name="username" placeholder="Username" required>
                                <p class='usernamemessage'></p><br>
                                <input class="form-control password" data-action="account/validatepassword" type="password" name="password" placeholder="Password" required>
                                <img class='password-eye' src="<?php echo e(asset('img/passwordeye.png')); ?>"/>
                                <p class='passwordmessage'></p>
                                <select class='form-control type acctype' name='type' data-action="<?php echo e(route('accounttype')); ?>">
                                <option disabled default>Choose account type</option>
                                <option value='admin'>Admin</option>
                                <option value='user'>User</option>
                                </select>
                                <div class="form-button">
                                    <button id="submit" type="submit" class=" loginbtn">Login</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='js/accountjs.js' type='module'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>