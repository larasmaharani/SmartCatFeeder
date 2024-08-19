<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SensorModel;

class SensorController extends ResourceController
{

    protected $modelname = "App\Models\SensorModel";

    public function store()
    {
        // $user_id = user_id();

        $rules = [
            'data_sensor' => 'required|numeric',
            'user_id' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        // $data = [
        //     'data_sensor' => $this->request->getVar('data_sensor'),
        //     'user_id' => $this->request->getVar('user_id'),
        // ];

        $model = new SensorModel();

        // $model = SensorModel::where("user_id", $user_id);

        // $model->update($this->request->getVar('user_id'), $this->request->getVar('data_sensor'));

        $model->updateSensor($this->request->getVar('user_id'), array(
            "data_sensor" => $this->request->getVar('data_sensor'),

        ));
        // $model->save($data);

        return $this->respond(['message' => 'Data received successfully'], 200);
    }

    public function fetchData()
    {
        $model = new SensorModel();
        $data = $model->findAll(); // Mengambil semua data sensor
        return $this->respond($data);
    }
}
