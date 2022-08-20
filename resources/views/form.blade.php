<form action="/input" method="post">
    @csrf
    Type something:
    <input type="text" value="" name="name">
    <button type="submit">Submit</button>
</form>
