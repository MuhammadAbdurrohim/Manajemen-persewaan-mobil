<!-- resources/views/car/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Manajemen Mobil') }}</div>

                    <div class="card-body">
                        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">{{ __('Tambah Mobil') }}</a>

                        <form action="{{ route('cars.index') }}" method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="brand" class="form-control" placeholder="Cari berdasarkan merek" value="{{ request('brand') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="model" class="form-control" placeholder="Cari berdasarkan model" value="{{ request('model') }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">{{ __('Cari') }}</button>
                                </div>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Nomor Plat</th>
                                    <th scope="col">Tarif Sewa (per hari)</th>
                                    <th scope="col">Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->plate_number }}</td>
                                        <td>{{ $car->rental_rate }}</td>
                                        <td>{{ $car->is_available ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
