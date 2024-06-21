@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($venues as $v)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $v->photo) }}" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $v->name }}</h5>
                                            <p class="card-text">
                                                {{ $v->address }}
                                            </p>
                                            <a href="{{ route('dashboard.field', $v->id) }}" class="btn btn-primary mt-4">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
