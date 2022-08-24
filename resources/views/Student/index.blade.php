@extends('master')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/datatables.min.css"/>
@endpush

@section('content')
@section('title')
    Students
@endsection('content')
    <div class="card">
        <div class="card-body">

            <a href="{{ route('students.create') }}" class="btn btn-secondary">
                Add a new student
            </a>
                <form class="float-right form-group form-inline">
                   <label class="mr-2"> Search: </label><input type="search" name="search" value=" {{$search}} " class="form-control">
                </form>
            <p>All students:</p>
            <table class="table table-hover table-centered mb-0">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td> {{ $student->id }}</td>
                        <td> {{ $student->name }} </td>
                        <td> {{ $student->age }} </td>
                        <td> {{ $student->gender }} </td>
                        <td>
                            <a href="{{route('students.edit',['student'=>$student->id])}}" class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{route('students.destroy',['student'=>$student->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <nav>
                <ul class="pagination pagination-rounded mb-0">
                    {{ $students->links() }}
                </ul>
            </nav>
        </div>
    </div>

@endsection('content')

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/datatables.min.js"></script>
@endpush
