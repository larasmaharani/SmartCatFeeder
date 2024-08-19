<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion d-flex flex-column" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= (in_groups('admin')) ? '/admin' : '/user'; ?>">
        <div class="sidebar-brand-text" style="background-color: #A0522D; color: white; padding: 7px; border-radius: 5px; display: inline-block;">Smart</div>
        <text style="color: #A0522D;">CatFeeder</text>
    </a>

    <?php if (in_groups('user')) : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active mt-5 mb-3">
            <a class="nav-link mx-3" href="<?= base_url('user') ?>" style="background-color: #A0522D; color: white; padding: 10px; width: 180px; border-radius: 5px; display: inline-block;">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>

    <?php if (in_groups('admin')) : ?>
        <li class="nav-item active mt-5">
            <a class="nav-link mx-3" href="<?= base_url('admin') ?>" style="background-color: #A0522D; color: white; padding: 10px; width: 180px; border-radius: 5px; display: inline-block;">
                <i class="fas fa-fw fa-house"></i>
                <span>Home</span></a>
        </li>

        <li class="nav-item active mt-2 ">
            <a class="nav-link mx-3" href="<?= base_url('admin/manageuser') ?>" style="background-color: #A0522D; color: white; padding: 10px; width: 180px; border-radius: 5px; display: inline-block;">
                <i class="fas fa-fw fa-circle-user"></i>
                <span>Manage User</span></a>
        </li>

        <li class="nav-item active mt-2 ">
            <a class="nav-link mx-3" href="<?= base_url('admin/feedback') ?>" style="background-color: #A0522D; color: white; padding: 10px; width: 180px; border-radius: 5px; display: inline-block;">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Feedback Report</span></a>
        </li>

    <?php endif; ?>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item mb-3">
                <a class="nav-link mx-3 btn btn-brown" href="monitoring.html" style="padding: 10px; width: 180px;">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Monitoring</span>
                </a>
            </li> -->

    <!-- Add flex-grow-1 to take up the remaining space -->
    <div class="flex-grow-1"></div>

    <!-- Logout item -->
    <li class="nav-item" data-toggle="modal" data-target="#logoutModal">
        <a class="nav-link mx-3" style="color: #A0522D; width: 180px;">
            <i class="fas fa-sign-out-alt" style="color: #A0522D;"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->