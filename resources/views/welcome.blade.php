@extends('layout.master')
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
        <div class="parallax"><img src="./image/background.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h2>Bienvenue sur le site du BDE</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Top actualité -->
    <section>
        <div class="row center-align">
            <div class="col s12 center-align">
                <h3>Événements récents</h3>
            </div>
            <div class="card-parnel hoverable col l4 m12 s12 offset-l1">
                <h5>Titre événements</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                    tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                    Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec
                    nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper.
                    Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in
                    risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue.</p>
                <hr class="divider">
                <div class="col s2 offset-s8 center-align">
                    <a class="btn-floating disabled right"><i class="far fa-heart"></i></a>
                </div>
                <div class="col s2 center-align">
                    <a class="btn-floating disabled right"><i class="far fa-comment"></i></a>
                </div>
            </div>
            <div class="col m2">

            </div>
            <div class="hoverable col l4 m12 s12">
                <h5>Titre événements</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                    tortor,
                    dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                    Maecenas
                    ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy
                    molestie,
                    enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa,
                    scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat
                    libero
                    pharetra tempor. Cras vestibulum bibendum augue.</p>
                <hr class="divider">
                <div class="col s2 offset-s8 center-align">
                    <a class="btn-floating disabled right"><i class="far fa-heart"></i></a>
                </div>
                <div class="col s2 center-align">
                    <a class="btn-floating disabled right"><i class="far fa-comment"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Top article -->
    <section>
        <div class="parallax-container center valign-wrapper blueborders">
            <div class="parallax"><img src="./image/background.jpg">
            </div>
            <div class="container white-text">
                <div class="row">
                    <div class="col s12">
                        <h3>Article les plus vendus</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col s12">
                <div class="carousel center-align" data-indicators="true">
                    <a href="#one!" class="carousel-item">
                        <img class="resize" src="./image/pull.jpg">
                        <div>
                            <p class="top-article">Nom top article 1</p>
                        </div>
                    </a>
                    <a href="#two!" class="carousel-item">
                        <img class="resize" src="./image/pull.png">
                        <div>
                            <p class="top-article">Nom top article 2</p>
                        </div>
                    </a>
                    <a href="#three!" class="carousel-item">
                        <img class="resize" src="./image/huete.png">
                        <div>
                            <p class="top-article">Nom top article 3</p>
                        </div>
                    </a>
                    <a href="#four!" class="carousel-item">
                        <img class="resize" src="./image/dorito.png">
                        <div>
                            <p class="top-article">Nom top article 4</p>
                        </div>
                    </a>
                    <a href="#five!" class="carousel-item">
                        <img class="resize" src="./image/article.png">
                        <div>
                            <p class="top-article">Nom top article 5</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m3 offset-m2 s6 center-align">
                <div class="btn-flat prev"><i class="material-icons">chevron_left</i></div>
            </div>
            <div class="col m2">

            </div>
            <div class="col m3 s6 center-align">
                <div class="btn-flat next"><i class="material-icons">chevron_right</i></div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
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