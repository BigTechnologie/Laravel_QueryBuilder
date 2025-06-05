<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modèles et vues de Blade</title>
</head>
{{--  
@php
    $title = "Page de Contact !";
    $users = ['kandia', 'bruno', 'Atyve', 'Alain', 'Jean'];
    $message = "Hello Dawan";
@endphp
--}}

<body>
    {{-- 3- Directives de Blade --}}

    {{--  

    <h2>{{ $title }}</h2>
    <p>Bienvenue sur notre page de contact.</p>

    @foreach ($users as $user)
     <p>{{ $user }}</p> 
    @endforeach

    <p>{{ $message }}</p>

    --}}

    {{-- 4-Transmission des données à Blade /////////////////////////////////////////// --}}

    <h2>{{ $title }}</h2> {{-- La valeur de cette variable est definie dans: web.php --}}

    {{ $description }}

    <ul>

         
        @foreach ( $books as $book )
            <li>{{ $book }}</li>
        @endforeach
       
        <br>
        <br>

        @for ($i = 0; $i < count($books); $i++) {{-- Bien que cette boucle marche, Nous utilisons foreach car cette syntaxe est beaucoup plus propre et facile à utiliser  --}}
        <li>{{ $books[$i] }}</li>
        @endfor

    </ul>

    
    
</body>
</html>