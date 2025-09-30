<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task 1</title>
    </head>
    <body>
        <table>
            <thead>
            <tr>
                <th>Číslo</th>
                <th>Počet výskytů v poli</th>
            </tr>
            </thead>
            <tbody>
            @foreach($duplicates as $number => $occurence)
                <tr>
                    <td>{{$number}}</td>
                    <td>{{$occurence}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
