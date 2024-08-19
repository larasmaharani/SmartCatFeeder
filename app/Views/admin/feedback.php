<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header custom-padding">
                    <h4 class="card-title">User Feedback</h4>
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
                            <form method="GET" action="">
                                <div class="input-group justify-content-start">
                                    <label for="filter-label" class="me-2">Filter</label>
                                    <select id="filter-label" name="filter" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <option value="Positif" <?= ($_GET['filter'] ?? '') == 'Positif' ? 'selected' : '' ?>>Positif</option>
                                        <option value="Negatif" <?= ($_GET['filter'] ?? '') == 'Negatif' ? 'selected' : '' ?>>Negatif</option>
                                        <option value="Netral" <?= ($_GET['filter'] ?? '') == 'Netral' ? 'selected' : '' ?>>Netral</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm" style="background-color: #A0522D; color: white;">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="feedback-table" class="table table-striped table-hover table-custom">
                            <thead>
                                <tr class="bg-gradient" style="background-color: #A0522D; color: white;">
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Review</th>
                                    <th class="text-center">Label</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($dataFeedback)) : ?>
                                    <?php foreach ($dataFeedback as $feedback) : ?>
                                        <?php
                                        $words = explode(' ', $feedback['komentar']);
                                        $shortReview = implode(' ', array_slice($words, 0, 8)) . (count($words) > 8 ? '...' : '');
                                        ?>
                                        <tr>
                                            <td class="p-1 align-middle text-center"><?= $feedback['tanggal'] ?></td>
                                            <td class="p-1 align-middle text-center"><?= $feedback['nama'] ?></td>
                                            <td class="p-1 align-middle text-center"><?= $shortReview ?></td>
                                            <td class="p-1 align-middle text-center">
                                                <?php
                                                $labelClass = '';
                                                switch ($feedback['label']) {
                                                    case 'Positif':
                                                        $labelClass = 'badge badge-success border border-success text-light';
                                                        break;
                                                    case 'Negatif':
                                                        $labelClass = 'badge badge-danger border border-danger text-light';
                                                        break;
                                                    case 'Netral':
                                                        $labelClass = 'badge badge-warning border border-warning text-dark';
                                                        break;
                                                    default:
                                                        $labelClass = 'badge badge-secondary border border-secondary text-light';
                                                        break;
                                                }
                                                ?>
                                                <span class="<?= $labelClass ?>"><?= $feedback['label'] ?></span>
                                            </td>
                                            <td class="p-1 align-middle text-center">
                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalViewFeedback<?= $feedback['id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapusFeedback<?= $feedback['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Awal Modal Hapus-->
                                        <div class="modal fade" id="modalHapusFeedback<?= $feedback['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel<?= $feedback['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalHapusLabel<?= $feedback['id'] ?>">Delete Data</h1>
                                                    </div>
                                                    <form method="POST" action="<?= base_url('admin/deleteFeedback/' . $feedback['id']) ?>">
                                                        <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
                                                        <div class="modal-body">
                                                            <h6 class="text-center">Are you sure you want to delete this data?</h6>
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
                                        <div class="modal fade" id="modalViewFeedback<?= $feedback['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalViewLabel<?= $feedback['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalViewLabel<?= $feedback['id'] ?>">Data User</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <?php
                                                                $badgeColor = '';
                                                                switch ($feedback['label']) {
                                                                    case 'Positif':
                                                                        $badgeColor = 'badge-success';
                                                                        break;
                                                                    case 'Negatif':
                                                                        $badgeColor = 'badge-danger';
                                                                        break;
                                                                    case 'Netral':
                                                                        $badgeColor = 'badge-warning';
                                                                        break;
                                                                    default:
                                                                        $badgeColor = 'badge-secondary';
                                                                        break;
                                                                }
                                                                ?>
                                                                <span class="badge <?= $badgeColor ?>" style="font-size: 1.2em;"><?= $feedback['label'] ?></span>
                                                            </li>
                                                            <li class="list-group-item">Date : <?= $feedback['tanggal'] ?></li>
                                                            <li class="list-group-item">Name : <?= $feedback['nama'] ?></li>
                                                            <li class="list-group-item">Review : <?= $feedback['komentar'] ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal View-->
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No Feedback Found</td>
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
                    <a href="<?= base_url('admin/feedback?page=' . ($currentPage - 1) . '&perPage=' . $perPage . '&filter=' . $filter) ?>" class="page-link">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="paginate_button page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/feedback?page=' . $i . '&perPage=' . $perPage . '&filter=' . $filter) ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="paginate_button page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                    <a href="<?= base_url('admin/feedback?page=' . ($currentPage + 1) . '&perPage=' . $perPage . '&filter=' . $filter) ?>" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function changePerPage(perPage) {
            window.location.href = '<?= base_url('admin/feedback?page=1&filter=' . $filter) ?>' + '&perPage=' + perPage;
        }
    </script>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>