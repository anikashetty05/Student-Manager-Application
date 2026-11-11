<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use DateTime;

class StudentController extends BaseController
{
    protected $studentModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        return view('student/menu');
    }

    public function menu()
    {
        return view('student/menu');
    }

    public function register()
    {
        return view('student/register');
    }

    public function store()
    {
        $data = [];

        if ($this->request->is('post')) {
            $regno = $this->request->getPost('regno');
            $dob = $this->request->getPost('dob');

            // 1. Validate if the date string is a real calendar date (YYYY-MM-DD)
            $d = DateTime::createFromFormat('Y-m-d', $dob);
            if (!$d || $d->format('Y-m-d') !== $dob) {
                $data['message'] = 'Error: Please enter a valid date of birth';
                return view('student/register', $data);
            }

            // 2. Check if DOB is in the future
            $today = new DateTime();
            $birthDate = new DateTime($dob);
            if ($birthDate > $today) {
                $data['message'] = 'Error: Please enter a valid date of birth';
                return view('student/register', $data);
            }

            $age = $today->diff($birthDate)->y;
            if ($age < 3 || $age > 100) {
                $data['message'] = 'Error: Invalid Date of Birth';
                return view('student/register', $data);
            }

            $existingStudent = $this->studentModel->find($regno);

            if ($existingStudent) {
                $data['message'] = 'Error: Register Number already exists!';
            } else {
                $insertData = [
                    'id'         => $regno,
                    'first_name' => $this->request->getPost('fname'),
                    'last_name'  => $this->request->getPost('lname'),
                    'dob'        => $this->request->getPost('dob'),
                    'email'      => $this->request->getPost('email'),
                    'phone_no'   => $this->request->getPost('phoneno'),
                    'course'     => $this->request->getPost('course'),
                ];

                $this->studentModel->insert($insertData);
                $data['message'] = 'Record saved successfully!';
            }
        }

        return view('student/register', $data);
    }

    public function display()
    {
        $data['students'] = $this->studentModel->findAll();
        return view('student/display', $data);
    }

    public function search()
    {
        $data = [];

        if ($this->request->getGet('course') !== null) {
            $course = trim($this->request->getGet('course'));
            
            $data['students'] = $this->studentModel->where('course', $course)->findAll();
            $data['searchCourse'] = $course;

            return view('student/searchresults', $data);
        }

        return view('student/search', $data);
    }

    public function update()
    {
        $data = [];

        if ($this->request->is('post')) {
            // 1. Define validation rules first
            $rules = [
                'regno'    => 'required|is_natural_no_zero',
                'email'    => 'permit_empty|valid_email', 
                'phoneno'  => 'permit_empty|is_natural',
            ];

            $messages = [
                'phoneno' => [
                    'is_natural'   => 'Contact number must contain digits only.',
                ],
            ];

            // 2. Run validation before touching the database
            if (! $this->validate($rules, $messages)) {
                $data['message'] = 'Error: Please check your inputs.';
                return view('student/update', $data);
            }

            $id    = $this->request->getPost('regno');
            $email = trim((string) $this->request->getPost('email'));
            $phone = trim((string) $this->request->getPost('phoneno'));

            // 3. Check if student exists in the database
            $student = $this->studentModel->find($id);
            if (!$student) {
                $data['message'] = 'Error: Record does not exist.';
                return view('student/update', $data);
            }

            // 4. Ensure at least one update field is provided
            if ($email === '' && $phone === '') {
                $data['message'] = 'Error: Enter a new email, a new contact number, or both.';
                return view('student/update', $data);
            }

            // 5. Build update array dynamically based on filled fields
            $updateData = [];
            if ($email !== '') { $updateData['email'] = $email; }
            if ($phone !== '') { $updateData['phone_no'] = $phone; }

            // 6. Perform the update
            $this->studentModel->update($id, $updateData);
            $data['message'] = 'Record updated successfully!';
        }

        return view('student/update', $data);
    }

    public function delete()
    {
        $data = [];

        if ($this->request->is('post')) {
            $regno = $this->request->getPost('regno');
            $student = $this->studentModel->find($regno);

            if (!$student) {
                $data['message'] = 'Error: Record does not exist!';
            } else {
                $this->studentModel->delete($regno);
                $data['message'] = 'Record deleted successfully!';
            }
        }

        return view('student/delete', $data);
    }
}
