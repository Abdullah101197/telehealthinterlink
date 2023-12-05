@extends('layout.mainlayout_admin', ['activePage' => 'home'])

@section('title', __('Aprrovel'))
@section('content')
    <section class="section">
        @include('layout.breadcrumb', [
            'title' => __('Aprrovel'),
        ])
<div class="row">
    <div class="col">
        <h2>User Approval</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form method="POST" action="{{ route('user.processApproval', $user->id) }}">
                                @csrf
                                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                <button type="submit" name="block" class="btn btn-danger">Block</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



    </section>
@endsection

@section('js')
@endsection
