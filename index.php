<!doctype html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <title>KIV/WEB | Konferenční systém</title>
    <link rel="shortcut icon" href="favicon.ico">

    <link href="css/my-style.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/alertify.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/lightbox.css" rel="stylesheet">

</head>
<body>

    <?php

     //konfigurační soubor, obsahuje proměnné pro běh aplikace, knihovny a připojení k databázy
     require_once '_config.php';
     //nastavení routování
     require_once(SERVER_ROOT . DS . 'class' . DS . 'controler.php');
     require_once(SERVER_ROOT . DS . 'router.php');

     session_start();

    ?>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i>&nbsp;Úvod</a>
                    </li>
                    <li>
                        <a href="index.php?themes=show"><i class="fa fa-list-alt"></i>&nbsp;Témata</a>
                    </li>
                    <li>
                        <a href="index.php?galerie=show"><i class="fa fa-picture-o"></i>&nbsp;Galerie</a>
                    </li>
                    <li>
                        <a href="index.php?rules=show"><i class="fa fa-graduation-cap"></i>&nbsp;Pravidla</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right menu-login">
                    <?php

                     if (isset($_SESSION['login']['id']) && isset($_SESSION['login']['login']) && isset($_SESSION['login']['name'])) {
                         echo '
                             <li style="padding-top: 13px;">
                                <i class="fa fa fa-user"></i>&nbsp;' . $_SESSION['login']['login'] . '&nbsp;(' . $_SESSION['login']['role'] . ')
                              </li>
                              <li>
                                <a href="index.php?setting=show"><i class="fa fa-cogs"></i>&nbsp;správa</a>
                              </li>
                              <li>
                                <a id="logoutSubmit"><i class="fa fa-sign-out"></i>&nbsp;odhlásit se</a>
                              </li></div>
                              ';
                     } else {
                         echo '<li>
                                <a href="#loginModal" data-toggle="modal"><i class="fa fa-sign-in"></i>&nbsp;přihlásit se</a>
                              </li>';
                     }

                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Přihlášení</h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form>
                            <div class="form-group">
                                <label for="reg-name" class="control-label">Login</label>
                                <input type="text" class="form-control" id="reg-name">
                            </div>
                            <div class="form-group">
                                <label for="reg-pass" class="control-label">Heslo</label>
                                <input type="password" class="form-control" id="reg-pass">
                            </div>
                        </form>
                        <a href="#"><span class="help-block">Zapomněli jste své heslo?</span></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" style="float: left;" id='registrationShowForm'>Zaregistrovat se</button>
                    <button type="button" class="btn btn-success" id="loginSubmit">Přihlásit se</button>
                </div>
            </div>
        </div>
    </div>

    <!-- REGISTRATION MODAL -->
    <div class="modal fade" id="registrationModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Registrace - redakční systém</h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form>
                            <div class="form-group">
                                <label for="reg-login" class="control-label">Login</label>
                                <input type="text" class="form-control" id="reg-login">
                                <span class="help-block">Minimálně 4 znaky.</span>
                            </div>
                            <div class="form-group">
                                <label for="reg-password" class="control-label">Heslo</label>
                                <input type="password" class="form-control" id="reg-password">
                                <span class="help-block">Minimálně 6 znaků.</span>
                            </div>
                            <div class="form-group">
                                <label for="reg-pass-again" class="control-label">Potvrzení hesla</label>
                                <input type="password" class="form-control" id="reg-pass-again">
                            </div>
                            <hr />
                            <div class="form-group">
                                <label for="reg-fullname" class="control-label">Jméno a příjmení</label>
                                <input type="text" class="form-control" id="reg-fullname">
                            </div>
                            <div class="form-group">
                                <label for="reg-email" class="control-label">Email</label>
                                <input type="email" class="form-control" id="reg-email">
                            </div>
                            <div class="form-group">
                                <label for="reg-organization" class="control-label">Organizace</label>
                                <input type="text" class="form-control" id="reg-organization">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="registrationSubmit">Registruj se!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content" style="margin-bottom: 40px;">
        <?php

         $controller->main($getVars);

        ?>
    </div>

    <div class="modal-loading"></div>

    <footer>
        <div class="container-fluid footer-upgrade navbar-fixed-bottom">
            <div class="row">
                <span>ZČU FAV KIV WEB | Konferenční systém | Copyright &copy; David Košek 2015 </span>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="js/ajax.googleapis.com_ajax_libs_jquery_1.11.3_jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <script src="js/md5.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $body = $("body");

            $(".nav a").on("click", function () {
                $(".nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });

            $("#registrationShowForm").on("click", function () {
                $("#reg-login").val('');
                $("#reg-password").val('');
                $("#reg-pass-again").val('');
                $("#reg-fullname").val('');
                $("#reg-email").val('');
                $("#reg-organization").val('');
                $('#loginModal').modal('hide');
                $('#registrationModal').modal('show');
//                $('#reg-login').focus();
//                $('#registrationModal').on('shown.bs.modal', function () {
//                    $('#reg-login').focus();
//                });

            });

            $("#logoutSubmit").on("click", function () {
                $body.addClass("loading");
                var http = new XMLHttpRequest();
                http.onreadystatechange = callbackLogout;
                http.open("POST", "scripts/logout.php", true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send();
            });

            $("#loginSubmit").on("click", function () {
                $body.addClass("loading");
                var regName = $("#reg-name").val();
                var regPass = $("#reg-pass").val();
                var error = false;
                if (regName.length === 0) {
                    error = true;
                    alertify.error('Uživatelské jméno není vyplněno!');
                }
                if (regPass.length === 0) {
                    error = true;
                    alertify.error('Heslo není vyplněno!');
                }

                if (!error) {
                    var pass = $.md5(regPass);
                    var params = "&login=" + JSON.stringify(regName) + "&password=" + JSON.stringify(pass);
                    var http = new XMLHttpRequest();
                    http.onreadystatechange = callbackLogin;
                    http.open("POST", "scripts/login.php", true);
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.send(params);
                } else {
                    $body.removeClass("loading");
                }

            });

            $("#registrationSubmit").on("click", function () {
                $body.addClass("loading");
                var regName = $("#reg-login").val();
                var error = false;
                if (regName.length < 3) {
                    error = true;
                    alertify.error('Uživatelské jméno je příliš krátké!');
                }

                var regPass = $("#reg-password").val();
                var regPassAgain = $("#reg-pass-again").val();
                if (regPass.length < 5 || regPassAgain.length < 5) {
                    error = true;
                    alertify.error('Heslo je příliš krátké!');
                }
                if (regPass !== regPassAgain) {
                    error = true;
                    alertify.error('Zadané hesla se neshodují!');
                }

                var regFullname = $("#reg-fullname").val();
                var regEmail = $("#reg-email").val();
                var regOrg = $("#reg-organization").val();
                if (regFullname.length < 4) {
                    error = true;
                    alertify.error('Jméno je příliš krátké?!');
                }
                if (!validateEmail(regEmail)) {
                    error = true;
                    alertify.error('Email není ve správném formátu!');
                }
                if (!error) {
                    var pass = $.md5(regPass);
                    var params = "&login=" + JSON.stringify(regName) + "&password=" + JSON.stringify(pass) + "&fullname=" + JSON.stringify(regFullname) + "&email=" + JSON.stringify(regEmail) + "&org=" + JSON.stringify(regOrg);
                    var http = new XMLHttpRequest();
                    http.onreadystatechange = callbackRegistration;
                    http.open("POST", "scripts/addRegistration.php", true);
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.send(params);
                } else {
                    $body.removeClass("loading");
                }

            });

            var callbackLogin = function () {
                if (this.readyState === 4 && this.status === 200) {

                    var data = JSON.parse(this.responseText);
                    if (data.success === "true") {
                        $body.removeClass("loading");
                        $('#loginModal').modal('hide');
                        alertify.success('Přihlášení proběhlo úspěšně!');
                        location.reload();
                    } else {
                        alertify.error('Byly zadány špatné přihlašovací údaje!');
                        $body.removeClass("loading");
                    }
                }
            };

            var callbackLogout = function () {
                if (this.readyState === 4 && this.status === 200) {
                    $body.removeClass("loading");
                    alertify.success('Byl jste úspěšně odhlášen!');
                    window.location.href = "http://127.0.0.1/projects/kiv-web/";
                }

            };

            var callbackRegistration = function () {
                if (this.readyState === 4 && this.status === 200) {
                    var data = JSON.parse(this.responseText);
                    if (data.success === "true") {
                        $body.removeClass("loading");
                        $('#registrationModal').modal('hide');
                        alertify.success('Registrace proběhla úspěšně!');
                    } else {
                        alertify.warning(data.msg);
                        $body.removeClass("loading");
                    }
                }
            };

            function validateEmail(email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                return re.test(email);
            }


        });

    </script>
</body>
