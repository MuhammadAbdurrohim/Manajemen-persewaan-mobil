<!-- resources/views/booking/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Buat Peminjaman') }}</div>

                    <div class="card-body">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="car_id">{{ __('Pilih Mobil') }}</label>
                                <select class="form-control" id="car_id" name="car_id" required>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">{{ __('Tanggal Mulai') }}</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">{{ __('Tanggal Selesai') }}</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Buat Peminjaman') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
