@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Orders</div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                            <div class="search-box">
                                <input type="text" data-table-id="" id="searchBox" data-action="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Order" />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addOrder">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Order
                                </span>
                            </button>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
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
                                            <h6 class="fw-semibold mb-0">Created By</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Updated By</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $o)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->field->venue->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->field->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">
                                                    {{ \Carbon\Carbon::parse($o->schedule->start_time)->format('H:i') }}
                                                </p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">
                                                    {{ \Carbon\Carbon::parse($o->schedule->end_time)->format('H:i') }}
                                                </p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->price }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->created_by }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->updated_by }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editOrder" data-bs-id="{{ $o->id }}"
                                                    data-bs-field="{{ $o->field_id }}"
                                                    data-bs-start="{{ $o->schedule_id }}"
                                                    data-bs-end="{{ $o->schedule_id }}"
                                                    data-bs-price="{{ $o->price }}">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <a href="" class="btn btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </a>
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

                        {{-- Modal --}}
                        <!-- Add Order -->
                        <div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="addOrderLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addOrderLabel">Add Order Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('owner-order.store') }}" method="POST" custom-action>
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->name }}" name="created_by">
                                            <input type="hidden" value="-" name="updated_by">
                                            <div class="mb-3">
                                                <label for="field_id" class="form-label">Field</label>
                                                <select class="form-select @error('field_id') is-invalid @enderror"
                                                    name="field_id" id="field_id">
                                                    <option value="" disabled selected>Select field</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->id }}">{{ $f->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('field_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Start
                                                    Time</label>
                                                <select class="form-select @error('start_time') is-invalid @enderror"
                                                    name="schedule_id" id="start_time">
                                                    <option value="" disabled selected>Select start time</option>
                                                    @foreach ($schedules as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('start_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">End Time</label>
                                                <select name="" id="endTime"
                                                    class="form-select @error('end_time') is-invalid @enderror" disabled>
                                                    <option value="" disabled selected>End time</option>
                                                    @foreach ($schedules as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('end_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    id="price" name="price" value="{{ old('price') }}"
                                                    placeholder="Enter price">
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Add Order --}}

                        {{-- Edit Order --}}
                        <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="editOrderLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editOrderLabel">Edit Order Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="editForm" custom-action>
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="idEdit">
                                            <input type="hidden" value="{{ auth()->user()->name }}" name="updated_by">
                                            <div class="mb-3">
                                                <label for="field_id" class="form-label">Field</label>
                                                <select class="form-select @error('field_id') is-invalid @enderror"
                                                    name="field_id" id="fieldEdit">
                                                    <option value="" disabled selected>Select field</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->id }}">{{ $f->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('field_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Start
                                                    Time</label>
                                                <select class="form-select @error('start_time') is-invalid @enderror"
                                                    name="schedule_id" id="start_timeEdit">
                                                    <option value="" disabled selected>Select start time</option>
                                                    @foreach ($schedules as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('start_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">End Time</label>
                                                <select name="" id="endTimeEdit"
                                                    class="form-select @error('end_time') is-invalid @enderror" disabled>
                                                    <option value="" disabled selected>End time</option>
                                                    @foreach ($schedules as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('end_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    id="priceEdit" name="price" value="{{ old('price') }}"
                                                    placeholder="Enter field price">
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Edit Field --}}

                        {{-- Delete Alert --}}
                        <div class="modal fade" id="deleteAlert" tabindex="-1" aria-labelledby="deleteAlertLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteAlertLabel">Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this data?</p>
                                        <form id="deleteForm" method="POST" class="d-inline" custom-action>
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" id="idDelete">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Delete Alert --}}

                        {{-- End Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- End Time Input --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to add an hour and update the corresponding end time input
            function addHourAndUpdateEndTime(startTimeInputId, endTimeInputId) {
                const startTimeInput = document.getElementById(startTimeInputId);
                const endTimeInput = document.getElementById(endTimeInputId);

                startTimeInput.addEventListener('change', function() {
                    const startTime = this.value;
                    if (startTime) {
                        // assign the id value into the select element on the end_time input
                        endTimeInput.value = startTime;
                    }
                });
            }

            // Apply the logic to both sets of start and end time inputs
            addHourAndUpdateEndTime('start_time', 'endTime');
        });
    </script>

    {{-- Edit Modal --}}
    <script>
        const exampleModal = document.getElementById('editOrder')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const field = button.getAttribute('data-bs-field');
                const start = button.getAttribute('data-bs-start');
                const end = button.getAttribute('data-bs-end');
                const price = button.getAttribute('data-bs-price');

                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/owner-order/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputField = exampleModal.querySelector('#fieldEdit');
                const modalBodyInputStart = exampleModal.querySelector('#start_timeEdit');
                const modalBodyInputEnd = exampleModal.querySelector('#endTimeEdit');
                const modalBodyInputPrice = exampleModal.querySelector('#priceEdit');

                modalBodyInputId.value = id;
                modalBodyInputField.value = field;
                modalBodyInputStart.value = start;
                modalBodyInputEnd.value = end;
                modalBodyInputPrice.value = price;
            })
        }
    </script>

    {{-- Delete --}}
    <script>
        const deleteModal = document.getElementById('deleteAlert')
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-bs-id');
                document.getElementById('deleteForm').setAttribute('action', '/owner-order/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
