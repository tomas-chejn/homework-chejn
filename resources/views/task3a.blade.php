<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task 3 - Nalezení všech podřízených</title>
</head>
<body>
    <form method="GET" action="{{ route('post.taskA') }}">
        <label for="id">ID člena posádky</label>
        <input type="text" id="id" name="id" required>
        <button>Najít podřízené dle ID</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>Jméno</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subordinates as $subordinate)
            <tr>
                <td>{{$subordinate['name']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
