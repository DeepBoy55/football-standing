@extends('template.index')

@section('sections')
<h1>Football Standings</h1>
<a class="btn btn-primary" href="{{ '/data-klub/create' }}">Tambah Klub</a>


<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>logo</th>
            <th>Nama Klub</th>
            <th>Asal Kota</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clubs as $club)
        <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td><img src="{{ asset('storage/clubs/' . $club->img) }}" style="width: 40px" height="50px"  alt=""></td>
            <td>{{ $club->name }}</td>
            <td>{{ $club->city }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection