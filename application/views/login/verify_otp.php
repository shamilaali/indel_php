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
		<title>Recharge365 - Login</title>

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

        <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
    <style>* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  height: 100vh;
  /* background: linear-gradient(#fcf1e2 50%, #ffb800 50%); */
}
.container {
  width: 28em;
  background-color: #ffffff;
  padding: 8em 2em;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  border-radius: 0.8em;
  box-shadow: 0 45px 60px rgba(30, 22, 1, 0.3);
}
.inputfield {
  width: 100%;
  display: flex;
  justify-content: space-around;
}
.input {
  height: 2em;
  width: 2em;
  border: 2px solid #dad9df;
  outline: none;
  text-align: center;
  font-size: 1.5em;
  border-radius: 0.3em;
  background-color: #ffffff;
  outline: none;
  /*Hide number field arrows*/
  -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
#submit {
  background-color: #ffb800;
  border: none;
  outline: none;
  font-size: 1.2em;
  padding: 0.8em 2em;
  color: #000000;
  border-radius: 2em;
  margin: 1em auto 0 auto;
  cursor: pointer;
}
.show {
  display: block;
}
.hide {
  display: none;
}
.input:disabled {
  color: #89888b;
}
.input:focus {
  border: 3px solid #ffb800;
}</style>

    </head>
    <body style="background-color: #ffffff !important;">

<!-- BACKGROUND-IMAGE -->
<!-- <div class="login-img"> -->
<div>

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
      <img src="<?=base_url()?>assets/images/brand/loginnew.png" alt="" > 
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <form class="login100-form validate-form" method="post" action="<?=base_url('login/verify_otp/'.$userID)?>">
                            <div class="text-center">
											<span class="login100-form-title">
												Verify OTP
											</span>
											<p class="text-muted">Enter the OTP that received to the registered email address.</p>
										</div>

                                        <!-- <div class="container"> -->
                                            <div class="inputfield">
                                                <input type="number" maxlength="1" class="input" enabled  name="otp1" />
                                                <input type="number" maxlength="1" class="input" enabled  name="otp2" />
                                                <input type="number" maxlength="1" class="input" enabled  name="otp3" />
                                                <input type="number" maxlength="1" class="input" enabled  name="otp4" />
                                                <input type="number" maxlength="1" class="input" enabled  name="otp5" />
                                                <input type="number" maxlength="1" class="input" enabled  name="otp6" />
                                            </div>
                                            <!-- <button class="hide" id="submit" onclick="validateOTP()">Submit</button> -->
                                            <!-- </div> -->
                                                                    
                            
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
                    
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->
<script>
    //Initial references
const input = document.querySelectorAll(".input");
const inputField = document.querySelector(".inputfield");
//const submitButton = document.getElementById("submit");
let inputCount = 0,
  finalInput = "";

//Update input
const updateInputConfig = (element, enabledStatus) => {
  element.enabled = enabledStatus;
  if (!enabledStatus) {
    element.focus();
  } else {
    element.blur();
  }
};

input.forEach((element) => {
  element.addEventListener("keyup", (e) => {
    e.target.value = e.target.value.replace(/[^0-9]/g, "");
    let { value } = e.target;

    if (value.length == 1) {
      updateInputConfig(e.target, true);
      if (inputCount <= 5 && e.key != "Backspace") {
        finalInput += value;
        if (inputCount < 5) {
          updateInputConfig(e.target.nextElementSibling, false);
        }
      }
      inputCount += 1;
    } else if (value.length == 0 && e.key == "Backspace") {
      finalInput = finalInput.substring(0, finalInput.length - 1);
      if (inputCount == 0) {
        updateInputConfig(e.target, false);
        return false;
      }
      updateInputConfig(e.target, true);
      e.target.previousElementSibling.value = "";
      updateInputConfig(e.target.previousElementSibling, false);
      inputCount -= 1;
    } else if (value.length > 1) {
      e.target.value = value.split("")[0];
    }
    //submitButton.classList.add("hide");
  });
});

window.addEventListener("keyup", (e) => {
  if (inputCount > 5) {
    //submitButton.classList.remove("hide");
    //submitButton.classList.add("show");
    if (e.key == "Backspace") {
      finalInput = finalInput.substring(0, finalInput.length - 1);
      updateInputConfig(inputField.lastElementChild, false);
      inputField.lastElementChild.value = "";
      inputCount -= 1;
      //submitButton.classList.add("hide");
    }
  }
});

// const validateOTP = () => {
//   alert("Success");
// };

// //Start
// const startInput = () => {
//   inputCount = 0;
//   finalInput = "";
//   input.forEach((element) => {
//     element.value = "";
//   });
//   updateInputConfig(inputField.firstElementChild, false);
// };

// window.onload = startInput();
</script>

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
