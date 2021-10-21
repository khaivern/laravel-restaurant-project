<x-admin-master>

    @section('content')
    {{-- <h1>Users</h1> --}}
    <div class="col-sm-9">
        @if (session('deleted-message'))
        <div class="alert alert-success">
            {{session('deleted-message')}}
        </div>
        @endif

        <div class="container-fluid">
            <div class="form-group">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {!! Form::open(['method'=>'POST', 'route'=>['admin.destroy', $user]]) !!}
                                            @csrf
                                            @method('DELETE')
                                            {!! Form::submit('Delete', ['class'=>'btn btn-primary',
                                            (($user->usertype==='1')? 'disabled' : null)
                                            ]) !!}
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

    {{-- Table for Users --}}



    @endsection

</x-admin-master>
