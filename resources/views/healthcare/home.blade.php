@extends('layout.mainlayout_admin', ['activePage' => 'home'])

@section('title', __('HealthCare Home'))
@section('content')
    <section class="section">
        @include('layout.breadcrumb', [
            'title' => __('HealthCare Dashboard'),
        ])
        <div class="row">
            <div class="col">
                <h1>health care member</h1>
            </div>
        </div>


    </section>
@endsection

@section('js')
@endsection
