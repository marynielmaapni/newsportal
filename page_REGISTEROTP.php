<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleREGISTEROTP.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>Create an Account</title>
    <link rel="icon" type="image/png" href="tabicon.png">
</head>

<body>
    <!-- To update for validation and patterns -->
    <div class="registration-wrapper">
        <!-- Left Section -->
        <section class="left-content">
            <div class="content-wrapper">
                <strong><span style="font-size: 1.5rem; color: white;">Create an Account</span></strong>
                <div class="direction-wrapper">
                    
                    <p>By creating an account, you gain access to a host of features designed to make your experience seamless and efficient. Here's a step-by-step guide for creating an account:</p>
                    <ol>
                        <li>Provide Personal information.</li>
                        <li>Create a strong Password.</li>
                        <li>Verify Account using email address.</li>
                    </ol>
                    <span>Already Registered? <a href="" style="color: blue;">Login</a></span>
                </div>
            </div>
        </section>

        <!-- Right/ Form Section -->
        <section class="right-content">
            <div class="registration-part">
                <span><i class="fa-solid fa-church"></i> Finish Registration</span>
            </div>
            <div class="otp-card">
                <button class="backbtn" onclick="history.back()">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <div class="progress-wrapper">
                    <div class="progress"></div>
                    <hr>
                    <div class="progress"></div>
                </div>
                <div class="form-heading">
                    <span>Verify Account</span>
                </div>
                <div class="info-content">
                    <p style="text-align: center;">
                        Please enter the verification code that was sent to
                        your email <strong><?php //echo $_SESSION['email'] 
                                            ?></strong>. The code is
                        valid for 30 minutes.
                    </p>
                </div>
                <form action="validationREGISTER.php" method="post">
                    <div class="otp-input">
                        <span>Enter your OTP here</span>
                        <input type="text" name="userOTP" id="">
                        <?php
                        if (!isset($_SESSION['isValidOTP'])) {
                        } else if (!$_SESSION['isValidOTP']) {
                            echo '<span>Invalid OTP</span>';
                        }
                        ?>
                    </div>
                    <div class="option-wrapper">
                        <button type="submit" name="submitOTP">Submit</button>
                </form>
                <form action="sendOTP.php" method="post">
                    <span id="resend"><input type="submit" name="submit" value="Resend OTP"></span>
                </form>
            </div>
    </div>
    </section>
    </div>
    <script>
        const resend = document.getElementById('resend');
        window.addEventListener("DOMContentLoaded", () => {
            let count = 5;
            const update = () => {
                resend.innerText = 'Resend OTP in ' + count;
            }

            const countdown = () => {
                update();
                if (count > 0) {
                    count--;
                    setTimeout(countdown, 1000);
                } else {
                    resend.innerHTML = '<input type="submit" name="submit" value="Resend OTP">';
                }
            }

            countdown();
        });
    </script>
</body>

</html>