
@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center my-4">
	<h4>Categorieën</h4>
		<div>
			<a href="{{ route('admin.categories.create') }}">Nieuwe categorie toevoegen</a>
		</div>
</div>
<div class="d-flex justify-content-between align-items-center my-4">
	
	<div class="d-flex align-items-center flex-column my-5"> 

		<form action="{{ route('admin.categories.update', $category) }}" method="POST" style="min-width: 320px;">
			
			<h4>Categorie aanpassen</h4>

			<div class="form-group">
				<label for="name">Naam</label>
				<input type="text" id="category" name="category" class="form-control" value="{{ old('name', $category->name) }}" required>			
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

	<!-- displays every product in the category -->
	<div class="my-5">
		<h4>Products in {{ $category->name }}</h4>
		<ul>
			@foreach($category->products as $product)
			<li>{{ $product->title }}</li>
			@endforeach
		</ul>
	</div>
</div>


@endsection
