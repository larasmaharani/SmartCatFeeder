<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid custom-font">
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header custom-padding">
                    <h4 class="card-title">User List</h4>
                </div>

                <div class="container-fluid mt-3 mb-0">
                    <div class="row">
        
                        <!-- Select Entries -->
                        <div class="col-sm-12 col-md-6 d-flex justify-content-start align-items-center">
                            <div class="dataTables_length" id="dataTable_length">
                                <label class="d-flex align-items-center m-0 p-0">
                                    Show
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm mx-2" onchange="changePerPage(this.value)">
                                        <option value="10" <?= $perPage == 10 ? 'selected' : '' ?>>10</option>
                                        <option value="25" <?= $perPage == 25 ? 'selected' : '' ?>>25</option>
                                        <option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50</option>
                                        <option value="100" <?= $perPage == 100 ? 'selected' : '' ?>>100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 d-flex justify-content-end align-items-center">
                            <form method="GET" action="" class="d-inline">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label class="d-flex align-items-center m-0 p-0">
                                        Search:
                                        <input type="search" class="form-control form-control-sm mx-2" placeholder="" aria-controls="dataTable" name="keyword" value="<?= $keyword ?? '' ?>">
                                        <button class="btn btn-sm rounded-pill ms-2" type="submit" name="buttonKeyword" style="background-color: #A0522D; color: white;">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="feedback-table" class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-gradient" style="background-color: #A0522D; color: white;">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <th class="p-1 align-middle text-center" scope="row"><?= $i; ?></th>
                                            <td class="p-1 align-middle text-center"><?= $user->username; ?></td>
                                            <td class="p-1 align-middle text-center"><?= $user->email; ?></td>
                                            <td class="p-1 align-middle text-center"><?= $user->name; ?></td>
                                            <td class="p-1 align-middle text-center">
                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView<?= $user->userid ?>"><i class="fa-solid fa-eye"></i></a>

                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $user->userid ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>

                                        </tr>

                                        <!-- Awal Modal Hapus-->
                                        <div class="modal fade" id="modalHapus<?= $user->userid ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data</h1>
                                                    </div>
                                                    <form method="POST" action="<?= base_url('admin/deleteUser/' . $user->userid) ?>">
                                                        <input type="hidden" name="id" value="<?= $user->userid ?>">

                                                        <div class="modal-body">
                                                            <h6 class="text-center">Are you sure you want to delete this data?<br><br>
                                                                <span class="text-danger"><?= $user->username; ?> - <?= $user->email; ?></span>
                                                            </h6>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-brown" name="buttonHapus">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Hapus-->


                                        <!-- Awal Modal View-->
                                        <div class="modal fade" id="modalView<?= $user->userid ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Data User</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group list-group-flush ">
                                                            <li class="list-group-item text-center">
                                                                <img src="<?= base_url(); ?>/uploads/<?= $user->user_image; ?>" class="img-fluid rounded-circle mx-auto d-block" alt="<?= $user->username; ?>" style="width: 150px; height: 150px;">
                                                            </li>
                                                            <li class="list-group-item">
                                                                <span class="badge" style="font-size: 1.2em; background-color: #A0522D; color: white;"><?= $user->name; ?></span>
                                                            </li>
                                                            <li class="list-group-item">Name : <?= $user->username; ?></li>
                                                            <li class="list-group-item">Email : <?= $user->email; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal View-->
                                         
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No Data Found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- Pagination -->
    <div class="row mt-2 mb-0">
        <div class="col-12 d-flex justify-content-center">
            <ul class="pagination">
                <li class="paginate_button page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                    <a href="<?= base_url('admin/manageuser?page=' . ($currentPage - 1) . '&perPage=' . $perPage) ?>" class="page-link">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="paginate_button page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/manageuser?page=' . $i . '&perPage=' . $perPage) ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="paginate_button page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                    <a href="<?= base_url('admin/manageuser?page=' . ($currentPage + 1) . '&perPage=' . $perPage) ?>" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function changePerPage(perPage) {
            window.location.href = '<?= base_url('admin/manageuser?page=1') ?>' + '&perPage=' + perPage;
        }
    </script>

</div>
<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>