@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Page d'administration</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row datatable">
    <div class="col m12 l10 offset-l1">
        <table id='tab' class='display'>
            <caption>Fromages</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Lait</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Roquefort</td>
                    <td>brebis</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Morbier</td>
                    <td>vache</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Raclette</td>
                    <td>vache</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>St Nectaire</td>
                    <td>vache</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
$(document).ready(function() {
    $('#tab').DataTable( {
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
        }
    } );
} );

    $(document).ready(function () {
        $('#tab').DataTable();
    });

</script>
@endsection