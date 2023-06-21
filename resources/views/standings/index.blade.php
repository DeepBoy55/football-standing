@extends('template.index')

@section('sections')
<table class="table table-striped" >
    <thead>
        <tr>
            <th scope="col">Peringkat</th>
            <th scope="col" colspan="2">Klub</th>
            <th scope="col">Poin</th>
            <th scope="col">Main</th>
            <th scope="col">Menang</th>
            <th scope="col">Kalah</th>
            <th scope="col">Seri</th>
            <th scope="col">Gol</th>
            <th scope="col">Gol Lawan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($standings as $index => $standing)
            <tr>
                <td scope="row">{{ $index + 1 }}</td>
                <td scope="row"><img src="{{ asset('storage/clubs/' . \App\Models\club::find($standing['club_id'])->img ) }}" style="width: 40px" height="50px"  ml-3z alt=""></td>
                <td scope="row">{{ \App\Models\club::find($standing['club_id'])->name }}</td>
                <td scope="row">{{ $standing['points'] }}</td>
                <td scope="row">{{ $standing['played'] }}</td>
                <td scope="row">{{ $standing['wins'] }}</td>
                <td scope="row">{{ $standing['losses'] }}</td>
                <td scope="row">{{ $standing['draws'] }}</td>
                <td scope="row">{{ $standing['goals_for'] }}</td>
                <td scope="row">{{ $standing['goals_against'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection