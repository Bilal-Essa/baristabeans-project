<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('block.head')
        <link rel="stylesheet" type="text/css" href="/css/contact.css" />
    </head>
    

    <body id="achtergrond" style="background-image: url('/img/foto-koffie.jpg');"> 
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <nav class="menu">
                <ul>
            <li><a href="Home">Home</a></li>
            <li><a href="Shop">Shop</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="winkelmand">Winkelmand</a></li>
                </ul>
            </nav>
        <body>
        
    <div class="container">
        <div class="text">
            <p>Proef de rijke aroma's van kwaliteitskoffie bij Baristabeans. Onze passie voor perfectie begint bij het selecteren van de beste bonen, rechtstreeks vanuit de meest exotische koffieregio's over de hele wereld.</p><br>
            <P>Heeft u vragen of opmerkingen? Ga dan naar onze contactformulier en dan nemen wij zo snel mogelijk contact met u op. </P><br>
            <p>Of bekijk ons gehele assortiment!<p>
            <div class="button-wrapper">
    <br><a href="\Shop" class="btn fill">Ga naar de shop</a>
            </div>
<div class="button-wrapper">
    <br><a href="\contact" class="btn fill">Contactpagina</a>
</div>
        </div>
        <div class="image">
            <img src="img/koffie6.png" alt="Mooie Afbeelding">
        </div>
    </div>
</body>