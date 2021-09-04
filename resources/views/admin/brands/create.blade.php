@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add brand
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('brands.index') }}">brands</a></li>
                <li class="active">Create</li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">brands</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <img src="{{ asset('noimage.jpg') }}"  alt="User Image" id="preview" height="100px" width="100px" onchange="previewImage(this)">
                                    </div>

                                    <div class="form-group">
                                        <div class="file">
                                            <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span>Browse logo</label>
                                            <input type="file" name="logo" accept="image/*" class="form-control" id="avatar" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="eg Judiciary">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Url</label>
                                        <input type="url" class="form-control" id="location" name="url" placeholder="brand site url">
                                    </div>

                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('brands.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('footerSection')

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function(){
            readURL(this);
        });
    </script>
@endsection
@endsection
