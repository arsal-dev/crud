<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        $return = DB::table('students')->insert([
            'name' => 'Ahmed2',
            'email' => 'ahmed2@email.com',
            'password' => '12345678',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        dd($return);
    }

    public function read()
    {
        // select name, email from students where id = 1;

        $result = DB::table('students')
            ->select('email', 'password')
            ->where('id', 3)
            ->get();

        return $result;
    }

    public function update()
    {
        $result = DB::table('students')->where('id', 3)->update([
            'name' => 'Arsalan',
            'email' => 'arsalan@email.com'
        ]);

        return $result;
    }

    public function delete()
    {
        $result = DB::table('students')->where('id', 3)->delete();

        return $result;
    }


    public function mcreate()
    {
        $result = Student::insert([
            'name' => 'John Doe',
            'email' => 'jd@email.com',
            'password' => '12345678',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $result;
    }

    public function mread()
    {
        $result = Student::get();

        dd($result);
    }

    public function mupdate()
    {
        $result = Student::where('id', 4)->update([
            'password' => 87654321
        ]);

        dd($result);
    }

    public function mdelete()
    {
        $result = Student::where('id', 4)->delete();

        dd($result);
    }
}
