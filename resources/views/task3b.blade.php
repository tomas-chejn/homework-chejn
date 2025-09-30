<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task 3 - Nalezení nadřízených</title>
</head>
<body>
    <form method="GET" action="{{ route('post.taskB') }}">
        <label for="id">ID člena posádky</label>
        <input type="text" id="id" name="id" required>
        <button>Najít nadřízené dle ID</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>Jméno</th>
        </tr>
        </thead>
        <tbody>
        @foreach($superiors as $superior)
            <tr>
                <td>{{$superior['name']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
