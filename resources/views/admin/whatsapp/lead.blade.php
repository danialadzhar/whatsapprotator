@extends('admin.layouts.app')

@section('title')
    Whatsapp Leads | Eskayviecare
@endsection

@section('css')
    
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Marketing</a></li>
      <li class="breadcrumb-item active" aria-current="page">Whatsapp Leads</li>
    </ol>
</nav>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<table id="table" data-toggle="table" data-search="true" data-pagination="true" data-pagination-h-align="left" data-pagination-detail-h-align="right">
    <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col"><i class="fas fa-cogs mx-auto"></i></th>
      </tr>
    </thead>
    <tbody>
        @foreach($campaign as $whatsapp)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $whatsapp->title }}</td>
                <td>{{ $whatsapp->description }}</td>
                <td>{{ $whatsapp->status }}</td>
                <td>
                    <center><a href="{{ url('/') }}/{{ $whatsapp->whatsapp_campaign_id }}"><button class="btn btn-light btn-sm"><i class="fas fa-eye"></i></button></a></center>
                </td>
            </tr>
          @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection