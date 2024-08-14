@extends('layouts.main')
@section('content')
@section('title', 'Daftar Dokter')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Daftar Dokter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="d-inline">Daftar Dokter</h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-create" href="{{ route('doctor.create')}}"><i
                        class="fas fa-plus"></i> Tambah
                    Dokter</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Spesialisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="{{ route('doctor.show', $doctor->id)}}" class="badge badge-info">
                                <i class="far fa-eye"></i>
                            </a>

                            <form action="{{ route('doctor.destroy', $doctor->id)}}" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 badge badge-danger"
                                    onclick="return confirm('Yakin ingin menghapus data {{ $doctor->doctor_name}} ?')"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>
                            @if ($doctor->doctor_image)
                            <img height="30px" class="img-circle elevation-2"
                                src="{{ asset('storage/'. $doctor->doctor_image)}}" alt="{{ $doctor->doctor_name}}">
                            @else
                            <img height="30px" class="img-circle elevation-2" src="{{ asset('/dist/img/user.png')}}"
                                alt="{{ $doctor->doctor_name}}">
                            @endif
                        </td>
                        <td>{{ $doctor->doctor_name}}</td>
                        <td>{{ $doctor->doctor_specialization}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>

</section>
<!-- /.content -->

<!-- modal -->
<div class="modal fade" id="modal-doctor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Akun Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add')}}" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="role_id" value="2">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name')}}" placeholder="username min 8 karakter" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email')}}" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password"
                            class="form-control @error('password')is-invalid @enderror"
                            placeholder="Password min 8 karakter" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback input-group-append">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input name="password_confirmation" type="password" class="form-control"
                            placeholder="password konfirmasi" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" checked>
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </div>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

@endsection
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('script')
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>

<script>
    // datatable
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    // show modal create
    $('.btn-create').click(function() {
        $('#modal-doctor').modal('show');
    })

    
    // toat fails seasion
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Gagal!',
                body: '{{ $error }}'
            })
        @endforeach
    @endif
    @if (session()->has('fails'))
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Gagal!',
            body: '{{ session('fails')}}'
        })
    @endif
    
    // toat success seasion
    @if (session()->has('success')) 
        $(document).Toasts('create', {
            class: 'bg-succes',
            title: 'Berhasil!',
            body: '{{ session('success')}}'
        })
    @endif
</script>
@endpush