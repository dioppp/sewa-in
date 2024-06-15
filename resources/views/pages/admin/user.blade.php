@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold">Users</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                            <div class="search-box">
                                <input type="text" data-table-id="" id="searchBox" data-action="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search User" />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add User
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
                                            <h6 class="fw-semibold mb-0">Email</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Address</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Birthdate</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Phone</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">1</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">Agus Kopling</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">guskop@bocil.caper</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">Malang</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">1 Januari 2023</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">081234567890</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editUser" data-bs-id="1" data-bs-name="Agus Kopling"
                                                data-bs-email="guskop@bocil.caper" data-bs-address="Malang"
                                                data-bs-birthdate="2023-01-01" data-bs-phone="081234567890">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                            <a href="" class="btn btn-danger">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- End Table --}}

                        {{-- Modal --}}
                        <!-- Add User -->
                        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addUserLabel">Add User Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" custom-action>
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    required placeholder="Enter your address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                                <input type="date" class="form-control" id="birthdate"
                                                    name="birthdate" required placeholder="Enter your birthdate">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                    required placeholder="Enter your phone number">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Add User --}}

                        {{-- Edit User --}}
                        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editUserLabel">Edit User Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" custom-action>
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="idEdit">

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="nameEdit" name="name"
                                                    required placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="emailEdit" name="email"
                                                    required placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="addressEdit"
                                                    name="address" required placeholder="Enter your address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                                <input type="date" class="form-control" id="birthdateEdit"
                                                    name="birthdate" required placeholder="Enter your birthdate">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phoneEdit" name="phone"
                                                    required placeholder="Enter your phone number">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Edit User --}}

                        {{-- End Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const exampleModal = document.getElementById('editUser')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const email = button.getAttribute('data-bs-email');
                const address = button.getAttribute('data-bs-address');
                const birthdate = button.getAttribute('data-bs-birthdate');
                const phone = button.getAttribute('data-bs-phone');

                // Update the modal's content.
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputName = exampleModal.querySelector('#nameEdit');
                const modalBodyInputEmail = exampleModal.querySelector('#emailEdit');
                const modalBodyInputAddress = exampleModal.querySelector('#addressEdit');
                const modalBodyInputBirthdate = exampleModal.querySelector('#birthdateEdit');
                const modalBodyInputPhone = exampleModal.querySelector('#phoneEdit');

                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputEmail.value = email;
                modalBodyInputAddress.value = address;
                modalBodyInputBirthdate.value = birthdate;
                modalBodyInputPhone.value = phone;
            })
        }
    </script>
@endpush
