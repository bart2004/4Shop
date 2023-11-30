@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5"> 

    <form action="{{ route('admin.category.store') }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">
        
        <h4>Nieuw product</h4>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Opslaan</button>

        {{ csrf_field() }}
    </form>
</div>   
	
@endsection
