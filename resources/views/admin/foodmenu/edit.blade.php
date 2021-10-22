<x-admin-master>
    @section('content')
    @if (session('updated-message'))
    <div class="alert alert-success">
        {{session('updated-message')}}
    </div>
    @elseif (session('not-updated-message'))
    <div class="alert alert-info">
        {{session('not-updated-message')}}
    </div>
    @endif
    <h1>Edit Food : {{$menu->title}}</h1>
    <div class="row">
        <div class="col-md-6 justify-content-between">
            <div class="card">
                {!! Form::open(['method'=>'POST', 'route'=>['admin.foodmenu.update', $menu], 'files'=>true]) !!}
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $menu->title, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $menu->description, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::number('price', $menu->price, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image', ['class'=> 'form-control-file']) !!}
                    </div>
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6 justify-content-between">
            <div class="card">
                <div class="card-body">
                    Existing Image:
                    <img src="{{$menu->image}}" alt="">
                </div>
            </div>
        </div>
    </div>

    @endsection

</x-admin-master>
