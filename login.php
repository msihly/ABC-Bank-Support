<?php
    session_start();
    if (isset($_SESSION["accid"])) {
        header("Location: /index.php");
        exit;
    } else if (isset($_COOKIE["authToken"])) {
        include_once("php/restricted/db-functions.php");
        $accountID = validateToken($_COOKIE["authToken"]);
        if ($accountID === false) {
            setcookie("authToken", "", 1);
        } else {
            $_SESSION["accid"] = $accountID;
            header("Location: /index.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Customer Support | ABC Bank</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/ico" href="images/favicon.ico">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/login.css">
		<script src="js/login.js" type="module"></script>
	</head>
	<body>
        <div class="lg-wrapper">
            <div class="lg">
                <div class="lg-panel-image"></div>
                <div class="lg-right between">
                    <div class="lg-panel-form pad-ctn-2" id="login-panel">
                        <h3>Log In</h3>
                        <p class="lg-text">Not a member? <a href="#" class="lg-link" id="login-switch">Register now</a></p>
                        <form id="login-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="error-label invisible" id="login-username-error">Error</label>
                                <input type="text" placeholder="Username" name="username" id="login-username" data-listener="errorCheck" required>
                                <label for="login-username" class="lb-title">Username</label>
                            </div>
                            <div class="form-group">
                                <label class="error-label invisible" id="login-password-error">Error</label>
                                <input type="password" placeholder="Password" name="password" id="login-password" data-listener="errorCheck" required>
                                <label for="login-password" class="lb-title">Password</label>
                            </div>
                            <label class="checkbox-ctn">
                                <input type="checkbox" name="remember-me" id="login-remember">
                                <span class="checkbox"></span>
                                <label for="login-remember" class="lb-title checkbox-title">Keep me logged in</label>
                            </label>
                            <button type="submit" class="btn-hollow" id="login" name="login">LOG IN</button>
                        </form>
                    </div>
                    <div class="lg-panel-form pad-ctn-2 hidden-panel hidden" id="register-panel">
                        <h3>Register</h3>
                        <p class="lg-text">Already have an account? <a href="#" class="lg-link" id="register-switch">Login now</a></p>
                        <form id="register-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="split-col">
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-email-error">Error</label>
                                        <input type="text" placeholder="Email" name="email" id="register-email" data-listener="errorCheck" required>
                                        <label for="register-email" class="lb-title">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-username-error">Error</label>
                                        <input type="text" placeholder="Username" name="username" id="register-username" data-listener="errorCheck" required>
                                        <label for="register-username" class="lb-title">Username</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-password-error">Error</label>
                                        <input type="password" placeholder="Password" name="password" id="register-password" data-listener="errorCheck" required>
                                        <label for="register-password" class="lb-title">Password</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-password-confirm-error">Error</label>
                                        <input type="password" placeholder="Confirm Password" name="password-confirm" id="register-password-confirm" data-listener="errorCheck" required>
                                        <label for="register-password-confirm" class="lb-title">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="split-col">
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-firstName-error">Error</label>
                                        <input type="text" placeholder="First Name" name="firstName" id="register-firstName" data-listener="errorCheck" required>
                                        <label for="register-firstName" class="lb-title">First Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-lastName-error">Error</label>
                                        <input type="text" placeholder="Last Name" name="lastName" id="register-lastName" data-listener="errorCheck" required>
                                        <label for="register-lastName" class="lb-title">Last Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-routingNumber-error">Error</label>
                                        <input type="number" placeholder="Routing Number" name="routingNumber" id="register-routingNumber" data-listener="errorCheck" required>
                                        <label for="register-routingNumber" class="lb-title">Routing Number</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="error-label invisible" id="register-accountNumber-error">Error</label>
                                        <input type="number" placeholder="Account Number" name="accountNumber" id="register-accountNumber" data-listener="errorCheck" required>
                                        <label for="register-accountNumber" class="lb-title">Account Number</label>
                                    </div>
                                </div>
                            </div>
                            <label class="checkbox-ctn">
                                <input type="checkbox" name="remember-me" id="register-remember">
                                <span class="checkbox"></span>
                                <label for="register-remember" class="lb-title checkbox-title">Keep me logged in</label>
                            </label>
                            <button type="submit" class="btn-hollow" id="register" name="register">REGISTER</button>
                        </form>
                    </div>
                    <p class="call-in lg-text">Need to talk to someone? Call <span class="lg-link">1-800-555-7371</span></p>
                </div>
            </div>
        </div>
	</body>
</html>