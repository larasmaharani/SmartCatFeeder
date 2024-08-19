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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">


    <style>
        .btn-brown {
            background-color: #AE7B53;
            color: white;
        }

        .btn-brown:hover {
            background-color: #A0522D;
            color: white;
        }

        .card-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion d-flex flex-column" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text" style="background-color: #A0522D; color: white; padding: 7px; border-radius: 5px; display: inline-block;">Smart</div><text style="color: #A0522D;">CatFeeder</text>
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mt-5 mb-3">
                <a class="nav-link mx-3" href="index.html" style="background-color: #A0522D; color: white; padding: 10px; width: 180px; border-radius: 5px; display: inline-block;">
                    <i class="fas fa-fw fa-square"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider my-0"> -->

            <!-- Nav Item - Charts -->
            <li class="nav-item mb-3">
                <a class="nav-link mx-3 btn btn-brown" href="monitoring.html" style="padding: 10px; width: 180px;">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Monitoring</span>
                </a>
            </li>

            <!-- Add flex-grow-1 to take up the remaining space -->
            <div class="flex-grow-1"></div>

            <!-- Logout item -->
            <li class="nav-item">
                <a class="nav-link mx-3" href="login.html" style="color: #A0522D; width: 180px;">
                    <i class="fas fa-sign-out-alt" style="color: #A0522D;"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div class="d-flex h-100 w-100 p-5">

                <div class="right d-flex flex-column p-3 bg-light" style="flex: 1;  text-align: left;">
                    <div class="card mb-4">
                        <div class="card-body" style="padding-left: 40px;">
                            <h1 class="font-weight-bold" style="color: black;">Device A</h1>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="font-weight-bold" style="color: black;">Informasi</p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Device</label>
                                                    <input type="form" placeholder="Type your username" class="form-control">
                                                </div>
                                                <div class="button d-flex flex-column justify-content-center align-items-center ">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-group">
                                            <div class="card border-0">
                                                <div class="card-header bg-info text-white d-flex">
                                                    <a href="#" class="text-white"><i class="fa-th"></i> Media Library</a>
                                                    <a href="#" class="text-white ml-auto">Add Media</a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="btn-group-vertical ">
                                                <a href="#" class="btn btn-primary mb-2">Device A</a>
                                                <a href="#" class="btn btn-primary mb-2">Device B</a>
                                                <a href="#" class="btn btn-primary mb-2">Device C</a>
                                                <a href="#" class="btn btn-primary mb-2">Device D</a>
                                                <a href="#" class="btn btn-primary mb-2">Device E</a>
                                                <a href="#" class="btn btn-primary mb-2">Device F</a>
                                                <a href="#" class="btn btn-primary mb-2">Device G</a>
                                                <a href="#" class="btn btn-primary mb-2">Device H</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <img class="card-img-top mx-auto mt-3" src="images/graph.png" alt="Card image cap" style="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

    </div>
    <!-- end wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>