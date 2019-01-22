@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Mentions légales</h2>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="row">
        <div class="col s10 offset-s1">
            <h4>Éditeur : Association CESI</h4>
        </div>
        <div class="col s12">
            <div class="mentions-container">
                <p>SIREN : 775 722 572<br> Siège social : 30 rue Cambronne<br> 75015 Paris<br> Tél : 01 44 19 23 45<br> Fax
                    : 01 42 50 25 06<br> e-mail : contact@cesi.fr</p>
            </div>
        </div>
        < <div class="col s10 offset-s1">
            <h4>Développement</h4>
    </div>
    <div class="col s12">
        <div class="mentions-container">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>e-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Michel</td>
                        <td>Arthur</td>
                        <td>michel.arthur@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Doignon</td>
                        <td>Guillaume</td>
                        <td>guillaume.doignon@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Grosshenny</td>
                        <td>Sébastien</td>
                        <td>sebastien.grosshenny@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Grigoletto</td>
                        <td>Simon</td>
                        <td>simon.grigoletto@viacesi.fr</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col s10 offset-s1">
            <h4>Hébergement</h4>
        </div>
        <div class="col s12">
            <div class="mentions-container">
                <p>CESI École d’Ingénieurs / Parcours Informatique<br> Campus de STRASBOURG<br> 2 Allée des Foulons<br> Parc
                    des Tanneries 67 380 Lingolsheim</p>
            </div>
        </div>
        <div class="col s10 offset-s1">
            <h4>Utilisations de cookies</h4>
        </div>
        <div class="col s12">
            <div class="mentions-container">
                <p>Nous utilisons les cookies afin de fournir les services et fonctionnalités proposés sur notre site et afin
                    d’améliorer l’expérience de nos utilisateurs. Les cookies sont des données qui sont stockés sur votre
                    ordinateur ou sur tout autre appareil accédant au site .</p>
            </div>
        </div>
        <div class="col s10 offset-s1">
            <h4>Déclaration d'activité</h4>
        </div>
        <div class="col s12">
            <div class="mentions-container">
                    <p>CESI SAS – Société par actions simplifiée au capital de 1.1M€<br>
                    342 707 502<br>
                    30 rue Cambronne – F-75015 Paris<br>
                    tél. : +33(0) 1 44 19 23 45 – fax : +33(0) 1 42 50 25 06<br>
                    Déclaration d’activité enregistrée sous le numéro 11 75 39666 75 auprès du Préfet de la région Ile-de-France.<br>
                    Cet enregistrement ne vaut pas agrément de l’État.<br>
                    <br>
                    CESI – association loi de 1901<br>
                    775 722 572<br>
                    30 rue Cambronne – F-75015 Paris<br>
                    tél. : +33(0) 1 44 13 23 45 – fax : +33(0) 1 42 50 25 06<br>
                    Déclaration d’activité enregistrée sous le numéro 11 75 47883 75 auprès du Préfet de la région Ile-de-France.<br>
                    Cet enregistrement ne vaut pas agrément de l’État.</p>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('scripts')
@endsection