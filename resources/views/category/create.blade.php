@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h5>Lorem ipsum</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container center">
    <form action="/category" method="post">
        <div class="row">
            @csrf
            <div class="input-field col s12">
                <input id="cat" type="text" class="validate" name="category" value="{{old('category')}}">
                <label for="cat">Nouvelle catégorie</label>
            </div>
            <button type="submit" class="btn">Ajouter</button>
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
<section id="section">
    <div class="parallax-container center valign-wrapper blueborders">
        <div class="parallax"><img src="/image/info.jpg">
        </div>

    </div>
</section>
@endsection