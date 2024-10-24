@extends('layouts.main')
@section('content')
@section('title', 'Jadwal Praktek')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Jadwal Doktor</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jadwal Praktek</li>
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
            <h4 class="d-inline">Jadwal Praktek</h4>

            <div class="card-tools">
                <button class="btn btn-primary modal-create"><i class="fas fa-plus"></i> Tambah Jadwal</button>
            </div>

        </div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Waktu Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <button class="badge badge-warning border-0" data-toggle="tooltip" data-placement="top"
                                title="Edit"
                                onclick="edit({{ $schedule->id}}, '{{$schedule->schedule_name}}', '{{ $schedule->schedule_date}}')"><i
                                    class="fas fa-edit"></i></button>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $schedule->schedule_name}}</td>
                        <td>{{ $schedule->schedule_date}}</td>
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
    <!-- /.card -->
</section>
<!-- /.content -->

<div class="modal fade" id="modal-schedule">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" class="method">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="form-group">
                        <label for="schedule_name">Nama Kegiatan</label>
                        <input required type="text" name="schedule_name" id="schedule_name"
                            class="form-control @error('schedule_name') is-invalid @enderror">
                        @error('schedule_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="schedule_date">Waktu Kegiatan</label>
                        <div class="input-group">
                            <input required name="schedule_date" type="text" id="schedule_date"
                                class="form-control @error('schedule_date') is-invalid @enderror"
                                value="{{ old('schedule_date')}}" autocomplete="off">
                            <label for="schedule_date" class="input-group-text"><i
                                    class="far fa-calendar-alt"></i></label>
                        </div>
                        @error('schedule_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary btn-modal"></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@push('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>

<script>
    // datetimeficker
    jQuery('#schedule_date').datetimepicker({
        startDate: "{{ now() }}"
    });

    // show modal-create
    $('.modal-create').click(function() {
        $('.modal-form').attr('action', "{{ route('schedule.store')}}");
        $('.method').val('POST');
        $('.modal-title').html('Tambah Jadwal');
        $('.btn-modal').html('Simpan Jadwal');
        $('#schedule_name').val('');
        $('#schedule_date').val('');
        $('#modal-schedule').modal('show');
    })

    // show modal-edit
    function edit(id, schedule_name, schedule_date) {
        $('.modal-form').attr('action', '/schedule/' + id);
        $('.method').val('PUT');
        $('.modal-title').html('Edit Jadwal');
        $('.btn-modal').html('Edit Jadwal');
        $('#schedule_name').val(schedule_name);
        $('#schedule_date').val(schedule_date);
        $('#modal-schedule').modal('show');
    }

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