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
    <h4>@if(!session()->has('user')) Voud devez etre connecté pour acceder à @endif Votre panier </h4>
    <ul class="collapsible">

        @if(session()->has('user')) @php $user = App\user::find(session()->get('user')[0]); $cart = $user->cart(); $products = $cart->products;
        
@endphp @foreach ($products as $product)



        <li>
            <div class="collapsible-header">
                <h6> {{$product->name}} </h6>
            </div>

            <div class="collapsible-body">
            <form method="post" action="/order/{{$cart->id}}">
                @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>{{$product->name}} x {{$product->pivot->quantity}}</h5>
                        <p>{{$product->description}}</p>
                        <div class="col s6 m6 l6">

                            <select name=quantity>
                                @for ($i = 1; $i < 10; $i++)
                                
                                @if($product->pivot->quantity == $i)
                                <option value="{{$i}}" selected="selected">{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                                
                                
                                
                                @endfor
                                

                            </select>
                        </div>

                        <div class="col s6 m6 l6">
                            <button class="btn waves-effect waves-light bg-blue" type="submit" name="submit">
                                        Modifier
                            </button>
                            
                        </div>
                        
                    </div>
                    <div class="col s6 m6 l6">
                        <img class="img-product" src="/storage/{{$product->picture->link}}">
                    </div>
                </div>
                
            </form>

            <form action="/order/{{$product->id}}" method="post">
                @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn waves-effect waves-light bg-blue" >
                        Supprimer
                    </button>
            </form>
                
            </div>
        </li>
    
        @endforeach






    </ul>

    <div class="row">
        <div class="col s6 m6 l6">
            <h6>Nombres articles : {{$cart->totalarticles()}}</h6>
        </div>
        <div class="col s6 m6 l6">
            <a href="/order/purchase">
                <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                    Passer la commande (en construction)
                </button>
                
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col s6 m6 l6">
            <h6>Total : {{$cart->price()}} €</h6>
        </div>
        
    </div>

    @endif
</section>
@endsection