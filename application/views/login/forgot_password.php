<!DOCTYPE html>
<html lang="en">
    <head>
       <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="COIN – KR COIN Backend Portal">
		<meta name="author" content="Chillar Payment Solutions Private Limited">
		<meta name="keywords" content="admin, dashboard">
		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>temp/images/brand/coinfav.ico" />

		<!-- TITLE -->
		<title>COIN - Login</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="<?=base_url()?>temp/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="<?=base_url()?>temp/css/style.css" rel="stylesheet"/>
		<link href="<?=base_url()?>temp/css/dark-style.css" rel="stylesheet"/>
        <link href="<?=base_url()?>temp/css/skin-modes.css" rel="stylesheet" />
        <link href="<?=base_url()?>temp/css/transparent-style.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="<?=base_url()?>temp/css/icons.css" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>temp/colors/color1.css" />

    </head>
    <body style="background-color: #ffffff !important;">

<!-- BACKGROUND-IMAGE -->
<div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="<?=base_url()?>temp/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto">
                <div class="text-center">
                    <!-- <img src="<?=base_url()?>temp/images/brand/coin.png" class="header-brand-img" alt="" width="400" 
     height="500"> -->
     <img src="<?=base_url()?>temp/images/brand/coin.png"  alt="" width="150"  height="150">
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <form class="login100-form validate-form" method="post" action="<?=base_url('login/forgot_password')?>">
                            <div class="text-center">
											<span class="login100-form-title">
												Forgot Password
											</span>
											<p class="text-muted">Enter the email address registered on your account</p>
										</div>
                            
                            <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                            </div>
                            <!-- <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div> -->
                            <div class="text-end pt-1">
                                <!-- <p class="mb-0"><a href="<?=base_url()?>login/forgot_password" class="text-primary ms-1">Forgot Password?</a></p> -->
                            </div>
                            <div class="container-login100-form-btn">
                               
                                <input type="submit" name="usersubmit" value="Submit" class="login100-form-btn btn-primary" />

                            </div>
                            <div class="text-center pt-3">
                            <?php if(!empty($message))
                            {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <!-- <i class="fa fa-bell-o me-2" aria-hidden="true"></i> -->
                                    <?=$message?>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button> -->
                                </div>
                                <?php }
                                ?>
                                <!-- <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ms-1">Create an Account</a></p> -->
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="<?=base_url()?>temp/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="<?=base_url()?>temp/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?=base_url()?>temp/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS -->
<script src="<?=base_url()?>temp/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS -->
<script src="<?=base_url()?>temp/js/circle-progress.min.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="<?=base_url()?>temp/plugins/p-scroll/perfect-scrollbar.js"></script>

<!-- INPUT MASK JS -->
<script src="<?=base_url()?>temp/plugins/input-mask/jquery.mask.min.js"></script>

<!-- Color Theme js -->
<script src="<?=base_url()?>temp/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="<?=base_url()?>temp/js/custom.js"></script>

</body>
</html>
