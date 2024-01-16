<!-- resources/views/returns/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Return a Rented Car</h2>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('returns.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="car_plate">Car Plate Number:</label>
                <input type="text" name="car_plate" id="car_plate" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Return Car</button>
        </form>
    </div>
@endsection
