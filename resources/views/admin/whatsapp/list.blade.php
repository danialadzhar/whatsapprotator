@extends('admin.layouts.app')

@section('title')
    Whatsapp Number | Momentum Internet
@endsection

@section('css')
    
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Whatsapp</li>
      <li class="breadcrumb-item active" aria-current="page">Rotator</li>
    </ol>
</nav>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successful!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<a href="#" data-toggle="modal" data-target="#addwhatsapp"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Add Whatsapp</button></a>
<!-- Add Whatsapp Number -->
<div class="modal fade" id="addwhatsapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Whatsapp Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('admin/whatsapp/post') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" autofocus>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" class="form-control" name="phonenumber" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Number</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<table id="table" data-toggle="table" data-search="true" data-pagination="true" data-pagination-h-align="left" data-pagination-detail-h-align="right">
    <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Link</th>
          <th scope="col">Date</th>
          <th scope="col"><i class="fas fa-cogs mx-auto"></i></th>
      </tr>
    </thead>
    <tbody>
        @foreach($whatsapp as $list)
          <tr>
              <td>{{ $count++ }}</td>
              <td>{{ $list->name }}</td>
              <td>{{ $list->phonenumber }}</td>
              <td><a href="https://api.whatsapp.com/send?phone={{ $list->phonenumber }}">LINK</a></td>
              <td>{{ $list->created_at }}</td>
              <td>
                <center>
                  <a href="{{ url('admin/whatsapp/delete') }}/{{ $list->whatsapp_id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></a>
                </center>
              </td>
          </tr>
          @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection