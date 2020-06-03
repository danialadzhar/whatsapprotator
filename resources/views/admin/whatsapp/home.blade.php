@extends('admin.layouts.app')

@section('title')
    Whatsapp | Brand Name
@endsection

@section('css')

@endsection

@section('content')
<h3>Whatsapp Management</h3>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="media">
            <a href="{{ url('admin/whatsapp/campaign') }}"><i class="fas fa-bullhorn fa-4x text-info"></i></a>
            <div class="media-body pl-3">
                <a href="{{ url('admin/whatsapp/campaign') }}" class="text-decoration-none"><h5 class="mt-0 text-dark">Create Campaign</h5></a>
                Create new campaign to filter whatsapp leads for purpose use.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <a href="{{ url('admin/whatsapp/rotator') }}"><i class="fab fa-whatsapp fa-4x text-success"></i></a>
            <div class="media-body pl-3">
                <a href="{{ url('admin/whatsapp/rotator') }}" class="text-decoration-none"><h5 class="mt-0 text-dark">Whatsapp Rotator</h5></a>
                Rotate list of whatsapp number and add new whatsapp number.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <a href="{{ url('admin/whatsapp/lead') }}"><i class="fas fa-users fa-4x text-primary"></i></a>
            <div class="media-body pl-3">
                <a href="{{ url('admin/whatsapp/lead') }}" class="text-decoration-none"><h5 class="mt-0 text-dark">Whatsapp Lead</h5></a>
                List of whatsapp leads from whatsapp owner phone number.
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection