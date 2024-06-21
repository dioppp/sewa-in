@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Venues</div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('message') }}</strong>
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
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Venue" />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addVenue">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Venue
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
                                            <h6 class="fw-semibold mb-0">Address</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Description</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Photo</h6>
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
                                    @forelse ($venues as $v)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $v->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $v->address }}</p>
                                            </td>
                                            <td class="border-bottom-0"
                                                style="width: 200px; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <p class="mb-0 fw-normal">{{ $v->description }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalPhoto" data-bs-photo="{{ $v->photo }}">
                                                    <i class="ti ti-photo"></i>
                                                </button>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $v->created_by }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $v->updated_by }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editVenue" data-bs-id="{{ $v->id }}"
                                                    data-bs-name="{{ $v->name }}"
                                                    data-bs-address="{{ $v->address }}"
                                                    data-bs-description="{{ $v->description }}"
                                                    data-bs-updated="{{ auth()->user()->name }}">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAlert" data-bs-id="{{ $v->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="border-bottom-0 text-center" colspan="7">
                                                <h6 class="fw-semibold mb-0">No data available</h6>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- End Table --}}

                        {{-- Modal --}}
                        <!-- Add Venue -->
                        <div class="modal fade" id="addVenue" tabindex="-1" aria-labelledby="addVenueLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addVenueLabel">Add Venue Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('owner-venue.store') }}" method="POST" custom-action
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ auth()->user()->name }}" name="created_by">
                                            <input type="hidden" value="-" name="updated_by">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ old('name') }}"
                                                    placeholder="Enter venue name">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    id="address" name="address" value="{{ old('address') }}"
                                                    placeholder="Enter venue address">
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                    placeholder="Enter venue description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="photo" class="form-label">Photo</label>
                                                <input type="file"
                                                    class="form-control @error('photo') is-invalid @enderror"
                                                    id="photo" accept=".jpg, .jpeg, .png" name="photo">
                                                @error('photo')
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
                        {{-- End Add Venue --}}

                        {{-- Edit Venue --}}
                        <div class="modal fade" id="editVenue" tabindex="-1" aria-labelledby="editVenueLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editVenueLabel">Edit Venue Form</h1>
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
                                                    id="nameEdit" name="name" placeholder="Enter venue name">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    id="addressEdit" name="address" placeholder="Enter venue address">
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionEdit" name="description"
                                                    placeholder="Enter venue description"></textarea>
                                                @error('description')
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
                        {{-- End Edit Venue --}}

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

                        {{-- Modal Photo --}}
                        <div class="modal fade" id="modalPhoto" tabindex="-1" aria-labelledby="modalPhotoLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalPhotoLabel">Venue Photo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="" id="photo" class="img-fluid" alt="Venue Photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Photo --}}

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
        const exampleModal = document.getElementById('editVenue')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const address = button.getAttribute('data-bs-address');
                const description = button.getAttribute('data-bs-description');
                const updated = button.getAttribute('data-bs-updated');

                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/owner-venue/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputName = exampleModal.querySelector('#nameEdit');
                const modalBodyInputAddress = exampleModal.querySelector('#addressEdit');
                const modalBodyInputDescription = exampleModal.querySelector('#descriptionEdit');
                const modalBodyInputUpdated = exampleModal.querySelector('#updatedEdit');

                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputAddress.value = address;
                modalBodyInputDescription.value = description;
                modalBodyInputUpdated.value = updated;
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
                document.getElementById('deleteForm').setAttribute('action', '/owner-venue/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
dd($orders);
