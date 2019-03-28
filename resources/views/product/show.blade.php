she@extends('layout.master') 
@section('content')

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

<section>
    <div class="row">
        <div class="col s12">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="row center-align">
                            <div class="col s12 m12 l12 left">
                                <h5>{{$product->name}}</h5>
                            </div>
                        </div>
                        <hr class="divider">
                        <!-- Product Description -->
                        <div class="col m12">
                            <p>{{$product->description}}</p>
                        </div>
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

                    {{-- Product picture --}}
                    <div class="col s12 m12 l6 ">
                            <img class="img-modal" src="/storage/{{$product->picture()->link}}" alt="{{$product->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
    });

</script>
@endsection