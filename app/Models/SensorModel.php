<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table = 'iot_sensor';
    // protected $primaryKey = 'user_id';

    // protected $allowedFields = ['tanggal', 'data_sensor', 'user_id'];
    protected $allowedFields = ['data_sensor', 'user_id'];

    public function updateSensor($user_id, $data_sensor)
    {
        $builder = $this->db->table($this->table);

        // Cek apakah user_id sudah ada di tabel
        $existing = $builder->where("user_id", $user_id)->get()->getRowArray();

        // Tentukan status makanan berdasarkan nilai data_sensor
        $sensor_value = $data_sensor['data_sensor'];
        if ($sensor_value > 5) {
            $data_sensor['data_sensor'] = "Makanan Habis";
        } else {
            $data_sensor['data_sensor'] = "Makanan Tersedia";
        }

        if ($existing) {
            // Jika user_id ditemukan, lakukan update
            return $builder->where("user_id", $user_id)->update($data_sensor);
        } else {
            // Jika user_id tidak ditemukan, tambahkan data baru
            $data_sensor['user_id'] = $user_id;
            return $builder->insert($data_sensor);
        }
    }
}
