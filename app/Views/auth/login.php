<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Cat Feeder</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* * {
            border: 1px solid red;
        } */

        .hr-text {
            display: flex;
            align-items: center;
            text-align: center;
            width: 69%;
        }

        .hr-text::before,
        .hr-text::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid grey;
        }

        .hr-text:not(:empty)::before {
            margin-right: .25em;
        }

        .hr-text:not(:empty)::after {
            margin-left: .25em;
        }

        chatgpt-sidebar {
            display: none;
        }
    </style>
</head>

<body>

    <div class="outer-row container-fluid d-flex p-0">

        <!-- kiri -->
        <div class="d-flex flex-column justify-content-center align-items-center col-md-6" style="background-color: #ffe4c4;">
            <div class="text-center">
                <div class="d-flex align-items-center justify-content-start">
                    <img src="/img/logo_teks.png" alt="CatFeederLogoTeks" style="max-width: 300px;">
                </div>
                <p style="color: black;">Aplikasi pemberi pakan kucing otomatis terintegrasi dengan perangkat IoT CatFeeder.</p>
            </div>
            <img src="/img/logo.png" alt="CatFeeder Logo" class="img-fluid mt-5" style="max-width: 700px;">
        </div>

        <!-- kanan -->
        <div class="d-flex flex-column justify-content-center align-items-center col-md-6">

            <form action="<?= url_to('login') ?>" method="post" class="w-100" style="max-width: 500px;">
                <?= csrf_field() ?>

                <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>

                <?= view('Myth\Auth\Views\_message_block') ?>


                <!-- <div class="form-group mb-3">
                        <input type="text" class="form-control" id="InputUsername" aria-describedby="usernameHelp" placeholder="Type your username">
                    </div> -->

                <?php if ($config->validFields === ['email']) : ?>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else : ?>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group mb-3">
                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>


                <button type="submit" class="btn btn-block" style="background-color: #A0522D; border: none; color: white">
                    <?= lang('Auth.loginAction') ?>
                </button>

            </form>

            <div class="hr-text p-3">atau</div>

            <?php if ($config->allowRegistration) : ?>

                <div class="text-center">
                    <p><a class="text-dark" style="color: #A0522D;" href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>

                </div>

            <?php endif; ?>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <script>
        const windowHeight = window.innerHeight;
        const outerRow = document.querySelector('.outer-row');
        outerRow.style.height = windowHeight + 'px'
    </script>

</body>


</html>
<!-- Outer Row -->