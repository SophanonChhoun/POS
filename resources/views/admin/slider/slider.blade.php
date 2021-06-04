@extends('admin.layout.default')
@section("content")
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Slider</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ url('admin/slider/list') }}" class="fw-normal">Slider</a></li>
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
                        @include('admin.slider.form')
                        <div v-if="error">
                            @include('admin.layout.message')
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" @click="addBanner()">Add Banner</button>
                            <button type="submit" id="submit"
                                    class="btn btn-success save-cancel">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script>
        const data = @json($data);
        const categories = @json($categories);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/slider/edit.js') }}"></script>
@endsection