<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
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
            <tbody id="tabelData">
                <!-- @foreach($faculty as $item)
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

                @endforeach -->
            </tbody>
        </table>
    </div>

    <!-- <form action="{{ route('tambahFakultas') }}" method="POST">
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
    </form> -->

    <form id="formTambah">
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
    <script>
        function getData() {
            document.getElementById('tabelData').innerHTML = ''
            fetch('/api/faculty', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            }).then(response => response.json().then(response => {
                response.data.forEach(fakultas => {
                    let element = document.createElement('tr');
                    element.innerHTML = `
                        <td>${fakultas.name}</td>
                        <td>${fakultas.date}</td>

                        <td> <a href="/faculty/updateView/${fakultas.id}">update</a></td>


                        <td>
                            <form action="/faculty/${fakultas.id}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                `;
                    document.getElementById('tabelData').append(element);
                })
            }));
        }
        getData();
        setInterval(getData, 5000);
        
        document.getElementById('formTambah').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = new FormData(event.target);
            const formProps = Object.fromEntries(form);
            fetch('/api/faculty', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: formProps.name,
                    date: formProps.date,
                })
            }).then((response) => response.json()).then((response) => {
                if (response.message == 'success') {
                    let element = document.createElement('tr');
                    console.log(response)
                    element.innerHTML = `
                        <td>${response.data.name}</td>
                        <td>${response.data.date}</td>

                        <td> <a href="/faculty/updateView/${response.data.id}">update</a></td>


                        <td>
                            <form action="/faculty/${response.data.id}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                `;
                    document.getElementById('tabelData').append(element);
                }
            });
        });
    </script>
</body>

</html>