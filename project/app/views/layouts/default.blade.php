<!DOCTYPE html>
<html>
<head>
    <title>Ujian Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/css/jquery.countdown.css')}}
    {{HTML::script('assets/js/jquery.min.js')}}
	{{HTML::script('assets/js/bootstrap.min.js')}}
	{{HTML::script('assets/ckeditor/ckeditor.js')}}
    <style>
        body{
            padding-top: 70px;
        }
        .error-display {        	
			color:#ff0000;
			font-style: italic;
			font-size: 11px;			
		}
		.top {
			margin: 0 auto;
			width: 600px;
			z-index: 99999;
			top:0;
			opacity: 1;
		   -webkit-transition: opacity 1.25s linear;
		      -moz-transition: opacity 1.25s linear;
		       -ms-transition: opacity 1.25s linear;
		        -o-transition: opacity 1.25s linear;
		           transition: opacity 1.25s linear;			
		}
    </style>
</head>
<body>
@include("ckeditor.ckeditor")

<div class="top navbar-fixed-top">
    @if(Session::has('message'))
	<div class="alert alert-danger">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Note! </strong>{{ Session::get('message') }}
	</div>                    
    @endif
</div>
<div class="page">
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Ujian Online</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
							@if (Auth::user()->is_admin)
								<li><a href="/mapel">Mapel</a></li>
								<li><a href="/soal">Soal</a></li>
								<li><a href="/nilai">Nilai</a></li>
								<li><a href="/user">User</a></li>
							@elseif (Auth::user()->is_guru === 1)
								<li><a href="/mapel">Mapel</a></li>
								<li><a href="/soal">Soal</a></li>
								<li><a href="/nilai">Nilai</a></li>
							@endif
						<li><a href="/ujian">Ujian</a></li>
                        <li><a href="/logout">Log Out</a></li>
                        <li><a href="/profil/{{Auth::user()->id}}"> {{ Auth::user()->username }} </a></li>	
                        @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Sign Up</a></li>
                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    @yield('body')
</div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
@show
</body>
</html>