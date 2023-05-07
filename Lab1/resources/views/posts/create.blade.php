@extends('layouts.app')

@section('content')
<form method="" action="">
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="creator" class="form-control">
            <option value="Ebram">Ebram</option>
            <option value="Mario">Mario</option>
            <option value="Ismail">Ismail</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection