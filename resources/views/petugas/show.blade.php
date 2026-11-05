@extends('layouts.app')
@section('title', 'Detail Laporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white fw-bold"><i class="fas fa-info-circle me-1"></i> Detail Laporan Banjir</div>
            <div class="card-body text-center p-4">
                <img src="{{ asset('storage/' . $laporan->foto) }}" class="img-fluid rounded mb-3 style="max-height: 350px;">
                <h4 class="fw-bold">{{ $laporan->lokasi }}, Kec. {{ $laporan->kecamatan }}</h4>
                <p class="mb-1"><strong>Pelapor:</strong> {{ $laporan->nama_pelapor }} ({{ $laporan->no_hp }})</p>
                <p class="mb-1"><strong>Tinggi Air:</strong> <span class="badge bg-warning text-dark">{{ $laporan->tinggi_air }} cm</span></p>
                <p class="mb-1"><strong>Status Penanganan:</strong> 
                    @if($laporan->status == 'Menunggu') <span class="badge bg-secondary">Menunggu</span>
                    @elseif($laporan->status == 'Diproses') <span class="badge bg-primary">Diproses</span>
                    @else <span class="badge bg-success">Selesai</span>
                    @endif
                </p>
                <p class="mt-3 text-start bg-light p-3 rounded"><strong>Keterangan:</strong><br>{{ $laporan->keterangan }}</p>
                <div class="mt-4">
                    <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-warning text-white">Edit Status</a>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection