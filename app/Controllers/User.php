<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use App\Models\CatModel;
use App\Models\UserModel;
use App\Models\SensorModel;
use CodeIgniter\Controller;
// use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $db, $builder;
    protected $client;

    protected $feedbackModel;
    protected $catModel;
    protected $userModel;
    protected $sensorModel;

    public function __construct()
    {
        $this->db               = \Config\Database::connect();
        $this->builder          = $this->db->table('cat');
        $this->feedbackModel    = new FeedbackModel();
        $this->catModel         = new CatModel();
        $this->userModel        = new UserModel();
        $this->sensorModel      = new SensorModel(); // Instantiate sensorModel
        $this->client           = \Config\Services::curlrequest();
    }

    public function index()
    {
        $user_id = user_id(); // Ensure this function exists and returns the logged-in user's ID

        $catQuery = $this->builder
            ->select('cat.id as id, nama, berat, gambar, user_id')
            ->where('user_id', $user_id)
            ->orderBy('id', 'DESC') // Urutkan berdasarkan ID dari yang terbaru
            ->limit(1) // Ambil satu entri terbaru
            ->get();

        $data['cat'] = $catQuery->getRow(); // Ambil satu hasil

        // Mengirimkan data ke tampilan
        return view('user/index', $data);
    }


    // public function profile()
    // {
    //     $user_id = user_id(); // Ambil ID pengguna yang sedang login
    //     $this->userModel->select('id as userid, username, email, user_image');
    //     $this->userModel->where('id', $user_id);
    //     $query = $this->userModel->get();
    //     $data['user'] = $query->getRow(); // Ambil satu hasil

    //     return view('user/profile', $data);
    // }

    public function profile()
    {
        $user_id = user_id(); // Ambil ID pengguna yang sedang login
        $this->userModel->select('id as userid, username, email, user_image');
        $this->userModel->where('id', $user_id);
        $query = $this->userModel->get();
        $data['user'] = $query->getRow(); // Ambil satu hasil sebagai objek

        if (!$data['user']) {
            // Tangani jika pengguna tidak ditemukan
            return redirect()->to('user')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('user/profile', $data);
    }


    public function updateProfile()
    {
        $user_id = user_id();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->request->getFile('user_image')->isValid()) {
            $user_image = $this->request->getFile('user_image');
            $newImage = $user_image->getRandomName();
            $user_image->move(WRITEPATH . '../public/uploads', $newImage);
            $data['user_image'] = $newImage;
        }

        $this->userModel->update($user_id, $data);

        return redirect()->to('user/profile')->with('success', 'Profile updated successfully');
    }

    public function saveCat()
    {
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $berat = $this->request->getPost('berat');
        $gambar = $this->request->getFile('gambar');

        // Validasi data form
        if (empty($nama) || empty($berat) || !$gambar->isValid()) {
            return redirect()->back()->withInput()->with('error', 'Semua data kucing harus diisi.');
        }

        // Simpan file gambar
        $gambarName = $gambar->getRandomName();
        $gambar->move(WRITEPATH . '../public/uploads', $gambarName);

        $data = [
            'user_id' => user_id(), // pastikan ada user_id di sini, misalnya dari session atau context
            'nama' => $nama,
            'berat' => $berat,
            'gambar' => $gambarName
        ];

        $this->catModel->save($data); // Gunakan save untuk insert atau update

        return redirect()->to('/user')->with('success', 'Data kucing berhasil disimpan!');
    }


    public function analyzeAndSave()
    {
        // Get data from form
        $nama = $this->request->getPost('nama');
        $komentar = $this->request->getPost('komentar');

        // Validate form data
        if (empty($nama) || empty($komentar)) {
            return redirect()->back()->withInput()->with('error', 'Nama dan komentar harus diisi.');
        }

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->post('http://127.0.0.1:8080/prediction', [
                'json' => ['text' => $komentar]
            ]);

            if ($response->getStatusCode() === 200) {
                $result = json_decode($response->getBody(), true);

                $data = [
                    'tanggal' => date('Y-m-d H:i:s'),
                    'nama' => $nama,
                    'komentar' => $komentar,
                    'label' => $result['prediksi']
                ];

                $this->feedbackModel->insert($data);

                return redirect()->to('/user')->with('success', 'Ulasan berhasil dikirim dan disimpan!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengirim ulasan untuk dianalisis.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
