<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $students = Student::query()
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(2);

        $students->appends(['search' => $search]);

        return view('Student.index', [
            'students' => $students,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('Student.create');
    }

    public function store(StoreRequest $request)
    {
        $student = new Student();
        $student->fill($request->except('_token'));
        $student->save();
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('Student.edit', ['student' => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update(
            $request->except(
                '_token',
                '_method'
            )
        );
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
