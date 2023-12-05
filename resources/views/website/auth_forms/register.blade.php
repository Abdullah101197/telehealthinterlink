<div class="w-full">
            <h1 class="font-fira-sans leading-10 font-normal text-3xl">{{__('Welcome,')}}</h1>
            <h1 class="font-fira-sans leading-10 font-medium text-3xl">{{__('Create New Account!')}}</h1>
            <div class="pt-5 flex">
                @if (old('from'))
                @if (old('from') == 'doctor')
                @php
                $active = 'doctor';
                @endphp
                @else
                @php
                $active = 'patient';
                @endphp
                @endif
                @else
                @php
                $active = 'patient';
                @endphp
                @php
                $active = 'Health_Member';
                @endphp
                @endif
                <div data-attr="doctor" class="signupDiv w-1/3 cursor-pointer py-1 ml-2 border border-[#D8D8D8] {{ $active == 'doctor' ? 'active' : '' }}">
                    <input {{ $active == 'doctor' ? 'checked' : '' }} id="bordered-radio-1" type="radio" value="doctor" name="signup_title" class="border-[#D8D8D8] cursor-pointer signup_title ml-2 text-blue-600">
                    <label for="bordered-radio-1" class="text-sm font-medium text-[#666666]">{{ __('Doctor') }}</label>
                </div>
                <div data-attr="patient" class="signupDiv w-1/3 cursor-pointer py-1 ml-2 border border-[#D8D8D8] {{ $active == 'patient' ? 'active' : '' }}">
                    <input {{ $active == 'patient' ? 'checked' : '' }} id="bordered-radio-2" type="radio" value="patient" name="signup_title" class="border-[#D8D8D8] cursor-pointer signup_title ml-2 text-blue-600">
                    <label for="bordered-radio-2" class="text-sm font-medium text-[#666666]">{{ __('Patient') }}</label>
                </div>
                <div data-attr="Health_Member" class="signupDiv sabir w-1/3 cursor-pointer py-1 ml-2 border border-[#D8D8D8] {{ $active == 'Health_Member' ? 'active' : '' }}">
                        <input {{ $active == 'Health_Member' ? 'checked' : '' }} id="bordered-radio-3" type="radio" value="Health_Member" name="signup_title" class="border-[#D8D8D8] cursor-pointer signup_title ml-2 text-blue-600">
                    <label for="bordered-radio-3" class="text-sm font-medium text-[#666666]">{{ __('HealthCare Provideru') }}</label>
                </div>
            </div>
            <div class="tab-content contentDisplay" id="tabs-tabContent">
                <div class="{{ $active == 'doctor' ?  'active' : 'hide' }} doctorDiv">
                    <form action="{{ url('doctorRegister') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="from" value="doctor">
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('First Name')}}</label>
                            <input type="text" name="doc_name" value="{{ old('doc_name') }}" class="@error('doc_name') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter First Name')}}">
                           
                            @error('doc_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('Surname')}}</label>
                            <input type="text" name="doc_surname" value="{{ old('doc_surname') }}" class="@error('doc_surname') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter Surname')}}">
                            @error('doc_surname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Email')}}</label>
                            <input type="email" name="doc_email" value="{{ old('doc_email') }}" class="@error('doc_email') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter email')}}">
                            @error('doc_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="phone" class="font-fira-sans text-black text-sm font-normal">{{__('Phone Number')}}</label>
                            <input type="number" name="doc_phone" value="{{ old('doc_phone') }}" class="@error('doc_phone') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light doc_phone" placeholder="{{__('Enter Phone Number')}}">
                            <input type="hidden" name="phone_code" value="+1">
                            @error('doc_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="password" class="font-fira-sans text-black text-sm font-normal">{{__('Create Password')}}</label>
                            <input type="password" name="doc_password" class="@error('doc_password') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter password')}}">
                            @error('doc_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="doc_dob" class="font-fira-sans text-black text-sm font-normal">{{__('Birth Date')}}</label>
                            <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                <input type="text" placeholder="dd/mm/yyyy" name="doc_dob" value="{{ old('doc_dob') }}" class="@error('doc_dob') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref />
                            </div>
                            @error('doc_dob')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="pt-3">
                            <div class="flex items-center mb-5">
                                <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Gender')}}</label>
                                <div class="ml-10 flex gap-10">
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="doc_gender" id="doc_gender_male" value="male">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_male">{{ __('Male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="doc_gender" id="doc_gender_female" value="female">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_female">{{ __('Female') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="pt-3">
                            <label for="resume" class="font-fira-sans text-black text-sm font-normal">{{__('Upload your Practising License')}}</label>
                            <input type="file" name="resume" class="@error('resume') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" required placeholder="{{__('Upload your Practising License')}}">
                            @error('resume')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <button type="submit" class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{__('Submit')}}</button>
                            <h1 class="font-fira-sans font-medium text-sm leading-5 pt-4 text-center">{{__('Already have an account?')}}
                                <a href="{{url('patient-login')}}" class="text-primary text-normal">{{__('Login')}}</a>
                            </h1>
                        </div>
                        
                        
                    </form>
                </div>
                <div class="{{ $active == 'patient' ?  'active' : 'hide' }} patientDiv">
                    <form action="{{ url('signUp') }}" method="post">
                        <input type="hidden" name="from" value="patient">
                        @csrf
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('First Name')}}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter First name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('Surname')}}</label>
                            <input type="text" name="surname" value="{{ old('surname') }}" class="@error('surname') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter Surname')}}">
                            @error('surname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Email')}}</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror  w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="phone" class="font-fira-sans text-black text-sm font-normal">{{__('Phone Number')}}</label>
                            <div class="">
                            <input type="number" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light phone" placeholder="{{__('Enter Phone Number')}}">
                            <input type="hidden" name="phone_code" value="+1">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                        <div class="pt-3">
                            <label for="password" class="font-fira-sans text-black text-sm font-normal">{{__('Create Password')}}</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter password')}}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="dob" class="font-fira-sans text-black text-sm font-normal">{{__('Birth Date')}}</label>
                            <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                <input type="text" placeholder="dd/mm/yyyy" name="dob" value="{{ old('dob') }}" class="@error('dob') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref />
                            </div>
                            @error('dob')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <div class="flex items-center mb-5">
                                <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Gender')}}</label>
                                <div class="ml-10 flex gap-10">
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender_male" value="male">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_male">{{ __('Male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender_female" value="female">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_female">{{ __('Female') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pt-3">
                            <button type="submit" class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{__('Submit')}}</button>
                            <h1 class="font-fira-sans font-medium text-sm leading-5 pt-4 text-center">{{__('Already have an account?')}}
                                <a href="{{url('patient-login')}}" class="text-primary text-normal">{{__('Login')}}</a>
                            </h1>
                        </div>
                        
                    </form>
                </div>





                <div class="{{ $active == 'Health_Member' ?  'active' : 'hide' }} healthMemberDiv">
                    <form action="{{ url('signUp') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="from" value="Health_Member">
                        @csrf
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('First Name')}}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter Health Care Provider First Name')}}">

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('Surname')}}</label>
                            <input type="text" name="surname" value="{{ old('surname') }}" class="@error('surname') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter Surname')}}">
                            @error('surname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                             <label class="font-fira-sans text-black text-sm font-normal">{{__('Preferred Name to call your provider')}}</label>
                            <input type="text" name="p_name" value="{{ old('p_name') }}" class="@error('p_name') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter Preferred Name to call your provider')}}">

                            @error('p_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Email')}}</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror  w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="phone" class="font-fira-sans text-black text-sm font-normal">{{__('Phone Number')}}</label>
                            <input type="number" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light heal_member_phone" placeholder="{{__('Enter Phone Number')}}">
                            <input type="hidden" name="phone_code" value="+1">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="password" class="font-fira-sans text-black text-sm font-normal">{{__('Create Password')}}</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter password')}}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="dob" class="font-fira-sans text-black text-sm font-normal">{{__('Birth Date')}}</label>
                            <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                <input type="text" placeholder="dd/mm/yyyy" name="dob" value="{{ old('dob') }}" class="@error('dob') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref />
                            </div>
                            @error('dob')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <div class="flex items-center mb-5">
                                <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Gender')}}</label>
                                <div class="ml-10 flex gap-10">
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender_male" value="male">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_male">{{ __('Male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender_female" value="female">
                                        <label class="form-check-label inline-block text-gray-800  cursor-pointer" for="gender_female">{{ __('Female') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="pt-3">
                            <label for="resume" class="font-fira-sans text-black text-sm font-normal">{{__('Upload your Practising License')}}</label>
                            <input type="file" name="resume" class="@error('resume') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" required placeholder="{{__('Upload your Practising License')}}">
                            @error('resume')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="pt-3">
                            <button type="submit" class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{__('Submit')}}</button>
                            <h1 class="font-fira-sans font-medium text-sm leading-5 pt-4 text-center">{{__('Already have an account?')}}
                                <a href="#" class="text-primary text-normal loginradio" >{{__('Login')}}</a>
                            </h1>
                        </div>
                    </form>
                </div>
            </div>
        </div>