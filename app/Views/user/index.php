<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body" style="padding-left: 40px;">
            <h1 class="font-weight-bold" style="color: black;">Welcome <?= user()->username; ?></h1>
            <p class="font-weight-normal">Have a nice day!</p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row d-flex justify-content-around">

        <!-- Stock Makanan Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 card-hover-effect">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Food Stock
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <!-- <span id="sensor">Loading...</span> -->
                                        <span id="sensorData"></span>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        fetchSensorData();
                                    });

                                    function fetchSensorData() {
                                        fetch('/fetchData')
                                            .then(response => response.json())
                                            .then(data => {
                                                let sensorDataElement = document.getElementById('sensorData');
                                                if (data.length > 0) {
                                                    // Mengambil data sensor pertama untuk contoh
                                                    sensorDataElement.innerHTML = data[0].data_sensor;
                                                } else {
                                                    sensorDataElement.innerHTML = "No data available";
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error fetching sensor data:', error);
                                            });
                                    }
                                </script>

                                <!-- <script>
                                    async function updateSensor() {
                                        try {
                                            const response = await fetch('/saveData'); // Ganti dengan URL endpoint Anda
                                            if (response.ok) {
                                                const data = await response.json();
                                                document.getElementById('sensorData').innerText = data.data_sensor;
                                            } else {
                                                console.error('Error fetching data:', response.statusText);
                                            }
                                        } catch (error) {
                                            console.error('Error fetching data:', error);
                                        }
                                    }

                                    document.addEventListener('DOMContentLoaded', () => {
                                        updateSensor();
                                        setInterval(updateSensor, 5000); // Perbarui setiap 5 detik
                                    });
                                </script> -->
                                <div class="col">
                                    <!-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Atur Jadwal Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 card-hover-effect">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Schedule</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 x</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="#" data-toggle="modal" data-target="#infoModal">
                <div class="card border-left-warning shadow h-100 py-2 card-hover-effect">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Information</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Information on Using the Smart Cat Feeder</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li><strong>Instalasi Aplikasi</strong>: Akses aplikasi Smart Cat Feeder yang sudah terhubung dengan perangkat IoT Smart Cat Feeder.</li>
                            <li><strong>Registrasi dan Login</strong>: Daftarkan akun baru menggunakan username dan password, kemudian masuk dengan akun yang telah dibuat.</li>
                            <li><strong>Menghubungkan ke Perangkat</strong>: Pastikan perangkat Smart Cat Feeder terhubung ke jaringan Wi-Fi dan perangkat IoT Smart Cat Feeder. Buka aplikasi dan ikuti petunjuk untuk menambahkan perangkat baru. Pastikan perangkat Anda berada dalam jangkauan Wi-Fi yang sama.</li>
                            <li><strong>Pengaturan Jadwal Pemberian Makan</strong>: Pada menu utama, pilih opsi "Atur Jadwal". Tambahkan waktu pemberian makan dan jumlah porsi yang diinginkan.</li>
                            <li><strong>Monitoring dan Statistik</strong>: Aplikasi menyediakan fitur untuk memonitor aktivitas makan kucing Anda. Lihat statistik bulanan untuk memastikan kucing Anda makan dengan teratur.</li>
                            <li><strong>Notifikasi</strong>: Aktifkan notifikasi untuk mendapatkan pemberitahuan ketika makanan diberikan atau jika ada masalah dengan perangkat.</li>
                        </ol>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div> -->
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-7">
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Food Inventory</h6>
                </div>
                <div class="card-body d-flex flex-column align-items-center position-relative">
                    <canvas id="myChart" style="width: 270px; height: 85px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>

        <!-- Informasi Kucing -->
        <div class="col-xl-5">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cat</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Cat Data</div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfileModal">Edit Cat Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column align-items-center position-relative">
                    <?php if (!empty($cat)) : ?>
                        <div class="position-relative">
                            <img src="<?= base_url(); ?>/uploads/<?= $cat->gambar; ?>" alt="Cat Photo" class="img-fluid rounded mb-2" style="width: 270px; height: 220px; object-fit: cover;">

                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255, 255, 255, 0.7); padding: 10px;">
                                <div class="text-center">
                                    <h5>Name: <?= $cat->nama; ?></h5>
                                    <p>Weight: <?= $cat->berat; ?> kg</p>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <img src="/img/nopict.png" alt="Cat Photo" class="img-fluid rounded mb-2" style="width: 270px; height: 220px; object-fit: cover;">
                    <?php endif; ?>
                </div>

                <img src="<?= base_url('img/feedback.png'); ?>" alt="Feedback Photo" class="img-fluid rounded mb-2 position-absolute" style="width: 50px; height: 50px; bottom: 10px; right: 25px; cursor: pointer;" data-toggle="modal" data-target="#feedbackModal" data-backdrop="static" data-keyboard="false">
            </div>
        </div>
    </div>

    <!-- Modal Edit Profile Kucing -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Cat Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Edit Profile Kucing -->
                    <form id="editProfileForm" action="/user/saveCat" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="inputKucingImage">Select Cat Photo</label>
                            <input type="file" class="form-control-file" id="inputKucingImage" name="gambar" required>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaKucing">Name</label>
                            <input type="text" class="form-control" id="inputNamaKucing" name="nama" placeholder="Nama Kucing" required>
                        </div>
                        <div class="form-group">
                            <label for="inputBeratKucing">Weight</label>
                            <input type="number" class="form-control" id="inputBeratKucing" name="berat" placeholder="Berat Kucing" min="0" max="20" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-brown">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Modal Feedbcak -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Yuk Luangin Waktu Kamu Sebentar Berikan Ulasan Kamu Untuk Aplikasi Kami</h5>
                <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm" class="needs-validation" action="/user/analyzeAndSave" method="post" novalidate>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= user()->username; ?>" readonly required>
                        <div class="invalid-feedback">
                            Nama harus diisi.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ulasan">Ulasan</label>
                        <textarea class="form-control" id="ulasan" name="komentar" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Ulasan harus diisi.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-brown" id="submitFeedbackBtn">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->



