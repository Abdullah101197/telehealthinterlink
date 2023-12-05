@extends('layout.mainlayout_admin', ['activePage' => 'home'])

@section('title', __('Health Care Provider Home'))
@section('content')
    <section class="section">
        @include('layout.breadcrumb', [
            'title' => __('Health Care Provider Dashboard'),
        ])
        <div class="row">
            <div class="col">
                <h1>health care Provider member</h1>
            </div>
        </div>


    </section>
@endsection

@section('js')
@endsection
