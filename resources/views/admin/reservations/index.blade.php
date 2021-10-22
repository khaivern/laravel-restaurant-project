<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Reservations page</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reservations Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Number of guests</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Number of guests</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->email}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>{{$reservation->number_of_guest}}</td>
                                            <td>{{$reservation->date}}</td>
                                            <td>{{$reservation->time}}</td>
                                            <td>{{$reservation->message}}</td>
                                            {{-- <td>
                                                {!! Form::open(['method'=>'POST', 'route'=>['admin.reservation.destroy',
                                                $user]]) !!}
                                                @csrf
                                                @method('DELETE')
                                                {!! Form::submit('Delete', ['class'=>'btn btn-primary',
                                                (($user->usertype==='1')? 'disabled' : null)
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </td> --}}
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
    </div>

    @endsection
</x-admin-master>
