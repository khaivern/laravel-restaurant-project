<x-admin-master>
    @section('content')
    @if (session('success-message'))
    <div class="alert alert-success">
        {{session('success-message')}}
    </div>
    @elseif (session('deleted-foodmenu-success'))
    <div class="alert alert-success">
        {{session('deleted-foodmenu-success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    Square image here
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'route'=>'foodmenu.store', 'files'=>true]) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::number('price', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image', ['class'=> 'form-control-file']) !!}
                    </div>
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-10">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">FoodMenu Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td><a href="{{route('admin.foodmenu.edit', $menu)}}">{{$menu->title}}</a>
                                        </td>
                                        <td style="white-space:pre-line;max-width:200px;">
                                            {{$menu->description}}</td>
                                        <td><img src="{{$menu->image}}" alt=""></td>
                                        <td>${{$menu->price}}</td>
                                        <td>
                                            {!! Form::open(['method'=>'POST', 'route'=>['admin.foodmenu.destroy',
                                            $menu]]) !!}
                                            @csrf
                                            @method('DELETE')
                                            {!! Form::submit('Delete', ['class'=>'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
</x-admin-master>
