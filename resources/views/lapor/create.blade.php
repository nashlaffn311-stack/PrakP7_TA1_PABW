@extends('layouts.app')
@section('title', 'Form Pelaporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold">Form Lapor Banjir Warga</div>
            <div class="card-body p-4">
                <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                            <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="form-control @error('nama_pelapor') is-invalid @enderror" required>
                            @error('nama_pelapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No. HP / WhatsApp</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" required>
                            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lokasi" class="form-label">Lokasi / Jalan</label>
                            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" class="form-control @error('lokasi') is-invalid @enderror" required>
                            @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" class="form-control @error('kecamatan') is-invalid @enderror" required>
                            @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tinggi_air" class="form-label">Tinggi Air (dalam cm)</label>
                        <input type="number" id="tinggi_air" name="tinggi_air" value="{{ old('tinggi_air') }}" class="form-control @error('tinggi_air') is-invalid @enderror" placeholder="Contoh: 50" required>
                        @error('tinggi_air') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan / Kondisi Lapangan</label>
                        <textarea id="keterangan" name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Bukti Kondisi Banjir (jpg/jpeg/png, maks. 2 MB)</label>
                        <input type="file" id="foto" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror" required>
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold"> Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
