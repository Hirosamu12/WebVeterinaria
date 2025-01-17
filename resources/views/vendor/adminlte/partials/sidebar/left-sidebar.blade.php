<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

    {{-- User Panel --}}
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img 
                src="{{ 
                    Auth::user()->id_Rol == 1 ? asset('images/administrador.png') : 
                    (Auth::user()->id_Rol == 2 ? asset('images/veterinario.png') : 
                    asset('images/usuario.png')) 
                }}" 
                class="img-circle elevation-2" 
                alt="User Image"  style="background-color: rgb(252, 241, 241)";>
        </div>
        <div class="info">
            <h5 class="d-block" style="color: white;">
                        {{ Auth::user()->nombre_Usuario }} {{Auth::user()->apellido_Usuario}}
            </h5>
        </div>
    </div>
    


</aside>
