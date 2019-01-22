@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="./image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Mentions légales</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s10 offset-s1">
        <h4>Éditeur : Nams</h4>
    </div>
    <div class="col s12">
        <div class="mentions-container">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Domicile</th>
                        <th>e-mail</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Michel</td>
                        <td>Arthur</td>
                        <td>1 Rue de la corniche</td>
                        <td>michel.arthur@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Doignon</td>
                        <td>Guillaume</td>
                        <td>23 Rue de la Boustifaille</td>
                        <td>guillaume.doignon@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Grosshenny</td>
                        <td>Sébastien</td>
                        <td>7 Avenue des oui</td>
                        <td>sebastien.grosshenny@viacesi.fr</td>
                    </tr>
                    <tr>
                        <td>Grigoletto</td>
                        <td>Simon</td>
                        <td>22 Route du Rhin</td>
                        <td>simon.grigoletto@viacesi.fr</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
@endsection