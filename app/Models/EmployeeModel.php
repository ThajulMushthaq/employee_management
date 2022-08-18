<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee';


    public function get_all_data()
    {
        try {
            $query = DB::table($this->table)
                ->select('id', 'name', 'email', 'phone')
                ->orderBy('id', 'DESC')->get();
            return $query;
        } catch (Exception $e) {
        }
    }

    public function get_row($id = 0)
    {
        try {
            $query = DB::table($this->table)
                ->select('id', 'name', 'email', 'phone')
                ->where('id', $id)
                ->orderBy('id', 'DESC')->first();
            return $query;
        } catch (Exception $e) {
        }
    }


    public function save_data($data = array(), $id = 0)
    {
        try {
            if ($id > 0) {
                DB::table($this->table)
                    ->where('id', $id)
                    ->update($data);
            } else {
                DB::table($this->table)->insert($data);
            }
        } catch (Exception $e) {
        }
    }


    public function delete_data($id = 0)
    {
        try {
            DB::table($this->table)
                ->where('id', $id)->delete();
        } catch (Exception $e) {
        }
    }
}
