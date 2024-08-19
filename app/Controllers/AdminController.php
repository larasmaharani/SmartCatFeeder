<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use App\Models\UserModel;
use PhpParser\Comment;

class AdminController extends BaseController
{

    protected $db, $builder;

    public function __construct()
    {
        $this->db         = \Config\Database::connect();
        $this->builder    = $this->db->table('users');
    }

    protected function countFeedbackByLabel($label)
    {
        $model = new FeedbackModel();
        return $model->where('label', $label)->countAllResults();
    }


    // HOME
    public function index()
    {
        // $userCount = $this->countUsers();
        // $feedbackCount = $this->countFeedbacks();

        // return view('admin/home', [
        //     'userCount' => $userCount,
        //     'feedbackCount' => $feedbackCount
        // ]);

        $userCount = $this->countUsers();
        $feedbackCount = $this->countFeedbacks();
        $positiveCount = $this->countFeedbackByLabel('Positif');
        $negativeCount = $this->countFeedbackByLabel('Negatif');
        $neutralCount = $this->countFeedbackByLabel('Netral');

        return view('admin/home', [
            'userCount' => $userCount,
            'feedbackCount' => $feedbackCount,
            'positiveCount' => $positiveCount,
            'negativeCount' => $negativeCount,
            'neutralCount' => $neutralCount,
        ]);
    }

    protected function countUsers()
    {
        return $this->builder->countAllResults();
    }

    protected function countFeedbacks()
    {
        $model = new FeedbackModel();
        return count($model->findAll());
    }

    // // MANAGE USER
    // public function manageuser($id = 0)
    // {

    //     $data['title'] = 'User List';

    //     // Ambil keyword pencarian dari GET request
    //     $keyword = $this->request->getGet('keyword');
    //     $keyword = is_string($keyword) ? $keyword : '';

    //     // Query builder untuk mengambil data user
    //     $this->builder->select('users.id as userid, username, email, user_image, name');
    //     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    //     $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

    //     // Jika ada keyword pencarian, filter berdasarkan username atau email
    //     if (!empty($keyword)) {
    //         $this->builder->groupStart()
    //             ->like('username', $keyword)
    //             ->orLike('email', $keyword)
    //             ->groupEnd();
    //     }

    //     // Eksekusi query
    //     $query = $this->builder->get();

    //     // Simpan hasil query ke dalam array $data
    //     $data['users'] = $query->getResult();

    //     // Jika $id tidak sama dengan 0, ambil detail user berdasarkan id
    //     if ($id != 0) {
    //         $this->builder->where('users.id', $id);
    //         $data['user'] = $query->getRow();
    //     }


    //     // Load view 'admin/manageuser' dengan data yang sudah disiapkan
    //     return view('admin/manageuser', $data);
    // }

    // MANAGE USER
    public function manageuser($id = 0)
    {
        $data['title'] = 'User List';

        // Ambil keyword pencarian dari GET request
        $keyword = $this->request->getGet('keyword');
        $keyword = is_string($keyword) ? $keyword : '';

        // Ambil jumlah entries per halaman dari GET request
        $perPage = $this->request->getGet('perPage');
        $perPage = is_numeric($perPage) ? intval($perPage) : 10;

        // Ambil nomor halaman dari GET request
        $page = $this->request->getGet('page');
        $page = is_numeric($page) ? intval($page) : 1;

        // Query builder untuk mengambil data user
        $this->builder->select('users.id as userid, username, email, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        // Jika ada keyword pencarian, filter berdasarkan username atau email
        if (!empty($keyword)) {
            $this->builder->groupStart()
                ->like('username', $keyword)
                ->orLike('email', $keyword)
                ->groupEnd();
        }

        // Hitung total baris yang cocok dengan filter
        $totalRows = $this->builder->countAllResults(false);

        // Tentukan offset berdasarkan halaman dan jumlah entries per halaman
        $offset = ($page - 1) * $perPage;

        // Eksekusi query dengan limit dan offset untuk pagination
        $query = $this->builder->get($perPage, $offset);

        // Simpan hasil query ke dalam array $data
        $data['users'] = $query->getResult();
        $data['totalPages'] = ceil($totalRows / $perPage);
        $data['currentPage'] = $page;
        $data['perPage'] = $perPage;

        // Jika $id tidak sama dengan 0, ambil detail user berdasarkan id
        if ($id != 0) {
            $this->builder->where('users.id', $id);
            $data['user'] = $query->getRow();
        }

        // Load view 'admin/manageuser' dengan data yang sudah disiapkan
        return view('admin/manageuser', $data);
    }


    // DELETE USER
    public function deleteUser($id)
    {
        // Load the model
        $userModel = new UserModel();

        // Delete the user
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/manageuser')->with('message', 'User has been deleted');
        } else {
            return redirect()->to('/admin/manageuser')->with('message', 'Failed to delete user');
        }
    }

     // DELETE FEEDBACK
     public function deleteFeedback($id)
     {
         // Load the model
         $feedbackModel = new FeedbackModel();
 
         // Delete the feedback
         if ($feedbackModel->delete($id)) {
             return redirect()->to('/admin/feedback')->with('message', 'Feedback has been deleted');
         } else {
             return redirect()->to('/admin/feedback')->with('message', 'Failed to delete feedback');
         }
     }
 
 

    // MANAGE FEEDBACK
    public function feedback()
{
    $model = new FeedbackModel();

    // Mendapatkan nilai filter dari GET request
    $filter = $this->request->getGet('filter');
    $perPage = $this->request->getGet('perPage') ?? 10;
    $currentPage = $this->request->getGet('page') ?? 1;

    // Menghitung offset berdasarkan currentPage dan perPage
    $offset = ($currentPage - 1) * $perPage;

    // Mengambil data berdasarkan filter jika ada
    if (!empty($filter)) {
        $totalFeedback = $model->where('label', $filter)->countAllResults(false);
        $dataFeedback = $model->where('label', $filter)->findAll($perPage, $offset);
    } else {
        // Jika tidak ada filter, ambil semua data
        $totalFeedback = $model->countAllResults(false);
        $dataFeedback = $model->findAll($perPage, $offset);
    }

    $totalPages = ceil($totalFeedback / $perPage);

    return view('admin/feedback', [
        'dataFeedback' => $dataFeedback,
        'currentPage' => $currentPage,
        'perPage' => $perPage,
        'totalPages' => $totalPages,
        'filter' => $filter,
    ]);
}

}
