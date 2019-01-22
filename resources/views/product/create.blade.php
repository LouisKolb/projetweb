@extends('layout.master') 
@section('content')

<div class="parallax-container center valign-wrapper borderdown">
	<div class="parallax"><img src="/image/background.jpg">
	</div>
	<div class="container white-text">
		<div class="row">
			<div class="col s12">
				<h2>BDE Exia Strasbourg</h2>
			</div>
		</div>
	</div>
</div>


<section class="container">

	<h4 class="center-align">Ajouter un produit</h4>

	<form method="POST" action="/product" id="product_form" enctype="multipart/form-data">
		@csrf
		<div class="input-field">
			<input id="name_product" type="text" data-length="25" name="name">
			<label for="name_product">Nom du produit</label>
		</div>
		<div class="input-field">
			<textarea id="description_product" class="materialize-textarea" data-length="250" name="description"></textarea>
			<label for="description_product">Description du produit</label>
		</div>
		<div class="input-field ">
			<input id="price" type="number" class="validate" name="price">
			<label for="price">Prix du produit</label>
		</div>
		<div class="input-field">
			<select name="category">
					<option value="" disabled selected>Choisir la catégorie</option>
				  @foreach ($categorys as $cat)
					<option value="{{$cat->id}}">{{$cat->name}}</option>
					  
				  @endforeach

				</select>
			<label>Catégorie</label>
		</div>

		<label>Image de présentation</label>
		<div class="file-field input-field">
			<div class="btn">
				<span>Rechercher</span>
				<input type="file" name="image" />
			</div>

			<div class="file-path-wrapper">
				<input class="file-path validate" type="text" name="imagetext" placeholder="Importer un fichier" />
			</div>
		</div>



		<div class="input-field center-align">
			<button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Créer l'article</button>
		</div>

	</form>

	@if (count($errors) > 0)
	<div class="card-panel red lighten-5 login_waper">
		<ul>
			@foreach ($errors->all() as $error)
			<h6>
				<li class="red-text">{{ $error }}</li>
			</h6>
			@endforeach
		</ul>
	</div>
	@endif


</section>
@endsection
 
@section('scripts')


<script>
	$(document).ready(function() {
    $('input#name_product, textarea#description_product').characterCounter();
  });
  $(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection