<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>Data User</h1>
    <br>
    <table align="center" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @forelse ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pertanyaan->judul }}</td>
                <td>{{ $pertanyaan->isi }}</td>
                <td class="inline">
                    <a href="/user/{{$user->id}}">Show</a>
                    <a href="/user/{{$user->id}}/edit">edit</a>
                    <form action="/user/{{$user->id}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="4">Empty Data</td>
            </tr>
          @endforelse
    </table>
</body>
</html>
