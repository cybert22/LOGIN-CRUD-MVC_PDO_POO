
<!DOCTYPE html>
<html lang="es">
<head>
<title>Iniciar sesión | Regístrarse</title>
<link rel="icon" type="image/png" href="vista/images/favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="stylish Sign in and Sign up Form A Flat Responsive widget, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--online_fonts-->
	<link href="//fonts.googleapis.com/css?family=Sansita:400,400i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<!--//online_fonts-->
	<link href="vista/css/style.css" rel='stylesheet' type='text/css' media="all" /><!--stylesheet-->
</head>
<body>
<h1>Datos de Usuario</h1>
<div class="form-w3ls">
	<div class="form-head-w3l">
		<h2>Mk</h2>
	</div>
    <ul class="tab-group cl-effect-4">
        <li class="tab active"><a href="#signin-agile">Entrar</a></li>
		<li class="tab"><a href="#signup-agile">Registrarse</a></li>        
    </ul>
    <div class="tab-content">
        <div id="signin-agile">   
			<form action="" method="post">
				
				<p class="header">Usuario</p>
				<input type="text" name="usuarioIngreso" placeholder="Nombre de Usuario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" required="required">
				<p class="header">Contraseña</p>
				<input type="password" name="passwordIngreso" placeholder="Contraseña" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="required">
				
				<input type="checkbox" id="brand" value="">
				<label for="brand"><span></span> Recordarme</label>
				
				<input type="submit" class="sign-in" value="Iniciar Sesión">
              
            </form>
            <?php
            if(isset($_GET["action"])){

                if($_GET["action"]=="ok"){

                    echo "Registro exitoso";
                
                    
                }
            }
            if(isset($_GET["action"])){

                if($_GET["action"] == "fallo"){
            
                    echo "Falló al ingresar";
                
                }
            
            }

            ?>
		</div>
		<div id="signup-agile">   
			<form action="" method="post">
				
				<p class="header">Nombre de Usuario</p>
				<input type="text" name="usuarioRegistro" placeholder="Nombre de Usuario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nombre de Usuario';}" required="required">
				<p class="header">Nombre y Apellido</p>
				<input type="text" name="nombreRegistro" placeholder="Nombre y Apellido" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nombre y Apellido';}" required="required">
				<p class="header">Email</p>
				<input type="email" name="emailRegistro" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="required">
				
				<p class="header">Contraseña</p>
				<input type="password" name="passwordRegistro" placeholder="Contraseña" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contraseña';}" required="required">
				
				<!-- <p class="header">Confirmar Contraseña</p>
				<input type="password" name="password" placeholder="Confirmar Contraseña" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirmar Contraseña';}" required="required">
				 -->
				<input type="submit" class="register" value="Regístrarse">
			</form>
		</div> 
    </div><!-- tab-content -->
</div> <!-- /form -->	  

<?php

    #INSTANCIAMOS LA CLASE MvcControlador

    $registro = new MvcControlador();
    $registro->registroUsuarioControlador();

    $ingreso = new MvcControlador();
    $ingreso->ingresoUsuarioControlador();

      

?>