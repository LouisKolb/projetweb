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

{{-- Edit event --}}

<section class="container">
    <div class="row center-align">

        <h4 class="center-align">Modifier un article</h4>

        <div class="row">
            <div class="col s1">
            </div>
            <form class="col s10" method="POST" action="/product/{{$product->id}}" id="product_form" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put"> @csrf
                <div class="row">


                    <div class="input-field col s12 m12">
                        <input id="name" type="text" class="validate" name="name" data-length="50" value="{{$product->name}}">
                        <label class="active" for="name">Nom du produit</label>
                    </div>


                    <div class="input-field col s12 m12">
                        <input value="{{$product->description}}" id="description" type="text" class="validate" name="description">
                        <label for="description">Description du produit</label>
                    </div>


                    <div class="input-field col s12 m12">
                        <input value="{{$product->price}}" id="price" type="number" class="validate" name="price">
                        <label for="price">Prix du produit</label>
                    </div>

                  </div>

                  <div class="input-field col s12">
                      <p>
                        <label>
                          <input class="with-gap" name="montrer" type="radio" value="on" checked  />
                          <span>Montrer</span>
                        </label>
                      </p>

                      <p>
                        <label>
                          <input class="with-gap" name="montrer" type="radio" value="off"  />
                          <span>Cacher</span>
                        </label>
                      </p>



                  </div>

                  <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Modifier le produit</button>
            </form>







            @if (count($errors) > 0)
            <div class="red darken-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            </div>

        </div>

        <!-- <div class="col m2">

            </div> -->

    </div>
</section>
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/info.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


<script>
    $(document).ready(function(){
    $('select').formSelect();
  });




    $(document).ready(function () {
    $('.carousel').carousel({
        shift: 500,
        numVisible: 3
    });

    // function for next slide
    $('.next').click(function () {
        $('.carousel').carousel('next');
    });

    // function for prev slide
    $('.prev').click(function () {
        $('.carousel').carousel('prev');
    });
});

</script>
@endsection
