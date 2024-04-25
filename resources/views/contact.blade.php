<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('block.head')
        <link rel="stylesheet" type="text/css" href="/css/contact.css" />
    </head>
    <link rel="stylesheet" type="text/css" href="/css/contact.css" />

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

    <div class="container-contact">
    <Div class="text-container">
	<form action="{{ route('contact.store') }}" method="POST">
            <!-- Voeg dit toe aan je Laravel-weergave -->
<script src="{{ asset('js/button-contact.js') }}"></script>
           <!-- Voeg dit toe aan je Laravel-weergave -->
@if(session('success_message'))
    <div id="success-message" style="display: none;">{{ session('success_message') }}</div>
@endif
    @csrf
    <h3>Contact formulier</h3>
		<label for="name">Naam</label>
		<input class="tekstveld" name="name" type="text" required placeholder="Naam"/>
		<br>
		<label for="email">Email</label>
		<input class="tekstveld" name="email" type="email" required placeholder="E-mail"/>
		<br>
		<label for="message">Bericht</label><br>
        <textarea class="tekstveld" name="message" cols="30" rows="10" required placeholder="Typ hier uw bericht..." required> </textarea>
        <div class="button-wrapper"><br>    
        <button type="submit" class="btn fill">Verzenden</a>
    </div>
	</form>	

  </div>
</div>
                                
</html>
