@extends('adminlte::page')

@section('title', 'Create FAQS')

@section('content_header')
    <h1>Create FAQ</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Create FAQ</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/faqs') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <!-- Session Flash Message -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="question">Name:</label>
                                    <input type="text" class="form-control" name="question" id="question" placeholder="FAQ" required>
                                </div>
                                <div class="form-group">
                                    <label for="answer">Answer:</label>
                                    <textarea class="form-control" name="answer" id="answer" rows="10" placeholder="Enter the Answer"></textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="form-group">
                                        <label for="answer">Answer:</label>
                                        <textarea name="answer" id="summernote" cols="30" rows="10">
                                        </textarea>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Create FAQ</button>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop

@section('css')
<link href="{{asset('template/assets/vendor/summernote/summernote.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Summernote -->
<script src="{{asset('template/assets/vendor/summernote/js/summernote.min.js')}}"></script>

<!-- Summernote init -->
<script src="{{asset('template/assets/js/summernote-init.js')}}"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 3,
        height: 100
    });
</script>
@stop