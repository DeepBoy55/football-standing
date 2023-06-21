@extends('template.index')

@section('sections')
     <form method="POST" action="{{ url('/data-klub/createProsses') }}" enctype="multipart/form-data">
        @csrf
    
        <div>
            <label for="nama">Nama Klub:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="nama">Asal Klub:</label>
            <input type="text" id="city" name="city" required>
        </div>
    
        <div>
            <label for="gambar">Gambar Klub:</label>
            <input type="file" id="img" name="img" required>
        </div>
    
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
@endsection