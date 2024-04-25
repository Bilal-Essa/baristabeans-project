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
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
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
                <td>
                    <input type="number" value="1" min="1">
                </td>
                <td>€ {{ $order_item->price }}</td>
                <td>
                    <a href="/deletecart?order_item_id={{$order_item->id}}">
                        <button>Verwijder</button>
                    </a>
                </td>
            </tr>
            <!-- Einde van loop over winkelwagenitems -->
            @endforeach;
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Totaal</strong></td>
                <td colspan="2">€ {{$totaal_bedrag }}</td>
            </tr>
        </tfoot>
    </table>
    <button class="bestel">bestel nu!</button>
    
    </body>
</html>