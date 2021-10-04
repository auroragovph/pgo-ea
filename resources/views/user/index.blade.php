@extends('layouts.index')

@section('page-title', 'Users')


@section('page-action')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <x-ui.table.data-table title="User Lists">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Office</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ name($user->name) }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->office }}</td>
                        <td></td>
                    </tr>
                  @endforeach
                </tbody>
            </x-ui.table.data-table>    

        </div>
        <div class="col-md-4">
            @include('user.create')
        </div>
    </div>

    <x-include.form.ajax />
@endsection
