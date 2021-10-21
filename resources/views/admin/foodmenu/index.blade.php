<x-admin-master>
    @section('content')
    @if (session('success-message'))
    <div class="alert alert-success">
        {{session('success-message')}}
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
                        {!! Form::text('description', null, ['class'=>'form-control']) !!}
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

    @endsection
</x-admin-master>
