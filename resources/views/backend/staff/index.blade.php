@extends('layouts.master')

@section('content')
<div class="page-breadcrumb">
      <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                  <h4 class="page-title">Staff</h4>
                  <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                              <button type="button" class="btn btn-primary">
                                    <a href="{{ route('staff.create') }}" class="text-light">Create</a>
                              </button>

                        </nav>
                  </div>
            </div>
      </div>
</div>
<div class="container-fluid">
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <form class="form-horizontal">
                              <div class="card-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                          {{ Session::get('success') }}
                                          @php
                                          Session::forget('success');
                                          @endphp
                                    </div>
                                    @endif

                                    <table class="table">
                                          <thead>
                                                <tr>
                                                      <th scope="col">S.No.</th>
                                                      <th scope="col">First Name</th>
                                                      <th scope="col">Last Name</th>
                                                      <th scope="col">Email</th>
                                                      <th scope="col">Profile</th>
                                                      <th scope="col">Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($user as $key => $data)
                                                <tr>
                                                      <th scope="row">{{ ++$key }}</th>
                                                      <td>{{ $data->name }}</td>
                                                      <td>{{ $data->name }}</td>
                                                      <td>{{ $data->email }}</td>
                                                      @if($data->image)
                                                      <td><img src="{{ asset('assets/uploads/images/'.$data->image) }}" alt="image" height="50" width="50" /></td>
                                                      @else
                                                      <td>-----</td>
                                                      @endif
                                                      <td>
                                                            <form action="{{ route('staff.destroy',$data->id) }}" method="POST">

                                                                  <!-- <a class="btn btn-info" href="{{ route('staff.show',$data->id) }}">Show</a> -->

                                                                  <a class="btn btn-primary" href="{{ route('staff.edit',$data->id) }}">Edit</a>

                                                                  @csrf
                                                                  @method('DELETE')

                                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                      </td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>

                        </form>
                  </div>

            </div>

      </div>

</div>
@endsection