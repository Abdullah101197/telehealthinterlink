@extends('layout.mainlayout_admin',['activePage' => 'healthCareProvider'])

@section('title',__('All HealthCare Provider'))
@section('content')

<section class="section">
    @include('layout.breadcrumb',[
        'title' => __('HealthCare Provider'),
    ])
    @if (session('status'))
        @include('superAdmin.auth.status',[
            'status' => session('status')])
        @endif
    <div class="section_body">
    <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                @include('superAdmin.auth.exportButtons')
                @can('HealthCare Provider_add')
                    <a href="#" >{{ __('Add New') }}</a>
                    {{-- {{ url('healthCareProvider/create') }} --}}
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('email')}}</th>
                                @if (Gate::check('HealthCare_edit') || Gate::check('HealthCare_delete'))
                                    <th>{{__('Actions')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthCareProviders as $healthCareProvider)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="{{$healthCareProvider->id}}" id="{{$healthCareProvider->id}}" data-id="{{ $healthCareProvider->id }}" class="sub_chk">
                                        <label for="{{$healthCareProvider->id}}"></label>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                            <img class="avatar-img rounded-circle" src="{{$healthCareProvider->image }}" alt="Image"></a>

                                        {{$healthCareProvider->user->name}}



                                    </td>
                                    <td>
                                        {{$healthCareProvider->user_email}}
                                    </td>
                                   
                                   
                                   
                                    @if (Gate::check('healthCareProvider_edit') || Gate::check('healthCareProvider_delete'))
                                        <td>
                                            <a href="#" class="text-info">
                                                {{-- {{ url('healthCareProvider/'.$healthCareProvider->id.'/'.Str::slug($healthCareProvider->name).'/dashboard') }} --}}
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @can('healthCareProvider_edit')
                                            <a class="text-success" href="">
                                                {{-- {{url('healthCareProvider/'.$healthCareProvider->id.'/edit')}} --}}
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('healthCareProvider_delete')
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('healthCareProvider',{{ $healthCareProvider->id }})">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card_fotter">
                <input type="button" value="delete selected" onclick="deleteAll('healthCareProvider_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

@endsection
