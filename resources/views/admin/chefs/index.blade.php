<x-admin-master>
    @section('content')


    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h1>Chef's Page</h1>
                    <img src="{{asset('assets/images/chefs-02.jpg')}}" alt="">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'route'=>'admin.chef.store', 'files' => true]) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('specialty', 'Specialty') !!}
                        {!! Form::text('specialty', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Image Profile') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                    </div>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Chefs Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="chefTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialty</th>
                                            <th>Profile Image</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialty</th>
                                            <th>Profile Image</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($chefs as $chef)
                                        <tr>
                                            <td>{{$chef->name}}</td>
                                            <td>{{$chef->specialty}}</td>
                                            <td><img src="{{$chef->image}}" alt=""></td>
                                            <td>
                                                {!! Form::open(['method'=>'POST', 'route'=>['admin.chef.destroy',
                                                $chef]]) !!}
                                                @csrf
                                                @method('DELETE')
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <button class="btn btn-warning"><a
                                                        href="{{route('admin.chef.edit', $chef)}}">Update</a></button>
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

    @endsection
</x-admin-master>
