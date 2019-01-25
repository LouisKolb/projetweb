@extends('layout.master') 
@section('content') {{--
<link rel="stylesheet" href="css/shuffle.css"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.1/shuffle.js"></script>

</head>

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

<body>
    <div class="container">
        <div class="row">
            <div class="col-12@sm">
                <h1>Test de shuffle</h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col l3 offset-l1">
            <div class="filters-group">
                <label for="filters-search-input" class="filter-label">Search</label>
                <input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" />
            </div>
        </div>
    </div>

    <div class="row filters-group-wrap valign-wrapper">
        <div class="col l5 offset-l1 filters-group">
            <p class="filter-label">Filter</p>
            <div class="btn-group filter-options">
                @foreach ($categories as $category)
                <button class="btn active btn--primary" data-group="{{$category->name}}">{{$category->name}}</button> @endforeach
            </div>
        </div>

        <div class="col l5 filters-group">
            <legend class="filter-label">Sort</legend>
            <div class="btn-group sort-options">
                <label class="btn active">
                <input type="radio" name="sort-value" value="dom" checked />Default</label>
                <label class="btn">
                <input type="radio" name="sort-value" value="title" /> Title</label>
                <label class="btn">
                <input type="radio" name="sort-value" value="date-created" />Date Created</label>
            </div>
        </div>
    </div>

    <div class="row" id="azerty">
        <div id="grid" class="col l10 offset-l1 my-shuffle-container">
            @foreach ($products as $product)
            <div class="picture-item" data-groups="[&quot;{{$product->categoryName()}}&quot;]" data-date-created="2017-04-30" data-title="{{$product->name}}">
                <div class="picture-item__inner">
                    <div class="aspect__inner">
                        <a href="/product/{{$product->id}}">
                            <img class="aspect__inner" src="/storage/{{$product->picture->link}}" alt="Bon article" />
                        </a>
                    </div>

                    <div class="picture-item__details">
                        <div class="picture-item__title">
                            <a href="/product/{{$product->id}}" target="_blank" rel="noopener">{{$product->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="/js/mainshuffle.js"></script>
    {{--
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("button").addClass("active");
                $("button").removeClass("active");
            });
        });
    </script> --}}
@endsection