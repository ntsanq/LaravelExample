<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $students = Student::query()
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(2);

        $students->appends(['search' => $search]);

        return view('master', [
            'students' => $students,
            'search' => $search
        ]);
    }
}
