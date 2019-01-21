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
    <h4>Votre panier</h4>
    <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                <h6> Votre article </h6>
            </div>

            <div class="collapsible-body">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>Titre article</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae repellendus sunt blanditiis, eaque
                            impedit laboriosam ab nihil obcaecati provident animi voluptatum ratione ducimus saepe asperiores
                            quos inventore ullam. Quis, doloribus?</p>
                        <div class="col s6 m6 l6">

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

                        <div class="col s6 m6 l6">

                            <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                                    Supprimer
                                </button>
                        </div>

                    </div>
                    <div class="col s6 m6 l6">
                        <img class="img-product" src="/image/pull.png">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <h6> Votre article </h6>
            </div>

            <div class="collapsible-body">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>Titre article</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae repellendus sunt blanditiis, eaque
                            impedit laboriosam ab nihil obcaecati provident animi voluptatum ratione ducimus saepe asperiores
                            quos inventore ullam. Quis, doloribus?</p>
                        <div class="col s6 m6 l6">

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

                        <div class="col s6 m6 l6">

                            <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                                        Supprimer
                                    </button>
                        </div>

                    </div>
                    <div class="col s6 m6 l6">
                        <img class="img-product" src="/image/pull.png">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <h6> Votre article </h6>
            </div>

            <div class="collapsible-body">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>Titre article</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae repellendus sunt blanditiis, eaque
                            impedit laboriosam ab nihil obcaecati provident animi voluptatum ratione ducimus saepe asperiores
                            quos inventore ullam. Quis, doloribus?</p>
                        <div class="col s6 m6 l6">

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

                        <div class="col s6 m6 l6">

                            <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                                Supprimer
                            </button>
                        </div>

                    </div>
                    <div class="col s6 m6 l6">
                        <img class="img-product" src="/image/pull.png">
                    </div>
                </div>
            </div>
        </li>

    </ul>

    <div class="row">
        <div class="col s6 m6 l6">
            <h6>Total article : 12</h6>
        </div>
        <div class="col s6 m6 l6">
            <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                Passer la commande   
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col s6 m6 l6">
            <h6>Total : 150 €</h6>
        </div>
        <div class="col s6 m6 l6">
            <button class="btn waves-effect waves-light bg-blue" type="submit" name="action">
                Retour
            </button>

        </div>
    </div>
</section>
@endsection