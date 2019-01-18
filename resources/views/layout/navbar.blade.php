<header>
    <nav id="top-nav">
        <div class="nav-wrapper top">

            <a href="#!" class=""><img id="logo" src="./image/Logo.png" alt=""></a>
            <ul class="right hide-on-med-and-down	">
                <li class="navitem"><a href="sass.html">Accueil</a></li>
                <li class="navitem"><a class="active" href="badges.html">Boutique</a></li>
                <li class="navitem"><a class='dropdown-trigger' href='#' data-target='dropdown1'>Évènement</a></li>
                <li class="navitem"><a href="badges.html">Connexion</a></li>
                <li class="navitem sidenav-trigger " data-target="cart-out"><a href="sass.html"><i class="material-icons">shopping_cart</i></a></li>
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

<section>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12 l6 ">
                    <img class="img-modal materialboxed" src="./image/info.jpg">
                </div>

                <div class="col s12 m12 l6">
                    <h4>Titre article</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae repellendus sunt blanditiis, eaque
                        impedit laboriosam ab nihil obcaecati provident animi voluptatum ratione ducimus saepe asperiores
                        quos inventore ullam. Quis, doloribus?</p>
                    <div class="input-field s6 m6 l6 textyellow">
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
                        <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">Ajouter au
                            panier
                            <i class="material-icons right"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-effect#5a86dd btn-flat">Fermer</a>
        </div>

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
                                <img class="img-product" src="./image/pull.png">
                                <a class="btn-floating halfway-fab waves-effect orange accent-3 modal-trigger" href="#modal1"><i
                                        class="material-icons">add</i></a>
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
                        <a class="color-blue" href="#">
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

    <ul id="slide-out" class="sidenav left">
        <li class="navitem"><a href="sass.html">Accueil</a></li>
        <li class="navitem"><a class="active" href="badges.html">Boutique</a></li>
        <li class="navitem"><a class="active" href="badges.html">Évènement</a></li>
        <li class="navitem"><a class="active" href="badges.html">Boîte à idées</a></li>
        <li class="navitem"><a href="badges.html">Connexion</a></li>
        <li class="navitem sidenav-trigger sidenav-close" data-target="cart-out"><a href="sass.html"><i class="material-icons white-text">shopping_cart</i></a></li>
    </ul>

    <ul id='dropdown1' class='dropdown-content drop'>
        <li><a href="#!">Nos évènements</a></li>
        <li><a href="#!">Boîte à idées</a></li>
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