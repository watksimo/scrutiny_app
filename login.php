<?php
    session_start();

    if(isset($_SESSION['client_id'])) {
        header("Location: home.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scrutiny Strength & Conditioning - Application</title>

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">


        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>

    <body>

        <div class="header row">
            <div class="col-sm-12">
                <h1>Login</h1>
            </div>
        </div>

        <div class="content row">

            <div class="content-pane-1 col-sm-8 col-sm-offset-2" id="login_cont">
                <form id='login_form'>
                    <div class="form-group col-sm-10 col-sm-offset-1" id="login_field_cont">
                        <label for="emailAddress">Email address</label>
                        <input type="text" class="form-control" id="emailAddress" placeholder="Enter email">

                        <!-- 
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"> 
                        `-->

                    </div>

                    <div class="form-group col-sm-8 col-sm-offset-2" id="login_button_cont">
                        <button type="button" class="btn btn-primary" id="btn_login">Login</button>
                    </div>
                </form>
                

            </div>

        </div>

    </body>
    
    <footer>
        <div class="footer">
            <div class="col-sm-12">
                <div class="pull-right">
                    <p>Scrutiny Strength & Conditioning</p>
                    <p>Site designed and maintained by Mick Watkins</p>
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBf13Qu1XH0l-KcykGEM8LshQFw1c4Bc"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </footer>
</html>
