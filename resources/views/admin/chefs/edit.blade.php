<x-admin-master>

    @section('content')
    <div class="row">
        <div class="col-lg-12">

            @if (session('chef-update-success'))
            <div class="alert alert-success">
                {{session('chef-update-success')}}
            </div>
            @elseif (session('chef-update-failed'))
            <div class="alert alert-warning">
                {{session('chef-update-failed')}}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1>Chef Edit Page</h1>
                    <img src="{{asset($chef->image)}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'route'=>['admin.chef.update', $chef], 'files'=>true]) !!}
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $chef->name, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('specialty', 'Specialty') !!}
                        {!! Form::text('specialty', $chef->specialty, ['class'=>'form-control']) !!}
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
    @endsection
</x-admin-master>
