@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                brands list
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">brands</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('brands.create') }}" class=" btn btn-success">Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ Storage::url($brand->logo) }}" height="80px" width="80px"></td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->url }}</td>
                                <td><a href="{{ route('brands.edit',$brand->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                <td>
                                    <form id="delete-form-{{ $brand->id }}" action="{{ route('brands.destroy',$brand->id) }}" style="display: none;" method="post">
                                        {{@csrf_field()}}
                                        {{@method_field('DELETE')}}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure you want to delete this brand?'))
                                            {event.preventDefault();
                                            document.getElementById('delete-form-{{ $brand->id }}').submit();
                                            }
                                            else{
                                            event.preventDefault();
                                            }
                                            "><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.no</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
@endsection
