
@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center flex-column my-5"> 

	<form action="{{ route('admin.categories.update', $category) }}" method="POST" style="min-width: 320px;">
		
		<h4>Categorie aanpassen</h4>

		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}">
		</div>

		<div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active1" value="1" @if(old('active', $category->active)) checked @endif>
				<label class="form-check-label" for="active1">Zichtbaar</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active0" value="0" @if(!old('active', $category->active)) checked @endif>
				<label class="form-check-label" for="active0">Onzichtbaar</label>
			</div>
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
	</form>
	<form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
		<button type="submit" class="form-control btn btn-outline-danger">Verwijderen</button>
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
</div>

//code below isnt working properly yet
// it schould display every product in the category by category id
	
// Add the code below to display the list of products with the selected category
<div class="my-5">
	<h4>Products in {{ $category->name }}</h4>
	<ul>
		@foreach(\App\Models\Product::where('category_id', $category->id)->get() as $product)
			<li>{{ $product->name }}</li>
		@endforeach
	</ul>
</div>
	


@endsection
