<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('block.head')
        <link rel="stylesheet" type="text/css" href="/css/home.css" />
    </head>
    <body id="achtergrond" style="background-image: url('/img/foto-koffie.jpg');"> 
            <nav class="menu">
                <ul>
            <li><a href="Home">Home</a></li>
            <li><a href="Shop">Shop</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="winkelmand">Winkelmand</a></li>
                </ul>
            </nav>
             <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>
             </div>
                    <!-- Begin van de flexbox achtergrond -->
          
                    <div class="Bouwproducten">
                   

@if ($products->isEmpty())
    <p>Er zijn geen producten beschikbaar.</p>
@else
    @foreach ($products as $product)
        <div class="Productenrij">
            <div class="wrapper">
                <div class="banner-image">
                    <img src=
                    "/img/{{$product->product_img}}">
                </div>
                <h1>{{$product->Product_name }}</h1>
                <p>{{$product->Product_afkomst}}</p>
                <p>{{$product->Product_price}} Euro</p>
            </div>
            <div class="button-wrapper">
                <button class="btn fill">Ga naar het product</button>
            </div>
        </div>
    @endforeach
@endif

        </div>
    </div>
</body>
</html>
