@extends('layouts.master')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->


      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Library
                  </li>
                </ol> -->
              </nav>
            </div>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-cyan text-center">
                <h1 class="font-light text-white">
                  <i class="mdi mdi-view-dashboard"></i>
                </h1>
                <h6 class="text-white">Dashboard</h6>
              </div>
            </div>
          </div>
         
         
          
        </div>
      </div>

@endsection
