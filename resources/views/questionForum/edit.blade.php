@extends('layout.master') 
@section('content')

<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg" alt="background-parallax">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>BDE Exia Strasbourg</h2>
            </div>
        </div>
    </div>
</div>

{{-- Edit an event --}}

<section class="container">
    <div class="row center-align">

        <h4 class="center-align">Modifier un sujet</h4>

        <div class="row">
            <div class="col s1">
            </div>
            {{-- Form to edit event with display old information --}}
            <form class="col s10" method="POST" action="/sujet/{{$question->id}}" id="question_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put"> 
                <div class="row">

                    <div class="input-field col s12 m12">
                        <input id="name" type="text" class="validate" name="name" data-length="50" value="{{$question->name}}">
                        <label class="active" for="name">Nom du sujet</label>
                    </div>

                    <div class="input-field col s12 m12">
                        <input value="{{$question->description}}" id="description" type="text" class="validate" name="description">
                        <label for="description">Description du sujet</label>
                    </div>

                    <div class="input-field col s12 m12">
                    <select name="CategoryForum" value="{{old('$category_forum')}}">
                        @foreach($CategoryForum as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                    <p>
      <label>
        <input type="checkbox" class="filled-in" name="public" value="{{$question->prive}}" />
          <span>Article privé (accéssible seulement aux membres)</span>
        </label>
      </p>
                </div>
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Modifier le sujet</button>
            </form>
            @if($user->hasRole('admin'))
            <form  action="/{{$question->id}}/delete" method="post">
                    @csrf
                    <button class="btn waves-effect waves-light margin-top-button suppsuj" id="submit" type="submit" name="submit">Supprimer le sujet</button>
            </form>
            @endif


        </div>
    </div>

    {{-- If there are any errors, they are posted here --}} 
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
@endsection