<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('roles', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            <div class="container">
                @if (Session::has('success-to-delete-role'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success-to-delete-role') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <p class="mt-5 ml-3 fw-bold fs-3">Manajemen Role</p>
                <a href="{{ url('/create-roles') }}" class="btn btn-primary ml-3 medicine-add-btn">Buat Role</a>
                <div class="container mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="row">No</th>
                                    <th scope="row">Nama Role</th>
                                    <th scope="row">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->role_name }}</td>
                                        <td>
                                            <a href="{{ url('/roles/' . $role->role_id . '/details') }}"
                                                class="btn btn-primary back-btn mr-2">Detail</a>

                                            <a href="{{ url('/update-roles/' . $role->role_id . '/edit') }}"
                                                class="btn btn-success mr-2">Edit</a>

                                            <form class="d-inline"
                                                action="{{ url('/delete-role/' . $role->role_id . '/delete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
