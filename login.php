<?php
$title = "Login";
include_once ("./includes/header.php");
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
</style>
<section id="in-faq-contact" class="in-faq-contact-section" style="padding:0px;">
    <div class="in-faq-contact-content" style="background-color: white;">
        <div class="row">
            <div class="col-lg-5 d-none d-md-block" style="padding:0px;">
                <div style="height: 100vh;">
                    <img src="./assets/login.jpeg" alt="" style="height:100%;width:100%; object-fit:cover;">
                </div>
            </div>
            <div class="col-12 col-lg-7" style="padding:0px;">
                <div class="in-faq-contact-form-area" style="margin:0px; height:100vh;">
                    <div class="container">
                        <div id="google_translate_element" class="py-2 px-2"></div>
                        <div class="in-faq-contact-info-title headline pera-content">
                            <h3>Log in to continue </h3>
                            <p>Enter your correct details to continue with Intelbondtrade
                            </p>
                        </div>
                        <div class="in-faq-contact-form">
                            <form action="./handlers/auth.php" method="post">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <input style="padding:30px;" type="text" name="username"
                                            placeholder="Enter Username or Email" required>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <input style="padding:30px;" type="password" name="password"
                                            placeholder="Enter Password" required>
                                        <span id="err"
                                            style="color:red;font-size:13px;position:absolute;width:100%;bottom:10px;left:10px;"></span>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <button type="submit" class="w-100" name="login">Login</button>
                                    </div>

                                    <div class="col-md-6 d-md-flex justify-content-end mt-3">
                                        <a href="./forgotpassword.php">Forgot Password</a>
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-center my-5">
                                        Don't have an account? <a href="./signup.php" class="in-text-gradiant mx-2">Sign
                                            up here</a>
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
    let inputs = document.querySelectorAll("input");
    let err = document.querySelector("#err");
    if (location.search.includes("=f")) {
        inputs.forEach(input => {
            checkErr(input)
        })
        err.innerHTML = "Incorrect username or password. Please try again."

    } else if (location.search.includes("reset=s")) {
        Toastify({
            text: "Password Reset Sucessful",
            duration: 3000,
            close: true,
            style: {
                background: "green",
                color: "white"
            }

        }).showToast();
    }

    function checkErr(elem) {
        elem.style.outline = "1px solid red"
        elem.classList.add("animate-invalid")
        setTimeout(() => {
            elem.classList.remove("animate-invalid")
            elem.style.outline = "none"
        }, 1000)
    }
</script>
<?php
require_once ("./includes/footer.php");
?>