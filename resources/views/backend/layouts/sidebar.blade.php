<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/gibi.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Bienestar Universitario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('home/') }}" class="nav-link active">
                        <i class='fas fa-home'></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kardex') }}" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <p>
                            Kardex
                        </p>
                    </a>
                </li>
                {{-- @if (auth()->user()->rol == 'admin') --}}
                @can('user.index')
                    <li class="nav-item">
                        <a href="{{ url('user/') }}" class="nav-link">
                            <i class="fas fa-user-tie"></i>
                            <p>
                                Usuarios
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('user/') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>Lista de usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('user/create') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-success"></i>
                                    <p>Crear Usuario</p>
                                </a>
                            </li>

                        </ul>

                    </li>
                @endcan
                {{-- @endif --}}

                {{-- (auth()->user()->rol == 'admin' || 'nutricion') --}}
                
                <li class="nav-item">
                    
                    <a href="{{ url('producto/') }}" class="nav-link ">
                        <i class="fas fa-carrot"></i>
                        <p>
                            Producto
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                  
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('producto.index')
                            <a href="{{ url('producto/') }}" class="nav-link ">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>
                                    Lista de Productos
                                </p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('medida/') }}" class="nav-link ">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>
                                    Medida
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('categoria/') }}" class="nav-link ">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>
                                    Categoria
                                </p>
                            </a>
                        </li>

                    </ul>

                </li>
                


                @can('pedido.index')
                <li class="nav-item">
                    <a href="{{ url('pedido/') }}"class="nav-link">
                        <i class="fas fa-cart-arrow-down"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>
                @endcan


                @can('semana.index')
                <li class="nav-item">
                    <a href="{{ url('semana/') }}"class="nav-link">
                        <i class="	fas fa-calendar-week"></i>
                        <p>
                            Semanas
                        </p>
                    </a>
                </li>
                @endcan


                @can('salida.index')

                {{-- @if (auth()->user()->rol == 'admin') --}}
                    <li class="nav-item">
                        <a href="{{ url('salida/') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Salidas</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('salida/') }}" class="nav-link ">
                                    <i class="nav-icon far fa-circle text-success"></i>
                                    <p>
                                        Registro de salidas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('salida/show') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>Numero de salidas</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    @endcan


                    @can('entrada.index')

                    <li class="nav-item">
                        <a href="{{ url('entrada/') }}" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                            <p>Entradas</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('entrada/') }}" class="nav-link ">
                                    <i class="nav-icon far fa-circle text-warning"></i>
                                    <p>
                                        Registro de entradas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('entrada/show') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-success"></i>
                                    <p>Numero de entradas</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    @endcan


                @can('salida.index')
                    <li class="nav-header">Otros</li>

                    <li class="nav-item">
                        <a href="{{ url('salida/nutricion') }}" class="nav-link">
                            <i class="fa fa-check"></i>
                            <p> Validar Salidas</p>
                        </a>
                    </li>
                @endcan


                @can('salida.nutricion')
                {{-- @endif --}}
                <li class="nav-item">
                    <a href="{{ url('salida/nutricion') }}" class="nav-link">
                        <i class="fas fa-sun"></i>
                        <p>Salida diaria</p>
                    </a>
                </li>
                @endcan




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
