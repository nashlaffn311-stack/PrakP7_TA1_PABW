@extends('layouts.app')
@section('title', 'Pengelolaan Laporan Banjir')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-table me-2"></i>Daftar Laporan Banjir Masuk</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Pelapor</th>
                    <th>Lokasi & Kecamatan</th>
                    <th>Tinggi Air</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporans as $laporan)
                    <tr>
                        <td>{{ $laporans->firstItem() + $loop->index }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $laporan->foto) }}" width="70" height="70" class="rounded object-fit-cover">
                        </td>
                        <td>
                            <strong>{{ $laporan->nama_pelapor }}</strong><br>
                            <small class="text-muted">{{ $laporan->no_hp }}</small>
                        </td>
                        <td>{{ $laporan->lokasi }}, Kec. {{ $laporan->kecamatan }}</td>
                        <td><span class="badge bg-warning text-dark">{{ $laporan->tinggi_air }} cm</span></td>
                        <td>
                            @if($laporan->status == 'Menunggu') <span class="badge bg-secondary">Menunggu</span>
                            @elseif($laporan->status == 'Diproses') <span class="badge bg-primary">Diproses</span>
                            @else <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('laporan.show', $laporan) }}" class="btn btn-info btn-sm text-white"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('laporan.destroy', $laporan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada laporan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $laporans->links() }}
    </div>
</div>
@endsection