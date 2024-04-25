<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('block.head')
    <link rel="stylesheet" type="text/css" href="/css/productenpagina.css" />
</head>

<body id="achtergrond" style="background-image: url('/img/foto-koffie.jpg');">

<form method="post" action="/addcart">
    <nav class="menu">
        <ul>
    <li><a href="Home">Home</a></li>
    <li><a href="Shop">Shop</a></li>
    <li><a href="contact">Contact</a></li>
    <li><a href="winkelmand">Winkelmand</a></li>
        </ul>
    </nav>

    <div class="producten-container">
        <div class="text">
            <h1>Proef de rijke aroma's van kwaliteitskoffie bij Baristabeans. Onze passie voor perfectie begint bij het selecteren van de beste bonen, rechtstreeks vanuit de meest exotische koffieregio's over de hele wereld.</h1>
        </div>
    </div>
    <div class="enkel-product-hoofd">
        <div class="enkel-product">
            <div class="enkel-product-wrapper">
                <div class="enkel-product-koffieboon-foto">
                    <img src="/img/{{$product->product_img}}">
                </div>
                <div>
                    <h1 class="tekst-naam-koffie">{{$product->Product_name }}</h1>
                    <p>{{$product->Product_afkomst}}</p>
                    <p>Kies uw gewenste hoeveelheid:</p><br>
                    <input type="hidden" name="artikel" value="{{$product->product_id }}">
                    <input type="hidden" id="fld_gewicht" name="gewicht" value="250">
                    <script>function changequantify(prijs, quantity){

                        document.getElementById('prijs').innerHTML='€' + prijs + ',-';
                        document.getElementById('fld_gewicht').value = quantity;
                        
                    } 
                    </script>
                    <label class="button-gram" ; onclick="changequantify('{{$product->Product_price }}', 250)">250 Gram</label>
                    <label class="button-gram" ; onclick="changequantify('{{$product->productkilo_price }}', 1000)">1000 Gram</label><br>
                    <p class="bedrag" id="prijs">€{{$product->Product_price}},-</p>
                    
                </div>
            </div>
        </div>
        <div class="button-wrapper">
                        <button type="submit" class="btn fill">Voeg toe aan uw winkelmand</button>
                    </div>
        <div class="button-wrapper">
            <button class="btn fill"><a href="\Shop">Ga terug naar de shop</a></button>
        </div>
    </div>
    @csrf
</form>

</body>
</html>