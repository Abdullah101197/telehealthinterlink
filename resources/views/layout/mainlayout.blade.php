<!doctype HTML>
<html>

<head>
    @php
    $setting = App\Models\Setting::first();
    @endphp
    <title>{{$setting->business_name}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{$setting->favicon}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="stylesheet" href="{{url('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets_admin/css/select2.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/datatables.min.css') }}" />
    <script type="text/javascript" src="{{ url('assets_admin/js/sweetalert2@10.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/intlTelInput.css') }}" />

    @yield('css')
    <style>
        :root {
            --site_color: <?php echo $setting->website_color;
                            ?>;
            --site_color_hover: <?php echo $setting->website_color . '70';
                                ?>;
        }
    </style>
</head>

@if (session()->has('direction') && session()->get('direction') == 'rtl')
<link rel="stylesheet" href="{{ asset('css/rtl.css') }}">

<body dir="rtl">
    @else

    <body>
        @endif
        @include('layout.partials.navbar_website')

        @if(auth()->check())    
    
            @if(auth()->user()->verify == 0)
            <script>            
                var url =  window.location.origin+window.location.pathname;
                var to = url.lastIndexOf('/');
                to = to == -1 ? url.length : to;
                url2 = url.substring(0, to);
                var a = url2 + '/send_otp';
                console.log(a);
                if (window.location.origin + window.location.pathname != a)
                {
                    window.location.replace(a);
                }
            </script>
            @endif
        @endif
        <div class="main_content overflow-hidden">
                @yield('content')
        </div>
        @include('layout.partials.footer')
        

        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets_admin/js/datatables.min.js') }}"></script>
        <script src="{{ url('assets_admin/js/select2.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.js"></script>
        <script src="{{ url('assets/js/custom.js') }}"></script>
        <script src="{{ url('js/app.js') }}"></script>
        <script src="{{ url('assets/js/intlTelInput.min.js') }}"></script>
        

        <script>
    $(document).ready(function() {
        
        var radioVal = $('.signupDiv').children('input[type=radio]').val();
        if (radioVal == 'doctor') {
                $('.doctorDiv').show();
                $('.patientDiv').hide();
                $('.healthMemberDiv').hide();
            }
            if (radioVal == 'patient') {
                $('.doctorDiv').hide();
                $('.patientDiv').show();
                $('.healthMemberDiv').hide();
            }
            if (radioVal == 'Health_Member') {
                $('.doctorDiv').hide();
                $('.patientDiv').hide();
                $('.healthMemberDiv').show();
            }
        $('.signupDiv').click(function() {
            $('.signupDiv').removeClass('active');
            $(this).addClass('active');
            $(this).children('input[type=radio]').prop('checked', true);
            var radioVal = $(this).children('input[type=radio]').val();
            $('.invalid-feedback').text('');
            if (radioVal == 'doctor') {
                $('.doctorDiv').show();
                $('.patientDiv').hide();
                $('.healthMemberDiv').hide();
            }
            if (radioVal == 'patient') {
                $('.doctorDiv').hide();
                $('.patientDiv').show();
                $('.healthMemberDiv').hide();
            }
            if (radioVal == 'Health_Member') {
                $('.doctorDiv').hide();
                $('.patientDiv').hide();
                $('.healthMemberDiv').show();
            }
        });
    });
    const phoneInputField = document.querySelector(".phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["us", "co", "in", "de"],
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "{{url('assets/js/utils.js')}}",
    });
    phoneInputField.addEventListener("countrychange", function() {
        var phone_code = $('.phone').find('.iti__selected-dial-code').text();
        $('input[name=phone_code]').val('+' + phoneInput.getSelectedCountryData().dialCode);
    });
    const DocphoneInputField = document.querySelector(".doc_phone");
    const docphoneInput = window.intlTelInput(DocphoneInputField, {
        preferredCountries: ["us", "co", "in", "de"],
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "{{url('assets/js/utils.js')}}",
    });
    DocphoneInputField.addEventListener("countrychange", function() {
        $('input[name=phone_code]').val('+' + docphoneInput.getSelectedCountryData().dialCode);
    });
    const callInputField = document.querySelector(".heal_member_phone");
    const callphoneInput = window.intlTelInput(callInputField, {
        preferredCountries: ["us", "co", "in", "de"],
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "{{url('assets/js/utils.js')}}",
    });
    callInputField.addEventListener("countrychange", function() {
        $('input[name=phone_code]').val('+' + callphoneInput.getSelectedCountryData().dialCode);
    });
</script>

       <script>
       
       $('body').on('click','.signinbtn', function(){
              $('#popauthform').attr('action','#');
              $('.mainauthmodalcontent').show();
              $('.registermodalcontent').hide();
              $('.loginmodalcontent').hide();
          });
          
          $('body').on('click','.loginradio', function(){
              let loginType = $(this).val();
              let formaction = '#';
              if(loginType == 'doctor_login'){
                  formaction = "{{ route('doctor_login') }}";
              }else if(loginType == 'patient'){
                  formaction = "{{ route('patient_login') }}";
              }else if(loginType == 'Health_Member'){
                  formaction = "{{ route('patient_login') }}";
              }
              
              //change the form action
              $('#popauthform').attr('action',formaction);
              
              $('.mainauthmodalcontent').hide();
              $('.registermodalcontent').hide();
              $('.loginmodalcontent').show();
          });
          
          $('body').on('click','.authbackbtn', function(){
              $('#popauthform').attr('action','#');
              $('.mainauthmodalcontent').show();
              $('.loginmodalcontent').hide();
              $('.registermodalcontent').hide();
          });
          
           $('body').on('click','.authregbtn', function(){
              $('#popauthform').attr('action','#');
              $('.mainauthmodalcontent').hide();
              $('.loginmodalcontent').hide();
              $('.registermodalcontent').show();
           });
          
          
      </script>
      

        @yield('js')
    </body>

</html>