<!doctype html>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="login/assets/images/oip__5__modified_icon.png">
    <link rel="icon" type="image/png" href="login/assets/images/oip__5__modified_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="login/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="login/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="login/assets/css/style.css" rel="stylesheet">

    <title>FMS</title>
</head>

<body>
    <section class="form-04-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo">
                                <img src="login/assets/images/ol.jpg">
                            </div>
                            <div class="alert-danger" style="text-align: center;">
                                <?php
                                        if (isset($_GET['general_error'])) {
                                            $error = $_GET['general_error'];
                                            echo $error;
                                            } ?>
                            </div>
                            <form action="login_page_data.php" method="post" autocomplete="off">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control _ge_de_ol" type="text"
                                        placeholder="Enter Username " readonly
                                        onfocus="this.removeAttribute('readonly');">
                                    <div class="alert-danger" style="text-align: center;">
                                        <?php
                                        if (isset($_GET['username_error'])) {
                                            $error = $_GET['username_error'];
                                            echo $error;
                                            } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control _ge_de_ol" type="text"
                                        placeholder="Enter Password" readonly
                                        onfocus="this.removeAttribute('readonly');">
                                    <div class="alert-danger" style="text-align: center;">
                                        <?php
                                        if (isset($_GET['password_error'])) {
                                            $error = $_GET['password_error'];
                                            echo $error;
                                            } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="login" type="submit" name="login" value="Sign In" class="btn btn-default"
                                        style="background-color: #33BFF2;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>