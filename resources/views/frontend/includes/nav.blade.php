<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-0">
    
	<!--<div class="container">-->
        
		<!--
		<x-utils.link
            :href="route('frontend.index')"
            :text="appName()"
            class="navbar-brand" />
		-->	
			
		<a href="{{ route('frontend.index') }}" class="navbar-brand">
			<img src="<?php echo URL::to('/') ?>/img/logo_1.jpg" alt="" width="80" height="50" style="padding:0px;margin:0px">
		</a>
		<br>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col-lg-9 col-md-9 col-sm-12 col-xs-12">
                @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                    <li class="nav-item dropdown">
                        <x-utils.link
                            :text="__(getLocaleName(app()->getLocale()))"
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownLanguageLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false" />

                        @include('includes.partials.lang')
                    </li>
                @endif

                @guest
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.auth.login')"
                            :active="activeClass(Route::is('frontend.auth.login'))"
                            :text="__('Login')"
                            class="nav-link" />
                    </li>

                    @if (config('boilerplate.access.user.registration'))
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.auth.register')"
                                :active="activeClass(Route::is('frontend.auth.register'))"
                                :text="__('Register')"
                                class="nav-link" />

                        </li>
                    @endif
                @else
					
					
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Proyectos</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
					   		<a href="/proyecto" class="dropdown-item">Registro de Proyectos</a>
							<a href="" class="dropdown-item">Consulta de Proyectos</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Expedientes</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
					   		<a href="" class="dropdown-item">Registro de Litigantes</a>
							<a href="/expediente" class="dropdown-item">Registro de Expedientes</a>
							<a href="" class="dropdown-item">Consulta de Expedientes</a>
							<a href="" class="dropdown-item">Seguimiento de Expedientes</a>
							<a href="" class="dropdown-item">Expedientes Pendientes y Por Vencer</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Inversiones</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
					   		<a href="" class="dropdown-item">Registro de Inversionistas</a>
							<a href="/inversiones" class="dropdown-item">Registro de Inversiones</a>
							<a href="" class="dropdown-item">Consulta de Inversiones</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Gastos</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
                            <a href="/ingresos_gastos" class="dropdown-item">Registro de Gastos</a>
                            <a href="" class="dropdown-item">Gastos Pendientes</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Consultas</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
                            <a href="" class="dropdown-item">Consulta de Pagos</a>
                            <a href="" class="dropdown-item">Consulta de Gastos</a>
							<a href="" class="dropdown-item">Busqueda de Expedientes Digitales</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Reportes</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
					   		<a href="" class="dropdown-item">Reporte</a>
                       </div>
                </li>
				
				<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownPrueba" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Mantenimiento</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownPrueba">
                            <a href="" class="dropdown-item">Personas</a>
                            <a href="empresa" class="dropdown-item">Empresas</a>
							<a href="" class="dropdown-item">Empleados</a>
							<a href="" class="dropdown-item">Materia</a>
							<a href="" class="dropdown-item">Documentos Administrativos</a>
							<a href="" class="dropdown-item">Organos Jurisdiccionales</a>
							<a href="" class="dropdown-item">Distrito Judiciales</a>
                       </div>
                </li>
				
					
                    <li class="nav-item dropdown">
                        <x-utils.link
                            href="#"
                            id="navbarDropdown"
                            class="nav-link dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            v-pre
                        >
                            <x-slot name="text">
                                <img class="rounded-circle" style="max-height: 20px" src="{{ $logged_in_user->avatar }}" />
                                {{ $logged_in_user->name }} <span class="caret"></span>
                            </x-slot>
                        </x-utils.link>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if ($logged_in_user->isAdmin())
                                <x-utils.link
                                    :href="route('admin.dashboard')"
                                    :text="__('Administration')"
                                    class="dropdown-item" />
                            @endif

                            @if ($logged_in_user->isUser())
                                <x-utils.link
                                    :href="route('frontend.user.dashboard')"
                                    :active="activeClass(Route::is('frontend.user.dashboard'))"
                                    :text="__('Dashboard')"
                                    class="dropdown-item"/>
                            @endif

                            <x-utils.link
                                :href="route('frontend.user.account')"
                                :active="activeClass(Route::is('frontend.user.account'))"
                                :text="__('My Account')"
                                class="dropdown-item" />

                            <x-utils.link
                                :text="__('Logout')"
                                class="dropdown-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <x-slot name="text">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                </x-slot>
                            </x-utils.link>
                        </div>
                    </li>
                @endguest
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
