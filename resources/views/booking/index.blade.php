<!-- resources/views/booking/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Peminjaman Mobil') }}</div>

                    <div class="card-body">
                        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">{{ __('Pesan Mobil') }}</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mobil</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $booking->car->brand }} - {{ $booking->car->model }} ({{ $booking->car->plate_number }})</td>
                                        <td>{{ $booking->start_date }}</td>
                                        <td>{{ $booking->end_date }}</td>
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
