<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>POS-LS (Login)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./main.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/images/LS.png" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bemvindo!</h1>
                                    </div>
                                    <form class="user" method="POST" action="autentication/login_control.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Hatama ID-Membru">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                                        </div>
                                        <div class="text-center text-danger small mb-2">
                                            <?php
                                            $alerta = isset($_GET['err']) ? $_GET['err'] : "";

                                            switch ($alerta) {
                                                case '1':
                                                    echo 'Hatama Username';
                                                    break;
                                                case '2':
                                                    echo 'Hatama Password';
                                                    break;
                                                case '3':
                                                    echo 'Username ka Password sala';
                                                    break;
                                                default:
                                                    echo '';
                                                    break;
                                            }

                                            ?>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="login_sistema">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center small">
                                        Copyright © POS-LS 2023
                                        <? //= md5('password')
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript" src="./assets/scripts/main.js"></script>

</body>

</html>