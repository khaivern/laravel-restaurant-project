<section class="section" id="menu">
    @if (session('added-to-cart-message'))
    <div class="alert alert-success">
        {{session('added-to-cart-message')}}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($menus as $menu)
                <div class="item">
                    <div style='background-image: url("{{$menu->image}}")' class='card'>
                        <div class="price">
                            <h6>${{$menu->price}}</h6>
                        </div>
                        <div class='info'>
                            <h1 class='title'>{{$menu->title}}</h1>
                            <p class='description'>{{$menu->description}}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                            class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['method'=>'POST', 'route'=>['user.foodmenu.store', $menu]]) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('quantity', 'Quantity') !!}
                        {!! Form::selectRange('quantity', 1, 10) !!}
                        {!! Form::submit('Add To Cart', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
