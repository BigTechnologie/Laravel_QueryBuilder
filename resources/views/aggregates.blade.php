<!DOCTYPE html>
<html>
<head>
    <title>Test des Agrégats</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>

    <h1>Résultats des Méthodes d’Agrégation</h1>

    <table>
        <tr>
            <th>Méthode</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>Total de produits</td>
            <td>{{ $totalProducts }}</td>
        </tr>
        <tr>
            <td>Prix maximum</td>
            <td>{{ $maxPrice }} €</td>
        </tr>
        <tr>
            <td>Prix minimum</td>
            <td>{{ $minPrice }} €</td>
        </tr>
        <tr>
            <td>Somme totale des prix</td>
            <td>{{ $sumPrice }} €</td>
        </tr>
        <tr>
            <td>Prix moyen</td>
            <td>{{ $avgPrice }} €</td>
        </tr>
    </table>

</body>
</html>
