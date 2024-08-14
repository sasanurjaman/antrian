@extends('layouts.main')
@section('content')
@section('title', 'Daftar Pasien')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Daftar Pasien</li>
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
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>BPJS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td><a href="{{ route('patient.show', $patient->id)}}" class="badge badge-info"><i
                                    class="far fa-eye"></i></a></td>
                        <td>
                            @if ($patient->patient_image)
                            <img height="30px" class="img-circle elevation-2"
                                src="{{ asset('storage/' . $patient->patient_image)}}"
                                alt="{{ $patient->patient_name}}">
                            @else
                            <img height="30px" class="img-circle elevation-2" src="/dist/img/user.png"
                                alt="{{ $patient->patient_name }}">
                            @endif
                        </td>
                        <td>{{ $patient->patient_name}}</td>
                        <td>
                            @if ( $patient->patient_is_bpjs == 1)
                            Ya
                            @else
                            Bukan
                            @endif
                        </td>
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
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush