@extends('admin.layout.default')
@section("content")

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">User</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ url('admin/user/list') }}" class="fw-normal">User</a></li>
                    </ol>
                    <a href="{{ url('admin/dashboard') }}" target="_blank"
                       class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Dashboard</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body">
                <div id="editUser" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        @include('admin.user.form')
                        <div class="text-right">
                            <button type="submit" id="submit"
                                    class="btn btn-success save-cancel">Save</button>
                            <a href="{{ url('admin/user/list') }}"
                               class="btn btn-default save-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script>
        const data = @json($user);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/user/edit.js') }}"></script>
@endsection
