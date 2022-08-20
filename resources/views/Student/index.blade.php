<h2>Students Table</h2>

<a href="{{ route('students.create') }}">
    Add a new student
</a>
<caption>
    <form action="">
        Search: <input type="search" name="search" value=" {{$search}} ">
    </form>
</caption>
<p>All students:</p>

<table class="w3-table" border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>DOB</th>
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
                <a href="{{route('students.edit',['student'=>$student->id])}}">
                    Edit
                </a>
            </td>
            <td>
                <form action="{{route('students.destroy',['student'=>$student->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
