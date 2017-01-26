<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">On wheels</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a
                                href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-user"></i>
                                    Cerrar sessión
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>                
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('login') }}">Iniciar sessión</a></li>
                        <li><a href="{{ route('register') }}">Regístrarme</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{ route('cart-show') }}">
                    <i class="fa fa-shopping-cart"></i>
                    Mi carrito
                    @if(Auth::check())
                        @if(!empty($cart))
                            @php $items = 0 @endphp
                            @foreach($cart as $product)
                               @php $items += $product->quantity @endphp
                            @endforeach
                            <div style="position: absolute; top: 0; right: -15px;">
                                <i style="font-size: 1.8em; top: 12.4px; right: 4px; color: #4b8ef9; position: absolute;" class="fa fa-circle-o"></i>
                                <p style="position: absolute; top: 14px; right: 11px; color: #4b8ef9;">{{ $items }}</p>                    
                            </div>
                        @endif
                    @endif
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>