<?php
$title = "Sign up";
include_once("./includes/header.php");
?>
<style>
    .animate-invalid {
        animation: shake 0.4s infinite linear;
    }

    @keyframes shake {
        0% {
            transform: translateX(0px);
        }

        50% {
            transform: translateX(25px);
        }

        100% {
            transform: translateX(0px);
        }
    }

    body {
        top: 0px !important;
    }

    .skiptranslate {
        display: none;
    }
</style>
<section id="in-faq-contact" class="in-faq-contact-section" style="padding:0px;">
    <div class="in-faq-contact-content" style="background-color: white;">
        <div class="row">
            <div class="col-lg-5 d-none d-md-block" style="padding:0px;">
                <div style="height: 100%;">
                    <img src="./assets/signup.jpeg" alt="" style="height:100%;width:100%; object-fit:cover;">
                </div>
            </div>
            <div class="col-12 col-lg-7" style="padding:0px;">
                <div class="in-faq-contact-form-area" style="margin:0px; height:100%;">
                    <div class="container">
                        <div id="google_translate_element" class="py-2 px-2 d-none"></div>

                        <div class="in-faq-contact-info-title headline pera-content">
                            <h3>Sign Up </h3>
                            <p>Get started with Intelbondtrade by creating an account
                            </p>
                        </div>
                        <div class="in-faq-contact-form">
                            <form action="./handlers/auth.php" method="post">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <input required style="padding:30px;" type="text" name="fullname"
                                            placeholder="Enter Fullname">
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <span style='color:red;font-size:13px;position:absolute;top:-20px;'
                                            id="username-err"></span>
                                        <input required style="padding:30px;" type="text" name="username"
                                            placeholder="Enter Username">
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <span style='color:red;font-size:13px;position:absolute;top:-20px;'
                                            id="email-err"></span>
                                        <input required style="padding:30px;" type="email" name="email"
                                            placeholder="Enter Email">
                                    </div>
                                    <div class="col-md-6  position-relative">
                                        <input required style="padding:30px;" type="password" name="password"
                                            placeholder="Enter Password" minlength="8">

                                    </div>

                                    <div class="col-md-6  position-relative">
                                        <span style='color:red;font-size:13px;position:absolute;top:-20px;'
                                            id="password-err"></span>
                                        <input required style="padding:30px;" type="password" name="confirmPassword"
                                            placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="g-recaptcha"
                                            data-sitekey="6LfQaOQqAAAAADxVN3Zm8u36jWhepFHmLrVmE3F-"></div>
                                    </div>
                                    <div class="col-12 ">
                                        <button name="signUp" type="submit" class="w-100">Sign Up</button>
                                    </div>


                                    <div class="col-md-12 d-flex justify-content-center my-5">
                                        Already a member? <a href="./login.php" class="in-text-gradiant mx-2">Login
                                            here</a>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let passwords = document.querySelectorAll("[type='password']")
    let email = document.querySelector("[type='email']");
    let username = document.querySelector("[name='username']");
    let form = document.querySelector("form");
    let emailErr = document.querySelector("#email-err")
    let passwordErr = document.querySelector("#password-err")
    let usernameErr = document.querySelector("#username-err")
    let regExp = document.querySelector("#regExp");
    let validate = false;
    let err = {
        email: false,
        username: false
    };
    let p = document.querySelectorAll("#regExp p")
    var response = grecaptcha.getResponse(); // Get reCAPTCHA response
    // Validating strong password



    form.onsubmit = (e) => {
        validate = true;
        if (err.username) {
            checkErr(username);
            usernameErr.innerHTML = "Username already Exists";
            validate = false;
        }

        if (err.email) {
            checkErr(email);
            emailErr.innerHTML = "Email already Exists";
            validate = false;
        }



        if (passwords[0].value != passwords[1].value) {
            checkErr(passwords[1])
            passwordErr.innerHTML = "Passwords do not match"
            validate = false;
        }

        if (response.length === 0) {
            Toastify({
                text: "Please check the reCAPTCHA before submitting.",
                style: {
                    background: "red",
                    color: "white"
                }

            }).showToast()

            validate = false;
        }
        return validate;


    }

    // Checking if email exists
    alreadyExists(email, "verifyEmail");
    alreadyExists(username, "verifyUsername");

    function checkErr(elem) {
        elem.style.outline = "1px solid red"
        elem.classList.add("animate-invalid")
        setTimeout(() => {
            elem.classList.remove("animate-invalid")
        }, 2000)
    }

    function alreadyExists(elem, endpoint) {
        elem.onblur = (e) => {
            if (elem.value.length > 0) {
                fetch(`./handlers/auth.php?${endpoint}=${elem.value}`).then(res => res.text()).then((data) => {
                    console.log(data)
                    if (data) {
                        err[e.target.name] = true;
                    } else {
                        err[e.target.name] = false;
                    }
                })
            }
        }
    }
</script>
<?php
require_once("./includes/footer.php");
?>
