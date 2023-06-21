@extends('template.index')

@section('sections')
<form method="POST" action="{{ url('/Hasil-Pertandingan/process') }}">
    @csrf

   <!-- Form input pertandingan -->
<div id="results-container">
    <div class="result-row">

            <br>

        <input type="date" class="form-control"  name="date[]" id="date[]"aria-describedby="addon-wrapping">

        <br>

        <select class="form-select" name="home_club_id[]" required>
            <option value="">Pilih Tim Tuan Rumah</option>
            @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" placeholder="Score Team Kandang" name="home_score[]" id="home_score[]" aria-label="Score Team Kandang" aria-describedby="addon-wrapping">

        <br>

        <select class="form-select" name="away_club_id[]" required>
            <option value="">Pilih Tim Tandang</option>
            @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" placeholder="Score Team Tandang" name="away_score[]" id="away_score[]" aria-label="Score Team Tandang" aria-describedby="addon-wrapping">
        <button type="button" class="remove-result btn btn-danger">Hapus</button>
    </div>
</div>

<!-- Tombol untuk menambahkan row baru -->
<button type="button" class="btn btn-info" id="add-result">Tambah Pertandingan</button>

<!-- Tombol submit -->
<button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addResultButton = document.getElementById('add-result');
        const resultsContainer = document.getElementById('results-container');

        addResultButton.addEventListener('click', function() {
            addResultRow();
        });

        resultsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-result')) {
                removeResultRow(e.target.parentNode);
            }
        });

        function addResultRow() {
            const resultRow = document.createElement('div');
            resultRow.classList.add('result-row');
            resultRow.innerHTML = `
            
            <br>

        <input type="date" class="form-control"  name="date[]" id="date[]"aria-describedby="addon-wrapping">

        <br>

        <select class="form-select" name="home_club_id[]" required>
            <option value="">Pilih Tim Tuan Rumah</option>
            @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" placeholder="Score Team Kandang" name="home_score[]" id="home_score[]" aria-label="Score Team Kandang" aria-describedby="addon-wrapping">

        <br>

        <select class="form-select" name="away_club_id[]" required>
            <option value="">Pilih Tim Tandang</option>
            @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" placeholder="Score Team Tandang" name="away_score[]" id="away_score[]" aria-label="Score Team Tandang" aria-describedby="addon-wrapping">
        <button type="button" class="remove-result btn btn-danger">Hapus</button>
            `;
            resultsContainer.appendChild(resultRow);
        }

        function removeResultRow(row) {
            row.remove();
        }
    });
</script>
@endsection