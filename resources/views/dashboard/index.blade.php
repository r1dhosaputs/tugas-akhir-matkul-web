@extends('main.main')
@section('page-body')
@section('am-title')
    Dashboard
@endsection
<div class="row row-sm">
    <div class="col-lg-4">
        <div class="card">
            <div id="rs1" class="wd-100p ht-200"></div>
            <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Jumlah Buku</h6>
                        {{-- <p class="tx-12">November 21, 2017</p> --}}
                    </div>
                    <a href="{{ route('buku.index') }}" class="tx-gray-600 hover-info"><i
                            class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">{{ $jumlah_buku }}</h2>
                {{-- <p class="tx-12 mg-b-0">Earnings before taxes.</p> --}}
            </div>
        </div><!-- card -->
    </div>

    <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
        <div class="card">
            <div id="rs2" class="wd-100p ht-200"></div>
            <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Jumlah Anggota</h6>
                        {{-- <p class="tx-12">November 20 - 27, 2017</p> --}}
                    </div>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">{{ $jumlah_anggota }}</h2>
                {{-- <p class="tx-12 mg-b-0">Earnings before taxes.</p> --}}
            </div>
        </div><!-- card -->
    </div><!-- col-4 -->

    <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
        <div class="card">
            <div id="rs3" class="wd-100p ht-200"></div>
            <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Jumlah Petugas</h6>
                        {{-- <p class="tx-12">November 1 - 30, 2017</p> --}}
                    </div>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">{{ $jumlah_petugas }}</h2>
                {{-- <p class="tx-12 mg-b-0">Earnings before taxes.</p> --}}
            </div>
        </div><!-- card -->
    </div><!-- col-4 -->
</div>



@endsection
