@extends('layouts.main')
@section('content')
@section('title', 'Edit Profil')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profil</li>
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
            <h3 class="card-title">Form isian Edit Profil</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('doctor.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $doctor->user_id}}">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="doctor_name">Nama Lengkap</label>
                        <input required name="doctor_name" type="text"
                            class="form-control @error('doctor_name') is-invalid @enderror"
                            value="{{ old('doctor_name', $doctor->doctor_name)}}" id="doctor_name">
                        @error('doctor_name')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="doctor_gender">Jenis Kelamin</label>
                        <select id="doctor_gender" name="doctor_gender"
                            class="custom-select form-control @error('doctor_gender') is-invalid @enderror" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Laki-laki" {{ old('doctor_gender', $doctor->doctor_gender)=='Laki-laki' ?
                                'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ old('doctor_gender', $doctor->doctor_gender)=='Perempuan' ?
                                'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('doctor_gender')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="doctor_brithday">Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input required name="doctor_brithday" type="text" id="doctor_brithday"
                                class="form-control datetimepicker-input @error('doctor_brithday') is-invalid @enderror"
                                value="{{ old('doctor_brithday', $doctor->doctor_brithday)}}">
                            <div class="input-group-append">
                                <label for="doctor_brithday" class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></label>
                            </div>
                            <input type="hidden" id="selected_date" name="selected_date">
                            @error('doctor_brithday')
                            <div class="invalid-feedback input-group-append">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="doctor_address">Alamat Lengkap</label>
                        <textarea required name="doctor_address"
                            class="form-control @error('doctor_address')is-invalid @enderror"
                            rows="3">{{ old('doctor_address', $doctor->doctor_address) }}</textarea>
                        @error('doctor_address')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="doctor_specialization">Spesialisasi</label>
                        <input required name="doctor_specialization" type="text"
                            class="form-control @error('doctor_specialization') is-invalid @enderror"
                            value="{{ old('doctor_specialization', $doctor->doctor_specialization)}}"
                            id="doctor_specialization">
                        @error('doctor_specialization')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="doctor_image">Foto</label>
                        <div class="input-group">
                            <input name="doctor_image" type="file"
                                class="custom-file-input @error('doctor_image')is-invalid @enderror" id="doctor_image">
                            <label class="custom-file-label" for="doctor_image">Browse</label>
                        </div>
                        @error('doctor_image')
                        <div class="invalid-feedback input-group-append input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if ($doctor->doctor_image)
                        <img src="{{ $doctor->doctor_image }}" class="img-fluid col-sm-3 img-pasien">
                        @else
                        <img class="img-fluid col-sm-3 img-pasien">
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@push('css')
<link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
@endpush

@push('script')
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    // datefiker
        $(function() {
            $("#doctor_brithday").datepicker({
            dateFormat: "yy-mm-dd", // Change the date format as per your requirement
            onSelect: function(date) {
                $("#selected_date").val(date);
                }
            });
        });

    // preview image pasien
        $('#doctor_image').change(function() {
            const image = this.files[0];
            const readerImage = new FileReader();

            readerImage.readAsDataURL(image);
            readerImage.onload = function(e) {
                $('.img-pasien').attr('src', e.target.result);
            }
        })
</script>

@endpush