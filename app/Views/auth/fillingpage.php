<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Profil Kucing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFEDE5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            margin-bottom: 20px;
            /* Added margin for spacing */
        }

        .img-container {
            position: relative;
            width: 100%;
            height: auto;
        }

        .img-fluid {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .form-container {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-brown {
            background-color: #AE7B53;
            color: white;
            margin-bottom: 10px;
        }

        .btn-brown:hover {
            background-color: #A0522D;
            color: white;
        }

        
    </style>
</head>

<body>
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="img-container">
                        <img src="<?= base_url('/img/kucing.png') ?>" alt="Preview Image" class="img-fluid" id="previewImage">
                        <input type="file" id="fileInput" name="profilePicture" style="display: none;" accept="image/*" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body form-container">
                        <button class="btn btn-brown mt-2" id="uploadBtn">Upload Foto Profil</button>
                        <!-- Form submission ke method saveCat() pada controller -->
                        <form action="<?= site_url('user/saveCat') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="catName" placeholder="Nama Kucing Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <select class="form-control" name="catWeight" required>
                                    <option value="" selected disabled>Pilih Berat Kucing Anda</option>
                                    <option value="0.5-1.5 kg">0,5 — 1,5 kg</option>
                                    <option value="1.5-2.5 kg">1,5 — 2,5 kg</option>
                                    <option value="2.5-3.5 kg">2,5 — 3,5 kg</option>
                                    <option value="3.5-4.5 kg">3,5 — 4,5 kg</option>
                                    <option value="4.5-5.5 kg">4,5 — 5,5 kg</option>
                                    <option value="5.5-6.5 kg">5,5 — 6,5 kg</option>
                                    <option value="6.5-7.5 kg">6,5 — 7,5 kg</option>
                                    <option value="7.5-8.5 kg">7,5 — 8,5 kg</option>
                                    <option value="8.5-10 kg">8,5 — 10 kg</option>
                                    <option value=">10 kg">> 10 kg</option>
                                    <option value="Belum Tahu">Belum Tahu</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-brown">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('uploadBtn').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>