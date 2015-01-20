<!doctype html>
<?php
session_start();
?>
<html>
    <head>
        <title>Jquery ajax 1</title>
        <link rel="stylesheet" href="./css/styles.css" />
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <script type="text/javascript" src="../jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="./js/fonctionLoad.js"></script>
        <style>
            .popup {          
                position: fixed;
                width: 100%;	
                opacity: 0.9;
                top:0px;
                min-height:200px;
                height:100%;
                z-index: 100;
                background: #FFFFFF;
                font-size: 20px;
                text-align: center;
                display:none;
            }
            #login_form  {
                position:absolute;
                top:150px;
                left:45%; 
                width:400px;
                background-color:#DDD;
                padding:10px;
                border:1px solid #AAA;
                display:none;
                z-index:101;
                -moz-border-radius: 10px;
                -moz-box-shadow: 0 0 10px #aaa;
                -webkit-border-radius: 10px;
                -webkit-box-shadow: 0 0 10px #aaa;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#login_a").click(function () {
                    $("#shadow").fadeIn("normal");
                    $("#login_form").fadeIn("normal");
                    $("#user_name").focus();
                });
                $("#cancel_hide").click(function () {
                    $("#login_form").fadeOut("normal");
                    $("#shadow").fadeOut();
                });
                $("#login").click(function () {

                    username = $("#user_name").val();
                    password = $("#password").val();
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: "name=" + username + "&pwd=" + password,
                        success: function (html) {
                            if (html == 'true')
                            {
                                $("#login_form").fadeOut("normal");
                                $("#shadow").fadeOut();
                                $("#profile").html("<a href='logout.php' id='logout'>Logout</a>");

                            }
                            else
                            {
                                $("#add_err").html("Wrong username or password");
                            }
                        },
                        beforeSend: function ()
                        {
                            $("#add_err").html("Loading...")
                        }
                    });
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <?php include ('../dbConnect.php'); ?>
    <body>
        <div id="profile">
            <?php if (isset($_SESSION['user_name'])) {
                ?>
                <a href='logout.php' id='logout'>Logout</a>
            <?php } else { ?>
                <a id="login_a" href="#">login</a>
            <?php } ?>
        </div>
        <div id="login_form">
            <div class="err" id="add_err"></div>
            <form action="login.php">
                <label>User Name:</label>
                <input type="text" id="user_name" name="user_name" />
                <label>Password:</label>
                <input type="password" id="password" name="password" />
                <label></label><br/>
                <input type="submit" id="login" value="Login" />
                <input type="button" id="cancel_hide" value="Cancel" />
            </form>
        </div>
        <div id="shadow" class="popup"></div>

    </body>
</html>