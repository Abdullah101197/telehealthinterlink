<div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">

        @auth
            @if (auth()->user()->hasRole('super admin'))
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">{{ __('Dashboard') }}</a></div>
            @endif
            @if (auth()->user()->hasRole('pharmacy'))
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">{{ __('Dashboard') }}</a></div>
            @endif
            @if (auth()->user()->hasRole('doctor'))
                <div class="breadcrumb-item active"><a href="{{ url('/doctor_home') }}">{{ __('Dashboard') }}</a></div>
            @endif
            @if (auth()->user()->hasRole('laboratory'))
                <div class="breadcrumb-item active"><a href="{{ url('/pathologist_home') }}">{{ __('Dashboard') }}</a></div>
            @endif
            @if (auth()->user()->hasRole('HealthCare_Provider'))
                <div class="breadcrumb-item active">
                    <a href="{{ url('/health/care/member/' . auth()->user()->name) }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            @endif
        @endauth

        @if (isset($url) && isset($urlTitle))
            <div class="breadcrumb-item active"><a href="{{ $url }}">{{ $urlTitle }}</a></div>
        @endif
        @if (isset($url1) && isset($urlTitle1))
            <div class="breadcrumb-item active"><a href="{{ $url1 }}">{{ $urlTitle1 }}</a></div>
        @endif
        <div class="breadcrumb-item">{{ $title }}</div>
    </div>
</div>
