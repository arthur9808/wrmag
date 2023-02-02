@extends('adminlte::page')

@section('title', 'Sort Profiles')

@section('content_header')
    <h1>Total profiles: {{ $total_top_one_hundred }}</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">You can select:  <span>{{ 100 - $total_top_one_hundred }}</span> profiles</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append ml-4">
                                        <a href="{{ url('/admin/profiles/top-100') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Profiles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <!-- Session Flash Message -->
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h3>Sort Order -Top 100 Profiles</h3>
                                    <div class="sortable_content" id="sortable">
                                        @foreach ($top_one_hundred as $profile)
                                            <!-- Accordion Sortable -->
                                            <div class="accordion" id="{{ $profile->id }}">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <!-- SORT ICON -->
                                                        <div class="profile-information">
                                                            <div class="sort_icon">
                                                                <i class="fas fa-sort"></i>
                                                            </div>
                                                            <h3 class="mb-0 card-title">
                                                                {{ $profile->f_name . ' ' . $profile->l_name }}
                                                            </h3>
                                                        </div>
                                                        <!-- Delete Button -->
                                                        <div class="delete_button">
                                                            <form
                                                                action="{{ url('admin/profiles/' . $profile->id . '/delete-top-one-hundred') }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('PUT') }}
                                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.Accordion Sortable -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
        .ui-sortable-handle>div>div {
            cursor: move;
            display: flex;
            flex-direction: row;
            gap: 0.5rem;
            justify-content: start;
        }

        /*Acomodar el boton de eliminar al final del accordion*/
        .profile-information {
            display: flex;
            flex-direction: initial;
            gap: 30px;
            width: 50%;
        }

        .accordion>.card>.card-header {
            border-radius: 0;
            margin-bottom: 0;
            display: flex;
            justify-content: space-between;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        $(function() {
            $("#sortable").sortable();
            $("#sortable").sortable({
                update: function(event, ui) {
                    $.ajax({

                        type: 'POST',
                        url: '{{ url('/admin/profiles/update-top-one-hundrer') }}',
                        data: {
                            '_token': csrfToken,
                            'order': $("#sortable").sortable("toArray")
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script>
@stop
