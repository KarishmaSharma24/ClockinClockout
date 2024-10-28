@extends('layouts.master')

@section('content')
<div class="page-breadcrumb">
      <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                  <h4 class="page-title">Form Basic</h4>
                  <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                              <button type="button" class="btn btn-primary">
                                    <a href="{{ route('staff.index') }}" class="text-light">Back</a>
                              </button>

                        </nav>
                  </div>
            </div>
      </div>
</div>
<div class="container-fluid">

      <div class="row">
            <div class="col-md-12">
                  <div class="card p-4">
                        <form class="row g-3" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                              <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>

                              <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>

                              <div class="col-md-6">
                                    <label for="image" class="form-label">Upload Profile</label>
                                    <input type="file" name="image" id="image" class="form-control"  >
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>

                              <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
                              </div>
                        </form>
                  </div>

            </div>

      </div>
      
</div>
@endsection