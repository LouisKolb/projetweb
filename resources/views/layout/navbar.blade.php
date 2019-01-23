<header>
    <nav id="top-nav">
        <div class="nav-wrapper top">

            <a href="/" class=""><img id="logo" src="/image/Logo.png" alt=""></a>
            <ul class="right hide-on-med-and-down	">
                <li class="navitem"><a href="/">Accueil</a></li>
                <li class="navitem"><a class='dropdown-trigger' href='#' data-target='dropdownStore'>Boutique</a></li>
               
                <li class="navitem"><a class="" href="/product">Boutique</a></li>
                
                <li class="navitem"><a class='dropdown-trigger' href='#' data-target='dropdownEvent'>Évènement</a></li>

                @if(session()->has('user'))
                <li class="navitem"><a class='dropdown-trigger' href='#' data-target='dropdownUser'>{{App\user::find(session()->get('user')[0])->username}}</a></li>
                @else
                <li class="navitem"><a href="/login">Connexion</a></li>
                @endif
                <li class="navitem sidenav-trigger " data-target="cart-out"><a href="/"><i class="material-icons">shopping_cart</i></a></li>
            </ul>
            <ul class="navitem sidenav-trigger right hide-on-large-only" data-target="slide-out">
                <li class="navitem">
                    <a href="#">
                        <i class="material-icons">menu</i>
                    </a>
                </li>
            </ul>

        </div>
    </nav>

</header>

<ul id="slide-out" class="sidenav left">
    <li class="navitem"><a class="active" href="/">Accueil</a></li>
    <li class="navitem"><a href="/product">Boutique</a></li>
    
    <li><a href="/product/create">Ajouter un article à la boutique</a></li>
    
    <li class="navitem"><a href="/event">Évènement</a></li>
    <li class="navitem"><a href="/event/idea">Boîte à idées</a></li>
    <li><a href="/event/create">Proposer un évènement</a></li>

    @if(session()->has('user'))
    <li><a href="/user/{{session()->get('user')[0]}}">Mon Profil : {{App\user::find(session()->get('user')[0])->username}}</a></li>
    <li><a href="/logout">Déconnexion</a></li>
    @else
    <li class="navitem"><a href="/login">Connexion</a></li>
    @endif

    <li class="navitem sidenav-trigger sidenav-close" data-target="cart-out"><a href="sass.html"><i class="material-icons white-text">shopping_cart</i></a></li>
</ul>



<ul id='dropdownEvent' class='dropdown-content drop'>
    <li><a href="/event">Nos évènements</a></li>
    <li><a href="/event/idea">Boîte à idées</a></li>
    <li><a href="/event/create">Proposer un évènement</a></li>

</ul>

<ul id='dropdownStore' class='dropdown-content drop'>
    <li><a href="/product">Visiter la boutique</a></li>
    <li><a href="/product/create">Ajouter un article</a></li>
</ul>



<ul id='dropdownUser' class='dropdown-content drop'>
    <li><a href="/user/{{session()->get('user')[0]}}">Mon Profil</a></li>
    <li><a href="/logout">Déconnexion</a></li>
</ul>


<section>

    </div>
    <ul id="cart-out" class="sidenav right">
        <li class="cart">
            <h4>Vos articles</h4>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header">Titre article</div>

                    <div class="collapsible-body">
                        <div class="card hoverable ">
                            <div class="card-image ">
                                <img class="img-product" src="/image/pull.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title black-text">Card Title</span>
                                <div class="row">
                                    <div class="col s10 m10 l8">
                                        <p>Quantité : 2</p>
                                    </div>
                                    <div class="col s2 m2 l4">
                                        <p>10 €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        <li class="cart">
            <div id="bottom-cart">
                <h6>Total : 150 €</h6>
                <div class="row">
                    <div class="col s10 m10 l10 ">
                        <a class="color-blue" href="/order">
                            <h6>Passer commande</h6>
                        </a>
                    </div>
                    <div class="sidenav-close col s2 m2 l2" id="close-cart">
                        <a href="#"><i class="material-icons color-blue">close</i></a>
                    </div>

                </div>

            </div>
        </li>


    </ul>




</section>







<script>
    $(document).ready(function () {
            $('.modal').modal({ preventScrolling: false, startingTop: 20 });
        });
        $('.dropdown-trigger').dropdown({ constrainWidth: false, coverTrigger: false });

        $(document).ready(function () {
            $('.parallax').parallax();
        });
        $(document).ready(function () {
            $('.sidenav.right').sidenav({ edge: 'right', preventScrolling: false });

        });
        $(document).ready(function () {
            $('.sidenav.left').sidenav({ edge: 'left', preventScrolling: false });
        });

        $(document).ready(function () {
            $('.collapsible').collapsible();
        });

        $(document).ready(function () {
            $('select').formSelect();
        });

</script>