@extends('layout.master') 

@section('additionalheader')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script   src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection



@section('content')

{{-- Parallax header --}}
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
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

{{-- DataTable with some info --}}
<div class="row datatable">
    <div class="col m12 l10 offset-l1">        
        <table id='tab' class='display'>
            <caption>Articles dans la boutique</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix €</th>
                    <th>Caché</th>
                </tr>
            </thead>
            <tbody id="producttable">
                {{-- AJAX --}}
                {{-- filled with ajax --}}
                {{-- End of AJAX --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
{{-- Script for filling the table in ajax --}}
<script>
    $(document).ready(function() {
    
        $('#tab').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            "ajax": "/api/product",
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "price" },
                    { "data": "hide" },   
                ]
        });
    });

</script>
@endsection