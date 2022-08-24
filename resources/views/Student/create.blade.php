<h3>Add a new student</h3>
<form action="{{ route('students.store') }}" method="post">
    @csrf
    Name:
    <input type="text" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <span style="color: red">
         {{ $errors->first('name')}}
     </span>
    @endif
    <br>

    Date of birth:
    <input type="date" name="dob" value="{{ old('dob') }}">
    @if ($errors->has('dob'))
        <span style="color: red">
         {{ $errors->first('dob')}}
     </span>
    @endif
    <br>

    Gender:
    <input type="radio" name="gender" value="1"
        @if( old('gender')=== '1' )
               checked
        @endif
    >Male
    <input type="radio" name="gender" value="0"
           @if( old('gender')=== '0' )
               checked
            @endif
    >Female
    @if ($errors->has('gender'))
        <span style="color: red">
         {{ $errors->first('gender')}}
     </span>
    @endif
    <br>

    <button>Create</button>
</form>
