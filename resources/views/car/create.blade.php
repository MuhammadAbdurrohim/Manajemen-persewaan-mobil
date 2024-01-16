<!-- resources/views/cars/create.blade.php -->

@extends('layouts.app') <!-- Pastikan layout sesuai dengan struktur layout Anda -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Mobil Baru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="brand">Merek:</label>
                                <input type="text" name="brand" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Model:</label>
                                <input type="text" name="model" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="license_plate">Nomor Plat:</label>
                                <input type="text" name="license_plate" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="rental_rate">Tarif Sewa per Hari:</label>
                                <input type="number" name="rental_rate" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
