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
          <th scope="col">Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Assign By</th>
          <th scope="col">Date</th>
          <th scope="col"><i class="fas fa-cogs mx-auto"></i></th>
      </tr>
    </thead>
    <tbody>
        @foreach($whatsapp as $list)
            @foreach($whatsapp_list as $assign)
                @if($assign->whatsapp_id == $list->whatsapp_id)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->phonenumber }}</td>
                        <td>{{ $assign->name }}</td>
                        <td>{{ $list->created_at }}</td>
                        <td><center><a href="{{ url('admin/marketing/whatsapp/lead/delete') }}/{{ $list->lead_id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></a></center></td>
                    </tr>
                @endif
            @endforeach
          @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection