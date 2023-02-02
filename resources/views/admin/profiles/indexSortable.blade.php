@extends('adminlte::page')

@section('title', 'Sort Profiles')

@section('content_header')
    <h1>Profiles</h1>
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
                            <!-- Add More Profiles -->
                            <a href="{{url('/admin/homepage')}}" class="btn btn-sm btn-success mr-4"><i class="fa fa-plus"></i> Add Profiles</a>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <!-- Messages to delete -->
                @if(session('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    </div>
                </div>
                @endif
                @if(session('error'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    </div>
                </div>
                @endif
                <div class="sortable_content" id="sortable">
                    @foreach($profiles as $profile)
                    <!-- Accordion Sortable -->
                    <div class="accordion" id="{{ $profile->id }}">
                        <div class="card">
                            <div class="card-header" >
                                <!-- SORT ICON -->
                                <div class="sort_icon">
                                    <i class="fas fa-sort"></i>
                                </div>
                                <h3 class="mb-0 card-title">
                                    {{$profile->f_name . ' ' . $profile->l_name}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- /.Accordion Sortable -->
                    @endforeach
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
        /* .card-header {
            cursor: move;
            display: flex;
            flex-direction: row;
            gap: 0.5rem;
            justify-content: start;


        } */


        .ui-sortable-handle > div > div {
            cursor: move;
            display: flex;
            flex-direction: row;
            gap: 0.5rem;
            justify-content: start;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    $( function() {
        $( "#sortable" ).sortable();
        //AJAX call to update the order of the coaches
        $( "#sortable" ).sortable({
            update: function( event, ui ) {
                $.ajax({
                    
                    type: 'POST',
                    url: '{{url('/admin/profiles/update-order')}}',
                    data: {
                        '_token': csrfToken,
                        'order': $( "#sortable" ).sortable( "toArray" )
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });
</script>
@stop