<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $students = Student::query()
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(2);

        $students->appends(['search' => $search]);

        return view('student.index', [
            'students' => $students,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('student.create');
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
        return view('student.edit', ['student' => $student]);
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

    public function dataTables()
    {
        return Datatables::of(Student::query())
            ->editColumn('dob', function ($object) {
                return $object->age;
            })
            ->addColumn('edit', function ($object) {
                $link = route('students.edit', $object);
                return "<a class='btn btn-primary' href='$link'>Edit</a>";
            })
            ->addColumn('delete', function ($object) {
                $link = route('students.destroy', $object);
                return "<a class='btn btn-danger' href='$link'>Delete</a>";
            })
            ->rawColumns(['edit','delete'   ])
            ->make(true);
    }
}
