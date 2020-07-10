@extends('admin.layouts.app')

@section('title')
    Whatsapp Campaign | Brand Name
@endsection

@section('css')
    
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Whatsapp</li>
      <li class="breadcrumb-item active" aria-current="page">Campaign</li>
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

<div class="row">
    <div class="col-md-12">
        <form action="{{ url('admin/whatsapp/campaign/store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Comment</label>
                <textarea class="form-control" name="answer" placeholder="Enter Answer" rows="3"></textarea>
            </div>

            <h6>Whatsapp Number : </h6>
            @foreach($whatsapp_number as $whatsapp)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="whatsapp_id[]" value="{{ $whatsapp->whatsapp_id }}">
                    <label class="form-check-label">
                        {{ $whatsapp->name }}
                    </label>
                </div>
            @endforeach


            <button class="btn btn-danger mt-5"><i class="fas fa-plus"></i> Add New Campaign</button>
        </form>
    </div>
</div>


@endsection

@section('js')
    
@endsection