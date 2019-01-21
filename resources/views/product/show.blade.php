@extends('layout.master') 
@section('content')

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

<section>
    <div class="row">
        <div class="col s12">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="row center-align">
                            <div class="col s12 m12 l12 left">
                                <h5>Nom prodruct</h5>
                            </div>
                        </div>
                        <hr class="divider">
                        <!-- Product Description -->
                        <div class="col m12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing
                            nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper
                            congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non
                            fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat
                            in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum
                            bibendum augue.
                        </div>
                        <div class="dropdown-extend col m12 l8">
                            <div class="input-field">
                                <select>
                                        <option value="" disabled selected>Nombre d'article</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                        <option value="3">6</option>
                                        <option value="3">7</option>
                                        <option value="3">8</option>
                                        <option value="3">9</option>
                                        <option value="3">10</option>
                                        </select>
                            </div>
                        </div>
                        <div class="col m12 l4 right-align">
                            <a class="waves-effect waves-dark"><i class="fas fa-align-right right"></i>Ajouter au panier</a>
                        </div>
                    </div>
                    <!-- Event's pic in a carousel slider for beautyness -->
                    <div class="col m6 s12">
                        <img class="store-pic" src="/image/info.jpg">
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