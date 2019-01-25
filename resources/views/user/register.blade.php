@extends('layout.master') 
@section('content')
<section id="section">
	<div class="parallax-container center valign-wrapper border-down">
		<div class="parallax"><img src="/image/info.jpg">
		</div>
		<div class="container white-text">
			<div class="row">
				<div class="col s12">
					<h3>S'enregistrer</h3>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="container">
	<h3 class="center-align">Vous devez être membre du cesi pour vous enregistrer</h3>
	<div class="row">
		<form class="col s12" method="POST" action="/user" id="register_form">
			@csrf
			<div class="row">
				<div class="input-field col s12 m6">
					<input id="first_name" type="text" class="validate" name="first_name">
					<label for="first_name">Prénom</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="last_name" type="text" class="validate" name="last_name">
					<label for="last_name">Nom</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="username" type="text" class="validate" minlength=5 name="username">
					<label for="username">Nom d'utilisateur</label>
				</div>




				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password" type="password" class="validate" name="password">
					<label for="password">Mot de passe</label>
				</div>


				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password_confirm" type="password" class="validate" name="password_confirm">
					<label for="password_confirm">Confirmation</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email" type="email" class="validate" name="email">
					<label for="email">Email</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email_confirm" type="email" class="validate" name="email_confirm">
					<label for="email_confirmation">Confirmation</label>
				</div>


				<div class="input-field col s12 m6">
					<select name="centre">
              <option value="" disabled selected>Choisis ton centre</option>
              
					@foreach ($centres as $centre)
						
						<option value="{{$centre->id}}">{{$centre->name}}</option>
					@endforeach
            	</select>
					<label>Centre</label>
				</div>
						<label>
						<input type="checkbox" name="accept" value="true"/>
						<span><a href="/gcs">En vous inscrivant vous acceptez les CGU</a> </span>
					  </label>

				<div class="input-field col s12">
					<button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">S'inscrire</button>
				</div>

			</div>
		</form>
	</div>

</div>
@endsection
 
@section('scripts')

<script>
	$(document).ready(function(){
    $('select').formSelect();
  });
      



  $("#register_form").submit(function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.
  var form = $("#register_form");
  
  $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);
                window.location.replace("/login"); 

            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data)
                try{
                   
                    errors=data.responseJSON
                    errors = errors.errors;
                    for(i=0;i<errors.length;i++){
                      M.toast({html: errors[i] , classes: 'red darken-2' ,displayLength:5000})
                      console.log(i);
                      if(i==errors.length-1)
                      return
                    }
                }catch(e){
                    M.toast({html: "Une erreur s'est produite merci de votre compréhension" , classes: 'red darken-2' ,displayLength:5000})
                }
                console.log(errors);
            },
        });


});

</script>
@endsection