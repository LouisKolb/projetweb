@extends('layout.master')
@section('content')
<script src="/js/shuffle.js"></script>
@php
$connected = false;
if(session()->has('user'))
{
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp

{{-- Parallax header --}}
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
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


{{-- Display product --}}

<section>

    <div class="center-align">
        <h3>Tous nos produits</h3>
    </div>

    {{-- Product filer --}}
    <div class="row">
            <div class="col s5 offset-s1 l3 offset-l1">
                <div class="filters-group">
                    <label for="filters-search-input" class="filter-label" >Rechercher un article</label>
                    <input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" list="titles" />
                    <datalist id="titles">
                        @foreach ($products as $product)   
                        <option value="{{$product->name}}">
                        @endforeach    
                            
                    </datalist>



                </div>
            </div>
        </div>

        <div class="row filters-group-wrap valign-wrapper">
                <div class="col l5 offset-l1 filters-group">
                    <p class="filter-label">Filtrer par :</p>
                    <div class="btn-group filter-options">
                        @foreach ($categories as $category)
                            <button class="btn waves-effect margin-top-button" data-group="{{$category->name}}">{{$category->name}}</button>
                        @endforeach
                    </div>
                </div>

                <div class="col l5 filters-group">
                    <p class="filter-label">Trier par : </p>
                    <div class="btn-group sort-options">
                        <label class="btn waves-effect shuffleactive margin-top-button">
                        <input class="padding" type="radio" name="sort-value" value="dom" checked />Défaut</label>
                        <label class="btn waves-effect margin-top-button">
                        <input type="radio" name="sort-value" value="title" />Nom</label>
                        <label class="btn waves-effect margin-top-button">
                        <input type="radio" name="sort-value" value="date-created" />Date</label>
                        <label class="btn waves-effect margin-top-button">
                        <input type="radio" name="sort-value" value="price" />Prix</label>
                    </div>
                </div>
            </div>

    <div id="azerty" class="row">
        <div id="grid" class="col s10 offset-s1 my-shuffle-container">
            @foreach ($products as $product) 
            
            {{-- Display product, when user is Admin or product not hide --}}

            @if($product->hide == 0 ||  ($connected && $user->hasRole('Admin')))
            @php
                $price = $product->cheatPrice();
            @endphp
            <div class="col s12 m6 l4 picture-item" data-groups="[&quot;{{$product->categoryName()}}&quot;]" data-date-created="{{$product->created_at}}" data-price="{{$price}}" data-title="{{$product->name}}">
                <div class="card hoverable picture-item__inner">
                    <div class="card-image aspect__inner">
                    <img class="img-product aspect__inner" src="/storage/{{$product->picture->link}}" alt="{{$product->name}}">
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
                            {{-- Display button when user is admin --}}
                            @if($connected)
                            @if($user->hasRole('Admin'))
                            <div class="row">
                            <a class="waves-effect waves-dark btn btn-event" href="/product/{{$product->id}}/edit"> ✏️</a>
                            </div>
                            @endif
                            @endif
                            @if($product->hide == 1)
                            <div class="row">
                            <p style="color : red">Produit indisponible</p>
                            </div>
                            @endif
                            @if($connected)
                            @if($product->hide == 0 && $user->hasRole('Admin'))
                            <div class="row">
                            <p style="color : green" >Produit disponible</p>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            {{-- Product modal on click --}}

            <div id="modal{{$product->id}}" class="modal">

                <div class="modal-content">
                    <div class="row">
                        <div class="col s12 m12 l6 ">
                            <img class="img-modal" src="/storage/{{$product->picture->link}}" alt="{{$product->name}}">
                        </div>

                        <div class="col s12 m12 l6">
                            <h4>{{$product->name}}</h4>
                            <p>{{$product->description}}</p>

                            {{-- The shopping cart is assigned to the user --}}
                            @php
                                if(session()->has('user')){
                                    $user = App\user::find(session()->get('user')[0]);
                                    $cart = $user->cart();
                                }
                            @endphp

                            {{-- If the user is logged in, his shopping cart is displayed. --}}

                            @if (session()->has('user'))

                            <form class="col s10" method="post" action="/order/{{$cart->id}}">
                            @endif

                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="row">
                                    <input type="hidden" class="validate" name="product_id" value="{{$product->id}}">

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
            {{-- End product display --}} 
            @endforeach
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

<script src="/js/mainshuffle.js"></script>
 

@endsection
