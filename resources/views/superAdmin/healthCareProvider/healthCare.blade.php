@extends('layout.mainlayout_admin',['activePage' => 'healthCare'])

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
                    {{-- {{ url('healthCare/create') }} --}}
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
                            @foreach ($healthCares as $healthCare)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="{{$healthCare->id}}" id="{{$healthCare->id}}" data-id="{{ $healthCare->id }}" class="sub_chk">
                                        <label for="{{$healthCare->id}}"></label>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ url('healthCare/'.$healthCare->id.'/'.Str::slug($healthCare->name).'/dashboard') }}" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{ $healthCare->fullImage }}" alt="healthCare Image"></a>
                                        <a href="{{ url('healthCare/'.$healthCare->id.'/'.Str::slug($healthCare->name).'/dashboard') }}">{{ $healthCare->name }}</a>
                                    </td>
                                    <td>
                                        {{$healthCare->email}}
                                    </td>
                                   
                                   
                                   
                                    @if (Gate::check('healthCare_edit') || Gate::check('healthCare_delete'))
                                        <td>
                                            <a href="#" class="text-info">
                                                {{-- {{ url('healthCare/'.$healthCare->id.'/'.Str::slug($healthCare->name).'/dashboard') }} --}}
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @can('healthCare_edit')
                                            <a class="text-success" href="">
                                                {{-- {{url('healthCare/'.$healthCare->id.'/edit')}} --}}
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('healthCare_delete')
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('healthCare',{{ $healthCare->id }})">
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
                <input type="button" value="delete selected" onclick="deleteAll('healthCare_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

@endsection
