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

	<form method="POST" action="/product" id="product_form">
		@csrf
		<div class="input-field">
			<input id="name_product" type="text" data-length="25">
			<label for="name_product">Nom du produit</label>
		</div>
		<div class="input-field">
			<textarea id="description_product" class="materialize-textarea" data-length="250"></textarea>
			<label for="description_product">Description du produit</label>
		</div>
		<div class="input-field ">
			<input id="picture_product" type="number" class="validate" name="picture">
			<label for="picture_product">Prix du produit</label>
		</div>
		<div class="input-field">
			<select multiple>
				  <option value="" disabled >Catégorie :</option>
				  <option value="1">Vêtements</option>
				  <option value="2">Mug et Tasse</option>
				  <option value="3">Diplôme</option>
				  <option value="4">Chaussette</option>

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

	<div id="test-slider"></div>



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