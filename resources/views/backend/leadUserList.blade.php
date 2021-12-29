@extends('backend.layouts.master')

@section('title','Dashboard')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Users</h5>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (Session::has('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    @if (Session::has('error'))
                                    <div class="alert alert-danger" role="success">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif
                                    <h4 style="float: left">Affiliate Link: {{ URL::to('/').'/user/'.$affiliate_id; }}</h4>
                                    <a style="float: right" href="{{ route('user.create') }}" class="btn btn-success">Add User</a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table style="text-align: center;font-size:13" class="table table-bordered data-table" id="">
                                        <thead>
                                            <tr class="brac-color-pink">
                                                <th>Id</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Advance Table Widget 4-->
                </div>
                <br>

            </div>
            <!--end::Row-->
            <!--begin::Row-->

            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection

@section('script')
<script>
$(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('UserList') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'password', name: 'password'},
        ]
    });
    
  });
</script>
@endsection