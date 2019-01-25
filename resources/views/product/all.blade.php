@extends('layout.master')
@section('content')
<script src="/js/shuffle.js"></script>
</head>
@php
$connected = false;
if(session()->has('user'))
{
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp

<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Boutique</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="center-align">
    <h3>Tous nos produits</h3>
</div>

<div class="row">
        <div class="col s5 offset-s1 l3 offset-l1">
            <div class="filters-group">
                <label for="filters-search-input" class="filter-label">Rechercher un article</label>
                <input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" />
            </div>
        </div>
    </div>

    <div class="row filters-group-wrap valign-wrapper">
            <div class="col l5 offset-l1 filters-group">
                <p class="filter-label">Filtrer par :</p>
                <div class="btn-group filter-options">
                    @foreach ($categories as $category)
                        <button class="btn waves-effect" data-group="{{$category->name}}">{{$category->name}}</button>
                    @endforeach
                </div>
            </div>
    
            <div class="col l5 filters-group">
                <p class="filter-label">Trier par : </p>
                <div class="btn-group sort-options">
                    <label class="btn waves-effect shuffleactive">
                    <input type="radio" name="sort-value" value="dom" checked />Défaut</label>
                    <label class="btn waves-effect">
                    <input type="radio" name="sort-value" value="title" />Nom</label>
                    <label class="btn waves-effect">
                    <input type="radio" name="sort-value" value="date-created" />Date</label>
                    <label class="btn waves-effect">
                    <input type="radio" name="sort-value" value="price" />Prix</label>
                </div>
            </div>
        </div>
    
<div id="azerty" class="row">
    <div id="grid" class="col s10 offset-s1 my-shuffle-container">
        @foreach ($products as $product) {{-- Pour tous les produits --}}

        @if($connected == true)
        @if($user->hasRole('Admin') || $product->hide == 0)
        <div class="col s12 m6 l4 picture-item" data-groups="[&quot;{{$product->categoryName()}}&quot;]" data-date-created="2017-04-30" data-price="{{$product->price}}" data-title="{{$product->name}}">
            <div class="card hoverable picture-item__inner">
                <div class="card-image aspect__inner">
                    <img class="img-product aspect__inner" src="/storage/{{$product->picture->link}}">
                    <a class="btn-floating halfway-fab waves-effect orange accent-3 modal-trigger open" data-id="Album" href="#modal{{$product->id}}"><i
                        class="material-icons">add</i></a>
                </div>
                <div class="card-content card-height picture-item__details">
                    <div class="picture-item__title">
                        <span class="card-title black-text">{{$product->name}}</span>
                        <div class="row">
                            <div class="col s10 m10 l9">
                                <p>{{$product->description}}
                                </p>
                            </div>
                            <div class="col s2 m2 l3">
                                <h6>{{$product->price}} €</h6>
                            </div>
                        </div>
                        @if($user->hasRole('Admin'))
                        <div class="row">
                          <a class="waves-effect waves-dark btn btn-event" href="/product/{{$product->id}}/edit"> ✏️</a>
                        </div>
                        @endif
                        @if($product->hide == 1)
                        <div class="row">
                          <p style="color : red">Produit indisponible</p>
                        </div>
                        @endif
                        @if($product->hide == 0 && $user->hasRole('Admin'))
                        <div class="row">
                          <p style="color : green" >Produit disponible</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL --}}
        <div id="modal{{$product->id}}" class="modal">

            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12 l6 ">
                        <img class="img-modal" src="/storage/{{$product->picture->link}}">
                    </div>

                    <div class="col s12 m12 l6">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->description}}</p>

                        @php
                            if(session()->has('user')){
                                $user = App\user::find(session()->get('user')[0]);
                                $cart = $user->cart();
                            }
                        @endphp


                        @if (session()->has('user'))

                        <form class="col s10" method="post" action="/order/{{$cart->id}}" id="cart_form">
                        @endif

                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <input id="product_id" type="hidden" class="validate" name="product_id" value="{{$product->id}}">

                                <select name="quantity">
                                        @for ($i = 1; $i < 10; $i++)

                                            <option value="{{$i}}">{{$i}}</option>

                                        @endfor

                                    </select>
                                <div class="input-field s6 m6 l6 textyellow">
                                    <button class="btn waves-effect waves-light bg-blue" type="submit">Ajouter au panier</button>
                                </div>

                            </div>


                            @if (session()->has('user'))
                        </form>
                        @endif


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-effect#5a86dd btn-flat">Fermer</a>
            </div>

            {{-- end modal --}}

        </div>
        @endif
        @endif
        {{-- End pour tout les produits --}} @endforeach
    </div>

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
<script src="/js/mainshuffle.js"></script>
@endsection

@section('scripts')

<script>
    $('.chips-placeholder').chips({
    placeholder: 'Rechercher',
});

</script>
@endsection
