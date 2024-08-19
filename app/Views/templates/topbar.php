<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="header" style="background-color: #A0522D; padding: 10px; color: white">
                    Notification
                </h6>
                <?php if (in_groups('user')): ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Jul 30, 2024</div>
                            <span class="font-weight-bold">Check Food Supplies!</span>
                            <div class="small text-gray-500">It's empty, fill it up now.</div>
                        </div>
                    </a>
                <?php else: ?>
                    <div class="dropdown-item d-flex align-items-center" style="cursor: not-allowed;">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Jul 30, 2024</div>
                            <span class="font-weight-bold">Check Food Supplies!</span>
                            <div class="small text-gray-500">It's empty, fill it up now.</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </li>


        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/uploads/<?= user()->user_image; ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (in_groups('user')): ?>
                    <a class="dropdown-item" href="/user/profile?id=<?= user()->id; ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                <?php else: ?>
                    <div class="dropdown-item d-flex align-items-center" style="cursor: not-allowed;">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </div>
                <?php endif; ?>
            </div>
        </li>


    </ul>
</nav>
<!-- End Topbar -->