<?php

namespace App\Http\Controllers;

use App\Mail\school;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function mailing(Student $student)
    {

        $users = DB::select('select * from students where discipline = ?', [1]);

        foreach ($users as $user) {
            Mail::to($user)->send(new school($user));
        }
    }
}
