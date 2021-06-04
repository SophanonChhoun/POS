@extends("admin.layout.default")

@section("content")
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Sale</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ url('admin/sale/list') }}" class="fw-normal">Sale</a></li>
                    </ol>
                    <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                       class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Dashboard</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group has-search">
                            <form action="/admin/sale/list" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search min total" name="min" value="{{ request()->get('min') }}">
                                    <button type="submit" class="btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group has-search">
                            <form action="/admin/sale/list" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search max total" name="max" value="{{ request()->get('max') }}">
                                    <button type="submit" class="btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <a href="/admin/sale/create" class="btn btn-primary btn-lg" style="margin-bottom: 30px">Create</a>
                    </div>

                </div>
                <div class="table-responsive">
                    @include("admin.sale.table")
                    @include("admin.layout.pagination")
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        const data = @json($data);
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function status(item)
        {
            $(document).ready(function(){
                $("#myBtn"+item.id).click(function(){
                    $("#myModal"+item.id).modal('show');
                });
                $(".deleteClose"+item.id).click(function(){
                    $("#myModal"+item.id).modal('hide');
                });
                $("#itemStatus"+item.id).click(function(){
                    $("#status"+item.id).modal('show');
                });
                $(".statusClose"+item.id).click(function(){
                    $("#status"+item.id).modal('hide');
                });
            });
        }
        function paid(item)
        {
            $(document).ready(function(){
                $("#itemPaid"+item.id).click(function(){
                    $("#paid"+item.id).modal('show');
                });
                $(".paidClose"+item.id).click(function(){
                    $("#paid"+item.id).modal('hide');
                });
            });
        }
        function arrived(item)
        {
            $(document).ready(function(){
                $("#itemArrived"+item.id).click(function(){
                    $("#arrived"+item.id).modal('show');
                });
                $(".arrivedClose"+item.id).click(function(){
                    $("#arrived"+item.id).modal('hide');
                });
            });
        }
        data.data.forEach(status);
        data.data.forEach(paid);
        data.data.forEach(arrived);
    </script>
@endsection
