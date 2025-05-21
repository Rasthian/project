<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if (session('success'))
    <p>{{session('success')}}</p>
    @endif

    @if (session('error'))
    <p>{{session('error')}}</p>
    @endif

    <div class="">
        <h1>DATA FAKULTAS</h1>
        <table style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>Nama</td>
                    <th>Tanggal Berdiri</td>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faculty as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->date}}</td>

                    <td> <a href="/faculty/updateView/{{$item->id}}">update</a></td>


                    <td>
                        <form action="/faculty/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('tambahFakultas') }}" method="POST">
        @csrf
        <h1>TAMBAH FAKULTAS</h1>
        <ul>
            <li>
                <label for="name">Nama Fakultas</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama">
            </li>
            <li>
                <label for="date">Tanggal Berdiri</label>
                <input type="date" name="date" id="date" placeholder="Masukkan tanggal">
            </li>
            <button>Submit</button>
            </div>
    </form>
</body>

</html>