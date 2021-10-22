<x-home-master :count="$count">
    @section('content')


    <section class="section" id="offers">
        <div class="container">
            @if (session('deleted-cart-success'))
            <div class="alert alert-success">

                {{session('deleted-cart-success')}}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cart Table</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="cartTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{$data->title}}</td>
                                                    <td>{{$data->price}}</td>
                                                    <td><img style="height: 100px" src="{{$data->image}}" alt=""></td>
                                                    <td>{{$data->quantity}}</td>
                                                    <td>
                                                        {!! Form::open(['method'=>'POST',
                                                        'route'=>['user.cart.destroy',
                                                        $data]]) !!}
                                                        @csrf
                                                        @method('DELETE')
                                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </td>

                                                    @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->
    @endsection

</x-home-master>
