@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="/buku" class="btn btn-primary">Buku</a>
                    <a href="/member" class="btn btn-warning">Member</a>
                    <a href="/pinjam" class="btn btn-success">Pinjam</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection