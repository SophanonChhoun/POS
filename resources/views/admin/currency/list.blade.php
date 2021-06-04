@extends("admin.layout.default")

@section("content")
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Currency</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ url('admin/currency/list') }}" class="fw-normal">Currency</a></li>
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
                <div class="table-responsive">
                    @include("admin.currency.table")
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
        function updatePrice(item)
        {
            $('#input' + item.id).keypress(function (e) {
                if (e.which == 13) {
                    var price = $("#input" + item.id).val();
                    axios.patch('http://127.0.0.1:8000/admin/currency/update/price/'+item.id, {
                        "price": price
                    })
                        .then(response => {
                            if(response.data.success) {
                                alert("You have already update price of " + item.name);
                            }else {
                                alert("You cannot update price of " + item.name);
                            }
                        })
                        .catch(error => console.error(error));
                }
            });
        }

        data.forEach(updatePrice);
    </script>
@endsection
