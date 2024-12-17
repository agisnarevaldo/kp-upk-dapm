@extends('pegawai.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Dashboard</h4>
                </div>
            </div>

        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if (session('success'))
                                    <script>
                                        alert("{{ session('success') }}");
                                    </script>
                                    <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif
                                <div class="col-6">
                                    <h5>Selamat Datang, {{ Str::title(Auth::user()->nama) }}</h5>
                                    <p class="text-muted">Aplikasi Manajemen Dana Bergulir DAPM</p>
                                </div>

                                <div class="col-5 ml-auto">
                                    <div>
                                        <img src="/template/dist/assets/images/widget-img.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Data Masyrakat Yang Mendaftar</h4>
                            <div id="donut_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Data Pengajuan Dana Bergulir</h4>
                            <div id="pie_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page-content-wrapper -->
@endsection

@section('js')
    <!-- Plugin Js-->
    <script src="/template/dist/assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- demo js-->
    <script>
        @php
            $total_spp = DB::Table('pengajuan')
                ->where('bentuk_usaha', 'SPP')
                ->get();
            $total_uep = DB::Table('pengajuan')
                ->where('bentuk_usaha', 'UEP')
                ->get();
            $total_laki = DB::Table('users')
                ->join('detail_user', 'detail_user.id_detail', '=', 'users.id')
                ->where('users.type', 'masyarakat')
                ->where('detail_user.gender', 'L')
                ->get();
            $total_perempuan = DB::Table('users')
                ->join('detail_user', 'detail_user.id_detail', '=', 'users.id')
                ->where('users.type', 'masyarakat')
                ->where('detail_user.gender', 'P')
                ->get();
        @endphp
        if ($("#pie_chart").length) {
            options = {
                chart: {
                    height: 320,
                    type: "pie"
                },
                series: [{{ $total_spp->count() }}, {{ $total_uep->count() }}],
                labels: ["SPP", "UEP"],
                colors: ["#3051d3", "#2fa97c", "#e4cc37"],
                legend: {
                    show: !0,
                    position: "bottom",
                    horizontalAlign: "center",
                    verticalAlign: "middle",
                    floating: !1,
                    fontSize: "14px",
                    offsetX: 0,
                    offsetY: -10
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            };
            (chart = new ApexCharts(document.querySelector("#pie_chart"), options)).render()
        }

        if ($("#donut_chart").length) {
            var chart;
            options = {
                chart: {
                    height: 320,
                    type: "donut"
                },
                series: [{{ $total_laki->count() }}, {{ $total_perempuan->count() }}],
                labels: ["Laki-Laki", "Perempuan"],
                colors: ["#2fa97c", "#f06543"],
                legend: {
                    show: !0,
                    position: "bottom",
                    horizontalAlign: "center",
                    verticalAlign: "middle",
                    floating: !1,
                    fontSize: "14px",
                    offsetX: 0,
                    offsetY: -10
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            };
            (chart = new ApexCharts(document.querySelector("#donut_chart"), options)).render()
        }
    </script>
@endsection
