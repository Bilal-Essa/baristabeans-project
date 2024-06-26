<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Winkelmand</title>
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
                        &nbsp
                    </div>
             </div>
             <h1 style="color:bisque;font-size:50px;">Winkelmand</h1><br>
        @if ($order_items->isEmpty())
    <p style="color:bisque;font-size:20px;">Uw winkelwagen is leeg</p><br>

@else
    @endif
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal Gram</th>
                <th>Totaal</th>
                <th>Verwijder</th>
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
                <td>
                    <a href="/deletecart?order_item_id={{$order_item->id}}">
                        <button>Verwijder</button>
                    </a>
                </td>
            </tr>
            <!-- Einde van loop over winkelwagenitems -->
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Totaal</strong></td>
                <td colspan="2">€ {{ number_format($totaal_bedrag, 2, ',', '.') }}</td>
                
            </tr>
        </tfoot>
    </table>
    <a href="/Shop" class="bestel">Verder Winkelen</a>
    <a href="/besteld" class="bestel">bestel nu!</a>
    </body>
</html>