<script>
    // Form validation script
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the form we want to add validation styles to
            var form = document.getElementById('feedbackForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>


<!-- Success Message Popup -->
<div id="successPopup" class="alert alert-success alert-dismissible fade d-none" role="alert">
    Ulasan berhasil dikirim!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>



<script>
    $(document).ready(function() {
        $('#submitFeedbackBtn').click(function() {
            var isValid = document.getElementById('feedbackForm').checkValidity();
            if (isValid) {
                // Menandai form sebagai sudah divalidasi
                $('#feedbackForm').addClass('was-validated');

                // Mengirimkan feedback (pada bagian ini harus ditambahkan logika untuk pengiriman ke server)

                // Menutup modal setelah berhasil mengirimkan feedback
                $('#feedbackModal').modal('hide');

                // Menampilkan pesan sukses sementara
                $('#successPopup').removeClass('d-none').addClass('show');
                setTimeout(function() {
                    $('#successPopup').removeClass('show').addClass('d-none');
                }, 3000); // Hide after 3 seconds
            } else {
                // Jika form tidak valid, tambahkan class was-validated untuk menampilkan pesan kesalahan
                $('#feedbackForm').addClass('was-validated');
            }
        });

        // Menghapus backdrop modal setelah modal ditutup
        $('#feedbackModal').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
        });

        // Menutup pesan sukses secara manual jika tombol close di klik
        $('#successPopup .close').click(function() {
            $('#successPopup').removeClass('show').addClass('d-none');
        });
    });
</script>

<!-- Chart.js Script -->
<script>
    const xValues = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: [7, 7, 7, 7, 7, 2, 7],
                borderColor: "#AE7B53",
                fill: false
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return value.toLocaleString() + " cm";
                        }
                    }
                }]
            }
        }
    });
</script>
<!-- END Chart.js Script -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>