<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pelanggaran</title>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0px;     
        }
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>

    <h1>Edit Pelanggaran</h1>
    <a href="{{ route('pelanggaran.index') }}">Kembali</a><br><br>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Menampilkan pesan sukses --}}
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2>Data Pelanggaran</h2>

        <label for="jenis">Jenis Pelanggaran</label><br>
        <textarea id="jenis" name="jenis" rows="7" cols="50">{{ old('jenis', $pelanggaran->jenis) }}</textarea>
        <br><br>

        <label for="konsekuensi">Konsekuensi</label><br>
        <textarea id="konsekuensi" name="konsekuensi" rows="7" cols="50">{{ old('konsekuensi', $pelanggaran->konsekuensi) }}</textarea>
        <br><br>

        <label for="poin">Poin Pelanggaran</label><br>
        <input type="text" id="poin" name="poin" value="{{ old('poin', $pelanggaran->poin) }}">
        <br><br>

        <button type="submit">SIMPAN DATA</button>
    </form>

</body>
</html>
