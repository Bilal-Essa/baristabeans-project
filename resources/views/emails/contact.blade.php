<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@component('mail::message')
    # Nieuw Contactformulier Ingevuld

    **Naam:** {{ $data['name'] }}<br>
    **E-mail:** {{ $data['email'] }}<br>
    **Bericht:**<br>
    {{ $data['message'] }}
@endcomponent

</body>
</html>