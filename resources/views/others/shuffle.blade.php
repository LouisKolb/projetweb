@extends('layout.master')
@section('content')
    

  <link rel="stylesheet" href="css/shuffle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.1/shuffle.js"></script>

</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12@sm"><h1>Test de shuffle</h1></div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4@sm col-3@md">
          <div class="filters-group">
            <label for="filters-search-input" class="filter-label">Search</label>
            <input
              class="textfield filter__search js-shuffle-search"
              type="search"
              id="filters-search-input"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12@sm filters-group-wrap">
          <div class="filters-group">
            <p class="filter-label">Filter</p>
            <div class="btn-group filter-options">
            
              @foreach ($categories as $category)
              <button class="btn btn--primary" data-group="{{$category->name}}">{{$category->name}}</button>
              @endforeach

            </div>
          </div>
          <fieldset class="filters-group">
            <legend class="filter-label">Sort</legend>
            <div class="btn-group sort-options">
              <label class="btn active">
                <input type="radio" name="sort-value" value="dom" checked />Default</label>
              <label class="btn">
                <input type="radio" name="sort-value" value="title" /> Title</label>
              <label class="btn">
                <input type="radio" name="sort-value" value="date-created" />Date Created</label>
            </div>
          </fieldset>
        </div>
      </div>
    </div>

    <div class="container" id="azerty">
      <div id="grid" class="row my-shuffle-container">
        <!-- Detud d'une tile -->
        {{-- @foreach ($products as $product)
            <figure
            class="col-3@xs col-4@sm col-3@md picture-item"
            data-groups="[&quot;{{$product->categoryName->name}}&quot;]"
            data-date-created="{{$product->created_at}}"
            data-title="{{$product->name}}">
            <div class="picture-item__details">
                <figcaption class="picture-item__title">
                 <a href="/storage/{{$product->picture->link}}" target="_blank" rel="noopener">{{$product->name}}</a>
                </figcaption>
                <p class="picture-item__tags hidden@xs">{{$product->categoryName->name}}</p>
            </div>
        </figure>
    @endforeach --}}
    
        <!-- fin d'une tile -->






{{-- ------------------------------------------------------------------- --}}

@foreach ($products as $product)
        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups="[&quot;{{$product->categoryName->name}}&quot;]" data-date-created="2017-04-30" data-title="{{$product->name}}">
            <div class="picture-item__inner">
                <div class="aspect aspect--16x9">
                    <div class="aspect__inner">
                        <img src="/storage/{{$product->picture->link}}"
                            alt="Bon article" />
                    </div>
                </div>
                <div class="picture-item__details">
                    <figcaption class="picture-item__title">
                        <a href="/product/{{$product->id}}" target="_blank" rel="noopener">{{$product->name}}</a>
                    </figcaption>
                    <p class="picture-item__tags hidden@xs">{{$product->categoryName->name}}</p>
                </div>
            </div>
        </figure> 
@endforeach

{{-- ------------------------------------------------------------------- --}}





















        <!-- 
        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups="[&quot;nature&quot;]" data-date-created="2017-04-30" data-title="Lake Walchen">
            <div class="picture-item__inner">
                <div class="aspect aspect--16x9">
                    <div class="aspect__inner">
                        <img src="https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&auto=format&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=284&h=160&fit=crop&s=6ef0f8984525fc4500d43ffa53fe8190"
                            srcset="
                            https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&auto=format&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=284&h=160&fit=crop&s=6ef0f8984525fc4500d43ffa53fe8190       1x,
                            https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&auto=format&q=55&fm=jpg&dpr=2&crop=entropy&cs=tinysrgb&w=284&h=160&fit=crop&s=6ef0f8984525fc4500d43ffa53fe8190 2x
                          "
                            alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
                    </div>
                </div>
                <div class="picture-item__details">
                    <figcaption class="picture-item__title">
                        <a href="https://unsplash.com/photos/zshyCr6HGw0" target="_blank" rel="noopener">Lake Walchen</a>
                    </figcaption>
                    <p class="picture-item__tags hidden@xs">nature</p>
                </div>
            </div>
        </figure> -->

        <div class="col-1@sm col-1@xs my-sizer-element"></div>
      </div>
    </div>

    <script src="/js/mainshuffle.js"></script>
  
@endsection