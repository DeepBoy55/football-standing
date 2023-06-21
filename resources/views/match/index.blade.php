@extends('template.index')

<style>
table {
    table-layout: fixed;
    width: your_size px;
  }
  </style>

@section('sections')
 <a class="btn btn-primary" href="{{ url('/Hasil-Pertandingan/create') }}">Tambah Pertandingan</a>
<div class="row justify-content-center">
    <div class="col-auto">
<table class="table table-striped">
    <div>
    </div>
    <thead>
        <tr class="text-center">
            <th>Tanggal</th>
            <th>Tim Tuan Rumah</th>
            <th>Skor Tuan Rumah</th>
            <th></th>
            <th>Tim Tamu</th>
            <th>Skor Tamu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matched as $match)
        <tr class="text-center">
            <td>{{ $match->date }}</td>
            <td>{{$match->homeTeam->name }}</td>
            <td>{{ $match->home_score }}</td>
            <td>VS</td>
            <td>{{ $match->awayTeam->name }}</td>
            <td>{{ $match->away_score }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection