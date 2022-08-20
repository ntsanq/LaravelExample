<h3>Add a new student</h3>
<form action="{{ route('students.store') }}" method="post">
    @csrf
    Name:
    <input type="text" name="name"><br>
    Date of birth:
    <input type="date" name="dob"><br>
    Gender:
    <input type="radio" name="gender" value="1">Male
    <input type="radio" name="gender" value="0">Female
    <br>
    <button>Create</button>
</form>
