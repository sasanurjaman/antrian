<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}} | Dokter</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
                </a>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- general form elements -->
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Data Dokter</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('doctor.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="doctor_name">Nama Lengkap</label>
                                                <input required name="doctor_name" type="text"
                                                    class="form-control @error('doctor_name') is-invalid @enderror"
                                                    value="{{ old('doctor_name')}}" id="doctor_name">
                                                @error('doctor_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_gender">Jenis Kelamin</label>
                                                <select id="doctor_gender" name="doctor_gender"
                                                    class="custom-select form-control @error('doctor_gender') is-invalid @enderror"
                                                    required>
                                                    <option value="">-- Silahkan Pilih --</option>
                                                    <option value="Laki-laki" {{ old('doctor_gender')=='Laki-laki'
                                                        ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ old('doctor_gender')=='Perempuan'
                                                        ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                                @error('doctor_gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_brithday">Tanggal Lahir</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input required name="doctor_brithday" type="text"
                                                        id="doctor_brithday"
                                                        class="form-control datetimepicker-input @error('doctor_brithday') is-invalid @enderror"
                                                        value="{{ old('doctor_brithday')}}">
                                                    <div class="input-group-append">
                                                        <label for="doctor_brithday" class="input-group-text"><i
                                                                class="far fa-calendar-alt"></i></label>
                                                    </div>
                                                    <input type="hidden" id="selected_date" name="selected_date">
                                                    @error('doctor_brithday')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_address">Alamat Lengkap</label>
                                                <textarea required name="doctor_address"
                                                    class="form-control @error('doctor_address')is-invalid @enderror"
                                                    rows="3">{{ old('doctor_address') }}</textarea>
                                                @error('doctor_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="doctor_specialization">Bidang Spesialisasi/Bagian</label>
                                                <input required name="doctor_specialization" type="text"
                                                    class="form-control @error('doctor_specialization') is-invalid @enderror"
                                                    value="{{ old('doctor_specialization')}}"
                                                    id="doctor_specialization">
                                                @error('doctor_specialization')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor_image">Foto Dokter</label>
                                                <div class="input-group">
                                                    <input required name="doctor_image" type="file"
                                                        class="custom-file-input @error('doctor_image')is-invalid @enderror"
                                                        id="doctor_image">
                                                    <label class="custom-file-label" for="doctor_image">Browse</label>
                                                </div>
                                                @error('doctor_image')
                                                <div class="invalid-feedback input-group-append">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <img class="img-fluid col-sm-3 img-pasien">
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

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

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
</body>

</html>