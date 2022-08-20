<h3>Edit the student</h3>
<form action="{{ route('students.update', ['student' => $student]) }}" method="post">
    @csrf
    @method('PUT')
    Name:
    <input type="text" name="name" value="{{ $student->name }}"><br>
    Date of birth:
    <input type="date" name="dob" value="{{ $student->dob }}"><br>
    Gender:
    @if($student->gender == 'Male')
        <input type="radio" name="gender" value="1" checked>Male
        <input type="radio" name="gender" value="0">Female
    @else
        <input type="radio" name="gender" value="1">Male
        <input type="radio" name="gender" value="0" checked>Female
    @endif
    <br>
    <button>Confirm edit</button>
</form>
