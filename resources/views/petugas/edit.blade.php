@extends('layouts.app')
@section('title', 'Edit Laporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-white fw-bold"><i class="fas fa-edit me-1"></i> Edit & Update Status Laporan</div>
            <div class="card-body p-4">
                <form action="{{ route('laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Penanganan</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="Menunggu" {{ old('status', $laporan->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Diproses" {{ old('status', $laporan->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status', $laporan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $laporan->no_hp) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', $laporan->kecamatan) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tinggi Air (cm)</label>
                        <input type="number" name="tinggi_air" value="{{ old('tinggi_air', $laporan->tinggi_air) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" rows="3" class="form-control" required>{{ old('keterangan', $laporan->keterangan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Foto Bukti Saat Ini</label>
                        <img src="{{ asset('storage/' . $laporan->foto) }}" width="150" class="rounded mb-2">
                        <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-warning text-white fw-bold">Update Laporan</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection