@extends('adminlte::page')

@section('title', 'HomePage')

@section('content_header')
    <h1>Home Page</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profiles to display on the home page</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <form action="{{ url('/admin/update-homepage-profiles') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Update
                                                Profiles</button>
                                    </div>
                                    <div class="input-group-append ml-4">
                                        <a href="{{ url('/admin/profiles/sort') }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-sort"></i> Order Profiles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Messages to delete -->
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Profile Photo</th>
                                        <th>Select Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ print_r($members) }} --}}
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->f_name . ' ' . $member->l_name }}</td>
                                            <td>
                                                @if ($member->profile_photo)
                                                    <img src="{{ asset('storage/' . $member->profile_photo) }}"
                                                        alt="{{ $member->f_name . ' ' . $member->l_name }}"
                                                        class="img-fluid" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('template/assets/img/user_p.png') }}"
                                                        alt="{{ $member->f_name . ' ' . $member->l_name }}"
                                                        class="img-fluid" style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="profiles[]"
                                                        @if ($member->show_profile) checked @endif
                                                        value="{{ $member->id }}" id="profile-{{ $member->id }}"
                                                        {{ $member->homepage ? 'checked' : '' }}>
                                                    {{-- <label class="form-check-label" for="profile-{{$member->id}}">
                                        {{$member->f_name . ' ' . $member->l_name}}
                                    </label> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <style>
        /*Hacer que la scroll bar se vea aunque no se haga scroll*/
        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-track {
            background: #343a40;
        }

        ::-webkit-scrollbar-thumb {
            background: #c0c0c0;
        }
    </style>
@stop

@section('js')

@stop
