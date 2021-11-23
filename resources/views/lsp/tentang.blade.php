@extends('petugas')
@section('judul','About')
@section('body')
<body class="sb-nav-fixed">
    @include('navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @if (session('pesan'))
                    <div class="x_content bs-example-popovers">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <h5 class="text-center">{{ session('pesan') }}</h5>
                        </div>
                    </div>
                    @endif
                    <h3 class="mt-4">About</h3><br>
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <img src="{{asset("about/Sihab.png")}}" alt="">
                          </div>
                        <div class="col-sm-6">
                            <h5>Aplikasi ini dibuat oleh:</h5>
                            <table class="table">
                                  <tr>
                                    <th width="5%">Nama</th>
                                    <td width="95%">: Sihab Adi Wijaya</td>
                                  </tr>
                                  <tr>
                                    <th width="5%">NIM</th>
                                    <td width="95%">: 1931733025</td>
                                  </tr>
                                  <tr>
                                    <th width="5%">Tanggal</th>
                                    <td width="95%">: 2021-11-21</td>
                                  </tr>
                              </table>
                              
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
@endsection