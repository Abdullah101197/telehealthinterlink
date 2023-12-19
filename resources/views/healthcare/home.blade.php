@extends('layout.mainlayout_admin', ['activePage' => 'home'])

@section('title', __('Health Care Provider Home'))
@section('content')
    <section class="section">
        @include('layout.breadcrumb', [
            'title' => __('Health Care Provider Dashboard'),
        ])
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total Doctors') }}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{ $totalDoctor }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-folder"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total Appointment') }}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{ $totalAppointment }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file-pdf"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total Patients') }}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{ $totalUser }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                @php
                    $url = env('APP_URL');
                @endphp
                <h3>Invite Your Doctors</h3>
        
                <button onclick="copyLink('doctor')">Copy Invitation Link</button>
        
                <div>
                    <input type="text" value="{{ $url }}/healthCare/doctor/{{ $id }}/signup/{{ $p_name }}"
                        id="doctorInvitationLink" readonly>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                @php
                    $url = env('APP_URL');
                @endphp
                <h3>Invite Your Patient</h3>
        
                <button onclick="copyLink('patient')">Copy Invitation Link</button>
        
                <div>
                    <input type="text" value="{{ $url }}/healthCare/patient/{{ $id }}/signup/{{ $p_name }}"
                        id="patientInvitationLink" readonly>
                </div>
            </div>
        </div>
        

    </section>
@endsection

@section('js')

<script>
    function copyLink(userType) {
        // Select the appropriate input field based on userType
        var inputField = document.getElementById(userType + 'InvitationLink');

        // Select the text in the input field
        inputField.select();
        inputField.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Alert the user that the link has been copied
        alert('Invitation link for ' + userType + ' copied to clipboard: ' + inputField.value);
    }
</script>


@endsection
