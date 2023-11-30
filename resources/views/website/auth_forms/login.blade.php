<div class="w-full">
            <div class="grid grid-cols-2 gap-4 items-center">
                <div>
                    <h4 class="font-fira-sans leading-10 font-normal ">{{__('Welcome Back,')}}</h4>
                    <h5 class="font-fira-sans leading-10 font-medium ">{{__('Login to get started!')}}</h5>
                </div>
                <div class="text-right">
                    <a href="#" data-te-ripple-init="" data-te-ripple-color="light" class="rounded-none bg-primary tracking-wide px-4 py-2 text-white font-fira-sans font-normal text-sm authbackbtn" style="">
                        <!-- Back Arrow SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline-block w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                            </path>
                        </svg>
                        Back
                    </a>
                </div>

            </div>

            <form action="" method="post" id="popauthform">
                @csrf
                <div class="pt-5">
                    <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Email')}}</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="pt-3">
                    <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Password')}}</label>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="{{__('Enter password')}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @if (session('error'))
                <div class="text-center">
                    <span class="custom_error  text-red font-fira-sans font-normal text-base mt-1">{{ session('error') }}</span>
                </div>
                @endif
                <div class="pt-10">
                    <button type="submit" class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{__('Login')}}</button>
                </div>
                <div class="flex justify-between pt-4">
                    <div class="font-fira-sans font-medium text-sm leading-5 text-primary text-normal" hidden>
                                                <a href="#" class="text-primary text-normal">{{__('Health Care Provider Login')}}</a>
                        <a href="{{url('/doctor/doctor_login')}}">{{__('Doctor Login')}}</a> 
                                                <a href="{{url('/doctor/doctor_login')}}">{{__('Patient Login')}}</a> 
                                </div>
                
                    <div class="font-fira-sans font-medium text-sm leading-5 text-primary text-normal">
                        <a href="{{url('/forgot_password')}}">{{__('Forgot Password?')}}</a>
                    </div>
                </div>
                <div class="flex justify-center my-2">
                    <div class="font-fira-sans font-medium text-sm leading-5 ">{{__('Don’t have an account?  ')}} <a href="#" class="text-primary text-normal authregbtn">{{__('Signup')}}</a>
                    </div>
                </div>

            </form>
        </div>