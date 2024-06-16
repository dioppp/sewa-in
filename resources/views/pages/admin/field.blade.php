@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Fields</div>
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
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Field" />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addField">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Field
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
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Venue</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Sport</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Type</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Material</h6>
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
                                    @forelse ($fields as $f)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="fw-semibold mb-0">{{ $f->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->venue->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->sport->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->is_indoor ? 'Indoor' : 'Outdoor' }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->material }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->created_by }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $f->updated_by }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editField" data-bs-id="{{ $f->id }}"
                                                    data-bs-name="{{ $f->name }}" data-bs-venue="{{ $f->venue_id }}"
                                                    data-bs-sport="{{ $f->sport_id }}"
                                                    data-bs-type="{{ $f->is_indoor }}"
                                                    data-bs-material="{{ $f->material }}">
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
                        <!-- Add Field -->
                        <div class="modal fade" id="addField" tabindex="-1" aria-labelledby="addFieldLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addFieldLabel">Add Field Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('field.store') }}" method="POST" custom-action>
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->name }}" name="created_by">
                                            <input type="hidden" value="-" name="updated_by">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ old('name') }}"
                                                    placeholder="Enter field name">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="venue_id" class="form-label">Venue</label>
                                                <select class="form-select @error('venue_id') is-invalid @enderror"
                                                    name="venue_id" id="venue_id">
                                                    <option value="" disabled selected>Select venue</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->venue_id }}">{{ $f->venue->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('venue_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="sport_id" class="form-label">Sport</label>
                                                <select class="form-select @error('sport_id') is-invalid @enderror"
                                                    name="sport_id" id="sport_id">
                                                    <option value="" disabled selected>Select sport</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->sport_id }}">{{ $f->sport->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sport_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="type" class="form-label">Type</label>
                                                <select class="form-select @error('type') is-invalid @enderror"
                                                    name="is_indoor" id="type">
                                                    <option value="" disabled selected>Select field type</option>
                                                    <option value="1">Indoor</option>
                                                    <option value="0">Outdoor</option>
                                                </select>
                                                @error('type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="material" class="form-label">Material</label>
                                                <input type="text"
                                                    class="form-control @error('material') is-invalid @enderror"
                                                    id="material" name="material" value="{{ old('material') }}"
                                                    placeholder="Enter field material">
                                                @error('material')
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
                        {{-- End Add Field --}}

                        {{-- Edit Field --}}
                        <div class="modal fade" id="editField" tabindex="-1" aria-labelledby="editFieldLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editFieldLabel">Edit Field Form</h1>
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
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="nameEdit" name="name" placeholder="Enter field name">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="venue_id" class="form-label">Venue</label>
                                                <select class="form-select @error('venue_id') is-invalid @enderror"
                                                    name="venue_id" id="venueEdit">
                                                    <option value="" disabled>Select venue</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->venue_id }}">{{ $f->venue->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('venue_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="sport_id" class="form-label">Sport</label>
                                                <select class="form-select @error('sport_id') is-invalid @enderror"
                                                    name="sport_id" id="sportEdit">
                                                    <option value="" disabled>Select sport</option>
                                                    @foreach ($fields as $f)
                                                        <option value="{{ $f->sport_id }}">{{ $f->sport->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sport_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="type" class="form-label">Type</label>
                                                <select class="form-select @error('type') is-invalid @enderror"
                                                    name="is_indoor" id="typeEdit">
                                                    <option value="" disabled>Select field type</option>
                                                    <option value="1">Indoor</option>
                                                    <option value="0">Outdoor</option>
                                                </select>
                                                @error('type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="material" class="form-label">Material</label>
                                                <input type="text"
                                                    class="form-control @error('material') is-invalid @enderror"
                                                    id="materialEdit" name="material" placeholder="Enter field material">
                                                @error('material')
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
    {{-- Edit Modal --}}
    <script>
        const exampleModal = document.getElementById('editField')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const venue = button.getAttribute('data-bs-venue');
                const sport = button.getAttribute('data-bs-sport');
                const type = button.getAttribute('data-bs-type');
                const material = button.getAttribute('data-bs-material');
                console.log(id, name, venue, sport, type, material);
                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/field/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputName = exampleModal.querySelector('#nameEdit');
                const modalBodyInputVenue = exampleModal.querySelector('#venueEdit');
                const modalBodyInputSport = exampleModal.querySelector('#sportEdit');
                const modalBodyInputType = exampleModal.querySelector('#typeEdit');
                const modalBodyInputMaterial = exampleModal.querySelector('#materialEdit');

                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputVenue.value = venue;
                modalBodyInputSport.value = sport;
                modalBodyInputType.value = type;
                modalBodyInputMaterial.value = material;
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
                document.getElementById('deleteForm').setAttribute('action', '/sport/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
