<?php if (isset($user) && is_object($user)): ?>
    <?= $this->extend('templates/index'); ?>

    <?= $this->section('page-content'); ?>

    <div class="container pt-5">
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <img src="<?= base_url(); ?>/uploads/<?= $user->user_image; ?>" class="rounded-circle" alt="User Image" width="150">
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text"><strong>Username: </strong><?= $user->username; ?></p>
                            <p class="card-text"><strong>Email: </strong><?= $user->email; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a class="btn btn-secondary me-4" href="<?= base_url('user') ?>">
                                << Back Dashboard</a>
                                    <button class="btn btn-brown" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('user/updateProfile'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_image" class="form-label">Gambar Profil</label>
                            <input type="file" class="form-control" id="user_image" name="user_image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-brown">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>
<?php else: ?>
    <p>Pengguna tidak ditemukan atau data tidak valid.</p>
<?php endif; ?>
