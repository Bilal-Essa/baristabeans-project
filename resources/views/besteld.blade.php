<!DOCTYPE html>
<html lang="en">
    <head>
        @include('block.head')
        <link rel="stylesheet" type="text/css" href="/css/winkelmand.css" />
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
        @if ($order_items->isEmpty())
    <p>Uw winkelmand is leeg</p>

@else
    @endif
    <h1 style="color:bisque;font-size:40px;"> Bedankt voor uw bestelling!</h1><br>
    <h2 style="color:bisque;font-size:30px;">Uw bestelnummer is: {{$ordernummer}}</h2>
    <p style="color:bisque;font-size:20px;"> U kunt uw bestelling komen afhalen in de winkel.</p>
    <p style="color:bisque;font-size:20px;"> Verrgeet niet om uw bestelnummer mee te nemen. En raak deze niet kwijt!!</p> 
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th>Totaal</th>
            </tr>
        </thead>
        <tbody>
            <!-- Voor elk item in de winkelwagen -->
            @foreach ($order_items as $order_item)
            <tr>
                <td>{{ $order_item->description }}</td>
                <td> {{ $order_item->price }}</td>
                <td>{{ $order_item->quantity }}</td>    
                <td>€ {{ $order_item->price }}</td>
            </tr>
            <!-- Einde van loop over winkelwagenitems -->
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Totaal</strong></td>
                <td colspan="2">€ {{$totaal_bedrag }}</td>
            </tr>
        </tfoot>
    </table>
    <a href="/Home" class="bestel">Terug naar de Home</a>
</html>