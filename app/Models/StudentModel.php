<?php 

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'student';
    protected $primaryKey       = 'id'; // Assuming 'id' is your primary key (RegNo)
    protected $allowedFields    = ['id', 'first_name', 'last_name', 'dob', 'email', 'phone_no', 'course'];
    protected $useAutoIncrement = false;

    public function searchByCourse($course)
    {
        return $this->where('course', $course)->findAll();
    }
}

?>