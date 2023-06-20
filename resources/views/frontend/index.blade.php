<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ appName() }}</title>
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
        <style>
			
			.prueba{
			
			}
			
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @stack('after-styles')
    </head>
    <body>
	
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        <!--
		@include('includes.partials.announcements')
		-->
		@include('frontend.layouts.app')
		
		<div class="container col-sm-12">
		
        <div id="app" class="">
            
			<div class="row mb-3">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<strong>
								<i style="padding:15px 0px" class="fas fa-tachometer-alt"></i> SMART RECOVERY GI-SAC 
							</strong>
						</div><!--card-header-->
		
						<div class="card-body">
							<div class="row">
		
								<div class="col-md-12 order-2 order-sm-1">
									<br />
									<div class="card-header">
											<i style="padding:15px 0px" class=""></i> Lema del trabajador de SMART RECOVERY GI-SAC 
											<strong>"</strong>
												Honestidad, Trabajo y lealtad
											<strong>"</strong>
									</div>
									<br />
									
									<div class="row">
										<div class="col">
											<div class="card mb-4">
												<div class="card-header">
													MISI&Oacute;N
												</div><!--card-header-->
		
												<div class="card-body">
													Brindar un servicio de calidad a los inversionistas dentro del proceso de Gesti&oacute;n Inmobiliaria,  propiciando la transparencia en todo el proceso.
												</div><!--card-body-->
											</div><!--card-->
										</div><!--col-md-6-->
									</div><!--row-->
		
									<div class="row">
										<div class="col">
											<div class="card mb-4">
												<div class="card-header">
													VISI&Oacute;N
												</div><!--card-header-->
		
												<div class="card-body">
													Ser la empresa modelo en Gesti&oacute;n Inmobiliaria y recuperaci&oacute;n de activos.
												</div><!--card-body-->
											</div><!--card-->
										</div><!--col-md-6-->
									</div><!--row-->
		
									
								</div><!--col-md-8-->
							</div><!-- row -->
						</div> <!-- card-body -->
					</div><!-- card -->
				</div><!-- row -->
			</div><!-- row -->
            
			
        </div><!--app-->
		
        
    </body>
</html>


