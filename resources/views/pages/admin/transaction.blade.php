@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Transactions</div>
                    <div class="card-body">
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Customer Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Venue</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Field</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Start Time</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">End Time</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Price</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Ordered At</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $t)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->user->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->order->field->venue->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->order->field->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->order->schedule->start_time }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->order->schedule->end_time }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ Number::currency($t->order->price, in: 'IDR') }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $t->created_at }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="border-bottom-0 text-center" colspan="9">
                                                <h6 class="fw-semibold mb-0">No data available</h6>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- End Table --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
