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

   
    <form action="{{ route('editFakultas', $faculty->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>UPDATE FAKULTAS</h1>
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