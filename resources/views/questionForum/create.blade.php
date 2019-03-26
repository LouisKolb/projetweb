@extends('layout.master')
@section('content')
@php
$connected = false; if(session()->has('user')){
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp

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

<!-- Top actualité -->
<section class="container">
    <h4 class="center-align">Rédiger un Sujet</h4>
    <form method="POST" action="/questioncreate" id="event_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field">
                <input id="name" type="text" class="validate" name="name" data-length="50" value="{{old('name')}}"">
                <label for="name">Nom du sujet</label>
            </div>
            <div class="input-field">
                <textarea id="description" class="validate materialize-textarea" name="description" data-length="500" value="{{old('description')}}"></textarea>
                <label for="description">Description du sujet</label>
            </div>
            <div>
              <select name="category_forum" value="{{old('category_forum')}}">
                  <option value="0" selected>Catégorie</option>
                  @foreach($category_forum as $category)
                  <option value="1" >{{$category->name}}</option>
                  @endforeach
                 
              </select>
            

    </form>

    <div class="input-field center-align">
        <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Proposer son idée</button>
    </div>


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

    $(document).ready(function(){
    $('select').formSelect();
  });

    $(document).ready(function() {
    $('input#name, textarea#description').characterCounter();
  });

</script>
@endsection
