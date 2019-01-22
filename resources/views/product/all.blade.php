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


<div class="center-align">
    <h3>Tout nos produits </h3>
</div>

<div class="container">
    <div class="row">
        <div class="col s6 m6 l6">
            <div class="chips chips-placeholder"></div>
        </div>

        <div class="input-field col s6 m6 l6">
            <select>
                <option value="" disabled selected>Trier par : </option>
                <option value="1">Prix croissant</option>
                <option value="2">Prix décroissant</option>
                <option value="3">Catégories</option>
            </select>
        </div>



    </div>
</div>


<div class="container product">
    <div class="row">
        @foreach ($products as $product)
        <div class="col s12 m6 l4">
            <div class="card hoverable ">
                <div class="card-image ">
                    <img class="img-product" src="/storage/{{$product->picture->link }}">
                        <a class="btn-floating halfway-fab waves-effect orange accent-3 modal-trigger open" data-id="Album" href="#modal{{$product->id}}"><i
                        class="material-icons">add</i></a>
                </div>
                <div class="card-content card-height">
                    <span class="card-title black-text">{{ $product->name }}</span>
                    <div class="row">
                        <div class="col s10 m10 l9">
                            <p>{{ $product->description }}
                            </p>
                        </div>
                        <div class="col s2 m2 l3">
                            <h6>{{ $product->price }} €</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal{{$product->id}}" class="modal">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12 l6 ">
                        <img class="img-modal" src="/storage/{{ $product->picture->link }}">
                    </div>

                    <div class="col s12 m12 l6">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>



                        <form class="col s10" method="get" action="product/order" id="cart_form">
                            @csrf
                            <div class="row">
                                    <input id="product_id" type="hidden" class="validate" name="product_id" value="{{ $product->id }}">
                                    <input id="quantity" type="hidden" class="validate" name="quantity">
                                    <select name="quantity">
                                      <option value="" disabled selected>Nombre d'article</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                    </select>
                                    <input id="user_id" type="hidden" class="validate" name="user_id" value="{{App\user::find(session()->get('user')[0])->id}}">
                                    <div class="input-field s6 m6 l6 textyellow">
                                    <button class="btn waves-effect waves-light bg-blue" type="submit">Ajouter au panier</button>
                                    </div>

                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-effect#5a86dd btn-flat">Fermer</a>
            </div>

        </div>

        @endforeach
    </div>

</div>
<div class="container center-align" id="pagination">
    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons color-blue">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons color-blue">chevron_right</i></a></li>
    </ul>
</div>

</section>

<div id="modalEditClient" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
            <input type="text" name="nom">
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>



@endsection

@section('scripts')
<script>
    $('.chips-placeholder').chips({
    placeholder: 'Rechercher',
});


</script>
@endsection
