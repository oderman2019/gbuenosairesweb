<?php
include("../../modelo/conexion.php");
include("../../informacion.php");
//-----------------------------------------------------------------POST-----------------------------------------------------------------------------------------------------------------------------------------------------------------
//EDITAR INFORMACION EMPRESA
if ($_POST["id"] == 1) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/logo/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT info_logo FROM informacion WHERE info_id=1;", $conexion));
		//@unlink("../../files/logo/".$refoto["info_logo"]."");
		$conextra = ", info_logo='" . $nombre . "'";
	}
	if (trim($_POST["nomEmpresa"]) == "" or trim($_POST["emailp"]) == "" or trim($_POST["telp"]) == "" or trim($_POST["pagina"]) == "") {
		echo '<script type="text/javascript">window.location.href="confirmacion.php?msj=200"</script>';
		exit();
	}
	mysql_query("UPDATE informacion SET info_nombre_empresa='" . mysql_real_escape_string($_POST["nomEmpresa"]) . "', info_email_principal='" . $_POST["emailp"] . "', info_telefono_principal='" . $_POST["telp"] . "',  info_direccion='" . $_POST["dir"] . "', info_whatsapp='" . $_POST["wp"] . "' WHERE info_id=1", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="informacion.php"</script>';
	exit();
}
//CREAR SLIDER
if ($_POST["id"] == 2) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/slider/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysql_query("INSERT INTO slider(sli_nombre, sli_imagen, sli_activo, sli_posicion)VALUES('" . $_POST["titulo"] . "','" . $nombre . "'," . $_POST["activo"] . ", '" . $_POST["posicion"] . "')", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="slider.php"</script>';
	exit();
}
//EDITAR SLIDER
if ($_POST["id"] == 3) {
	$conextra = "";

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/slider/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	if ($nombre != "") {
		$conextra = ", sli_imagen='" . $nombre . "'";
	}
	// echo "UPDATE slider SET sli_nombre='".$_POST["titulo"]."' ".$conextra." , sli_url='".$_POST["url"]."', sli_activo=".$_POST["activo"].", sli_posicion=".$_POST["posicion"]." WHERE sli_id=".$_GET["id"].";";
	mysql_query("UPDATE slider SET sli_nombre='" . $_POST["titulo"] . "' " . $conextra . " , sli_activo=" . $_POST["activo"] . ", sli_posicion=" . $_POST["posicion"] . " WHERE sli_id=" . $_GET["id"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="slider.php"</script>';
	exit();
}
//CREAR EVENTO
if ($_POST["id"] == 4) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/eventos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysql_query("INSERT INTO eventos(eve_nombre, eve_descripcion, eve_imagen, eve_fecha, eve_precio, eve_cupos, eve_inscripcion, eve_categoria, eve_lugar, eve_activo)VALUES('" . mysql_real_escape_string($_POST["titulo"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $nombre . "','" . $_POST["fecha"] . "','" . $_POST["presio"] . "','" . $_POST["cupos"] . "','" . $_POST["inscripcion"] . "','0','" . $_POST["lugar"] . "','" . $_POST["estado"] . "');", $conexion);
	$idIte = mysql_insert_id();
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}



	echo '<script type="text/javascript">window.location.href="eventos.php"</script>';
	exit();
}
//EDITAR EVENTO
if ($_POST["id"] == 5) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/eventos/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT eve_imagen FROM eventos WHERE eve_id=" . $_POST["idE"] . ";", $conexion));

		//@unlink("../../files/eventos/".$refoto["eve_imagen"]."");
		$conextra = ", eve_imagen='" . $nombre . "'";
	}
	mysql_query("UPDATE eventos SET eve_nombre='" . mysql_real_escape_string($_POST["titulo"]) . "', eve_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "' " . $conextra . " , eve_fecha='" . $_POST["fecha"] . "', eve_precio='" . $_POST["presio"] . "', eve_cupos='" . $_POST["cupos"] . "', eve_inscripcion='" . $_POST["inscripcion"] . "', eve_categoria='0', eve_lugar='" . $_POST["lugar"] . "', eve_activo='" . $_POST["estado"] . "' WHERE eve_id=" . $_POST["idE"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="eventos.php"</script>';
	exit();
}
//CREAR CATEGORIA
if ($_POST["id"] == 6) {
	mysql_query("INSERT INTO categorias(cat_nombre, cat_descripcion)VALUES('" . $_POST["titulo"] . "','" . $_POST["descripcion"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="categorias.php"</script>';
	exit();
}
//EDITAR CATEGORIA
if ($_POST["id"] == 7) {
	mysql_query("UPDATE categorias SET cat_nombre='" . $_POST["titulo"] . "', cat_descripcion='" . $_POST["descripcion"] . "' WHERE cat_id=" . $_POST["idC"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="categorias.php"</script>';
	exit();
}
//CREAR SUBCATEGORIA
if ($_POST["id"] == 8) {
	mysql_query("INSERT INTO sub_categorias(scat_nombre, scat_descripcion, scat_opcion)VALUES('" . $_POST["titulo"] . "','" . $_POST["descripcion"] . "','" . $_POST["categoria"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="subcategorias.php"</script>';
	exit();
}
//EDITAR SUBCATEGORIA
if ($_POST["id"] == 9) {
	mysql_query("UPDATE sub_categorias SET scat_nombre='" . $_POST["titulo"] . "', scat_descripcion='" . $_POST["descripcion"] . "', scat_opcion='" . $_POST["categoria"] . "' WHERE scat_id=" . $_POST["idSc"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="subcategorias.php"</script>';
	exit();
}

//CREAR PRODUCTO
if ($_POST["id"] == 10) {

	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$extension = end(explode(".", $_FILES['imagen']['name']));
	$nombre = uniqid('prod_') . "." . $extension;
	$destino = "../../files/productos/";
	@unlink($destino . "/" . $nombre);
	move_uploaded_file($archivo, $destino . "/" . $nombre);

	//ARCHIVO
	$archivoDoc = $_FILES['archivo']['tmp_name'];
	$extensionDoc = end(explode(".", $_FILES['archivo']['name']));
	$nombreDoc = uniqid('cata_') . "." . $extensionDoc;
	@unlink($destino . "/" . $nombreDoc);
	move_uploaded_file($archivoDoc, $destino . "/" . $nombreDoc);

	mysql_query("INSERT INTO productos(pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_activo, pro_posicion, pro_categoria,pro_destacado, pro_catalogo)VALUES('" . mysql_real_escape_string($_POST["titulo"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $_POST["precio"] . "','" . $nombre . "','" . $_POST["activo"] . "','" . $_POST["posicion"] . "','" . $_POST["categoria"] . "','" . $_POST["destacado"] . "','" . $nombreDoc . "')", $conexion);
	$idIte = mysql_insert_id();
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}


	echo '<script type="text/javascript">window.location.href="productos.php"</script>';
	exit();
}
//EDITAR PRODUCTO
if ($_POST["id"] == 11) {
	$conextra = "";

	if ($_FILES['imagen']['name'] != "") {
		//IMAGENES
		$archivo = $_FILES['imagen']['tmp_name'];
		$extension = end(explode(".", $_FILES['imagen']['name']));
		$nombre = uniqid('prod_') . "." . $extension;
		$destino = "../../files/productos/";
		@unlink($destino . "/" . $nombre);
		move_uploaded_file($archivo, $destino . "/" . $nombre);

		$conextra = ", pro_imagen='" . $nombre . "'";
	}

	if ($_FILES['archivo']['name'] != "") {

		//ARCHIVO
		$archivoDoc = $_FILES['archivo']['tmp_name'];
		$extensionDoc = end(explode(".", $_FILES['archivo']['name']));
		$nombreDoc = uniqid('cata_') . "." . $extensionDoc;
		@unlink($destino . "/" . $nombreDoc);
		move_uploaded_file($archivoDoc, $destino . "/" . $nombreDoc);

		mysql_query("UPDATE productos SET pro_catalogo='" . $nombreDoc . "' WHERE pro_id='" . $_POST["idR"] . "'", $conexion);
		if (mysql_errno() != 0) {
			echo mysql_error();
			exit();
		}
	}

	mysql_query("UPDATE productos SET pro_nombre='" . mysql_real_escape_string($_POST["titulo"]) . "', pro_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "', pro_precio='" . $_POST["precio"] . "' " . $conextra . " , pro_activo='" . $_POST["activo"] . "',pro_destacado ='" . $_POST["destacado"] . "', pro_posicion='" . $_POST["posicion"] . "', pro_categoria='" . $_POST["categoria"] . "' WHERE pro_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="productos.php"</script>';
	exit();
}
//CREAR VIDEOS
if ($_POST["id"] == 12) {
	mysql_query("INSERT INTO videos(vid_nombre, vid_descripcion, vid_video,vid_activo, vid_categoria, vid_pertenencia, vid_posicion)VALUES('" . mysql_real_escape_string($_POST["titulo"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . trim($_POST["video"]) . "','" . $_POST["activo"] . "',1,'" . $_POST["paginap"] . "','" . $_POST["posicion"] . "')", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="videos.php"</script>';
	exit();
}
//EDITAR VIDEOS
if ($_POST["id"] == 13) {
	mysql_query("UPDATE videos SET vid_nombre='" . mysql_real_escape_string($_POST["titulo"]) . "', vid_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "', vid_video='" . trim($_POST["video"]) . "', vid_activo='" . $_POST["activo"] . "', vid_pertenencia='" . $_POST["paginap"] . "', vid_posicion='" . $_POST["posicion"] . "' WHERE vid_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="videos.php"</script>';
	exit();
}
//CREAR USUARIOS
if ($_POST["id"] == 14) {
	mysql_query("INSERT INTO usuarios(usr_login, usr_clave, usr_nombre, usr_email, usr_tipo, usr_activo)VALUES('" . $_POST["login"] . "','" . $_POST["clave"] . "','" . $_POST["nombre"] . "','" . $_POST["email"] . "','" . $_POST["tipou"] . "','" . $_POST["estado"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="usuarios.php"</script>';
	exit();
}
//EDITAR USUARIOS
if ($_POST["id"] == 15) {
	mysql_query("UPDATE usuarios SET usr_login='" . $_POST["login"] . "', usr_clave='" . $_POST["clave"] . "', usr_nombre='" . $_POST["nombre"] . "', usr_email='" . $_POST["email"] . "', usr_tipo='" . $_POST["tipou"] . "', usr_activo='" . $_POST["estado"] . "' WHERE usr_id=" . $_POST["idR"] . "", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="usuarios.php"</script>';
	exit();
}
//CREAR REDES SOCIALES
if ($_POST["id"] == 16) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/icono-redsocial/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysql_query("INSERT INTO redes_sociales(red_nombre, red_icono, red_url)VALUES('" . $_POST["nombre"] . "','" . $nombre . "','" . $_POST["url"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="redes-sociales.php"</script>';
	exit();
}
//EDITAR REDES SOCIALES
if ($_POST["id"] == 17) {

	mysql_query("UPDATE redes_sociales SET red_nombre='" . $_POST["nombre"] . "', red_url='" . $_POST["url"] . "' WHERE red_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="redes-sociales.php"</script>';
	exit();
}
//CREAR PAGINAS
if ($_POST["id"] == 18) {
	if ($_FILES['logo']['name'] != "") {
		$destino = "../../files/bg-paginas/";

		$extension = end(explode(".", $_FILES['logo']['name']));
		$logo = uniqid('logo_') . "." . $extension;
		@unlink($destino . "/" . $logo);

		move_uploaded_file($_FILES['logo']['tmp_name'], $destino . "/" . $logo);
	}
	if ($_FILES['sonido']['name'] != "") {
		$sonido = $_FILES['sonido']['name'];
		$destino = "../../files/musica-paginas/";
		move_uploaded_file($_FILES['sonido']['tmp_name'], $destino . "/" . $sonido);
	}
	mysql_query("INSERT INTO paginas(pag_nombre, pag_descripcion, pag_activa, pag_predeterminada, pag_posicion, pag_background, pag_musica)VALUES('" . mysql_real_escape_string($_POST["nombre"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $_POST["estado"] . "','" . $_POST["predeterminada"] . "','" . $_POST["posicion"] . "','" . $logo . "','" . $sonido . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="paginas.php"</script>';
	exit();
}
//EDITAR PAGINAS
if ($_POST["id"] == 19) {
	if ($_FILES['logo']['name'] != "") {
		$destino = "../../files/bg-paginas/";

		$extension = end(explode(".", $_FILES['logo']['name']));
		$logo = uniqid('logo_') . "." . $extension;
		@unlink($destino . "/" . $logo);

		move_uploaded_file($_FILES['logo']['tmp_name'], $destino . "/" . $logo);
		$insertarFondo = ", pag_background='" . $logo . "'";
	} else {
		$insertarFondo = "";
	}

	if ($_FILES['sonido']['name'] != "") {
		$sonido = $_FILES['sonido']['name'];
		$destino = "../../files/musica-paginas/";
		move_uploaded_file($_FILES['sonido']['tmp_name'], $destino . "/" . $sonido);
		$insertarSonido = ", pag_musica='" . $sonido . "'";
	} else {
		$insertarSonido = "";
	}

	mysql_query("UPDATE paginas SET pag_nombre='" . mysql_real_escape_string($_POST["nombre"]) . "', pag_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "', pag_activa='" . $_POST["estado"] . "', pag_predeterminada='" . $_POST["predeterminada"] . "', pag_url='" . $_POST["url"] . "', pag_posicion='" . $_POST["posicion"] . "' " . $insertarFondo . " " . $insertarSonido . " WHERE pag_id=" . $_POST["idR"] . "", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="paginas.php"</script>';
	exit();
}
//CREAR SUBPAGINAS
if ($_POST["id"] == 20) {
	if ($_FILES['logo']['name'] != "") {
		$destino = "../../files/bg-paginas/";

		$extension = end(explode(".", $_FILES['logo']['name']));
		$logo = uniqid('logo_') . "." . $extension;
		@unlink($destino . "/" . $logo);

		move_uploaded_file($_FILES['logo']['tmp_name'], $destino . "/" . $logo);
	}

	mysql_query("INSERT INTO subpaginas(sub_nombre, sub_descripcion, sub_id_pagina, sub_activa, sub_posicion, sub_url, sub_imagen, sub_descripcion_corta)VALUES('" . mysql_real_escape_string($_POST["nombre"]) . "','" . $_POST["descripcion"] . "','" . $_POST["paginap"] . "','" . $_POST["estado"] . "','" . $_POST["posicion"] . "','paginas.php', '" . $logo . "', '" . mysql_real_escape_string($_POST["descripcionCorta"]) . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="subpaginas.php"</script>';
	exit();
}
//EDITAR SUBPAGINAS
if ($_POST["id"] == 21) {
	if ($_FILES['logo']['name'] != "") {
		$destino = "../../files/bg-paginas/";

		$extension = end(explode(".", $_FILES['logo']['name']));
		$logo = uniqid('logo_') . "." . $extension;
		@unlink($destino . "/" . $logo);

		move_uploaded_file($_FILES['logo']['tmp_name'], $destino . "/" . $logo);

		mysql_query("UPDATE subpaginas SET sub_imagen='" . $logo . "' WHERE sub_id=" . $_POST["idR"] . "", $conexion);
		if (mysql_errno() != 0) {
			echo mysql_error();
			exit();
		}
	}

	mysql_query("UPDATE subpaginas SET sub_nombre='" . mysql_real_escape_string($_POST["nombre"]) . "', sub_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "', sub_id_pagina='" . $_POST["paginap"] . "', sub_activa='" . $_POST["estado"] . "', sub_posicion='" . $_POST["posicion"] . "', sub_url='" . $_POST["url"] . "', sub_descripcion_corta='" . mysql_real_escape_string($_POST["descripcionCorta"]) . "' WHERE sub_id=" . $_POST["idR"] . "", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="subpaginas.php"</script>';
	exit();
}
//CREAR BLOG
if ($_POST["id"] == 22) {
	//IMAGENES
	$destino = "../../files/blog/";

	$archivo = $_FILES['imagen']['tmp_name'];

	$extension = end(explode(".", $_FILES['imagen']['name']));
	$nombre = uniqid('blog_') . "." . $extension;
	@unlink($destino . "/" . $nombre);


	move_uploaded_file($archivo, $destino . "/" . $nombre);

	mysql_query("INSERT INTO blog(blog_nombre, blog_descripcion, blog_categoria, blog_imagen, blog_fecha,blog_activo, blog_url)VALUES('" . mysql_real_escape_string($_POST["titulo"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $_POST["categoria"] . "','" . $nombre . "','" . $_POST["fecha"] . "','" . $_POST["activo"] . "','" . $_POST["url"] . "');", $conexion);
	$idIte = mysql_insert_id();
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}


	echo '<script type="text/javascript">window.location.href="blog.php"</script>';
	exit();
}
//EDITAR BLOG
if ($_POST["id"] == 23) {
	$destino = "../../files/blog/";

	$conextra = "";
	if ($_FILES['imagen']['name'] != "") {
		//IMAGENES
		$archivo = $_FILES['imagen']['tmp_name'];

		$extension = end(explode(".", $_FILES['imagen']['name']));
		$nombre = uniqid('blog_') . "." . $extension;
		@unlink($destino . "/" . $nombre);

		move_uploaded_file($archivo, $destino . "/" . $nombre);
		if ($nombre != "") {
			$refoto = mysql_fetch_array(mysql_query("SELECT blog_imagen FROM blog WHERE blog_id=" . $_POST["idR"] . ";", $conexion));
			if ($refoto["blog_imagen"] != "") {
				//@unlink("../../files/blog/".$refoto["blog_imagen"]."");
			}
			$conextra = ", blog_imagen='" . $nombre . "'";
		}
	}


	mysql_query("UPDATE blog SET blog_nombre='" . mysql_real_escape_string($_POST["titulo"]) . "', blog_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "', blog_categoria='" . $_POST["categoria"] . "' " . $conextra . " , blog_fecha='" . $_POST["fecha"] . "', blog_activo='" . $_POST["activo"] . "', blog_url='" . $_POST["url"] . "' WHERE blog_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="blog.php"</script>';
	exit();
}
//CREAR ANUNCIOS ESPECIALES
if ($_POST["id"] == 24) {
	mysql_query("INSERT INTO anuncio_especial(ape_nombre, ape_url, ape_ventana, ape_boton_titulo)VALUES('" . $_POST["nombre"] . "','" . $_POST["url"] . "','" . $_POST["modo"] . "','" . $_POST["tituloboton"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php"</script>';
	exit();
}
//MODIFICAR ANUNCIOS ESPECIALES
if ($_POST["id"] == 25) {
	mysql_query("UPDATE anuncio_especial SET ape_nombre='" . $_POST["nombre"] . "', ape_url='" . $_POST["url"] . "', ape_ventana='" . $_POST["modo"] . "', ape_boton_titulo='" . $_POST["tituloboton"] . "', ape_activo='" . $_POST["activo"] . "' WHERE ape_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php"</script>';
	exit();
}
//CREAR SITIOS RECOMENDADOS
if ($_POST["id"] == 26) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/recomendados/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	mysql_query("INSERT INTO sitios_recomendados(sit_nombre, sit_imagen, sit_url, sit_activo, sit_posicion)VALUES('" . $_POST["nombre"] . "','" . $nombre . "','" . $_POST["url"] . "','" . $_POST["activo"] . "','" . $_POST["posicion"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php"</script>';
	exit();
}
//EDITAR SITIOS RECOMENDADOS
if ($_POST["id"] == 27) {
	$conextra = "";
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/recomendados/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT sit_imagen FROM sitios_recomendados WHERE sit_id=" . $_POST["idR"] . ";", $conexion));
		if ($refoto["sit_imagen"] != "") {
			//@unlink("../../files/recomendados/".$refoto["sit_imagen"]."");
		}
		$conextra = ", sit_imagen='" . $nombre . "'";
	}


	mysql_query("UPDATE sitios_recomendados SET sit_nombre='" . $_POST["nombre"] . "' " . $conextra . ", sit_url='" . $_POST["url"] . "', sit_activo='" . $_POST["activo"] . "', sit_posicion='" . $_POST["posicion"] . "' WHERE sit_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php"</script>';
	exit();
}
//CREAR ANUNCIO
if ($_POST["id"] == 28) {
	//IMAGENES
	$archivo = $_FILES['imagen']['tmp_name'];
	$destino = "../../files/anuncios/";

	$extension = end(explode(".", $_FILES['imagen']['name']));
	$nombre = uniqid('an_') . "." . $extension;
	@unlink($destino . "/" . $nombre);

	move_uploaded_file($archivo, $destino . "/" . $nombre);

	//ARCHIVO
	$archivoDoc = $_FILES['archivo']['tmp_name'];

	$extensionDoc = end(explode(".", $_FILES['archivo']['name']));
	$nombreDoc = uniqid('an_') . "." . $extensionDoc;
	@unlink($destino . "/" . $nombreDoc);

	move_uploaded_file($archivoDoc, $destino . "/" . $nombreDoc);

	mysql_query("INSERT INTO anuncios(anu_titulo, anu_descripcion, anu_imagen, anu_categoria, anu_fecha, anu_archivo)VALUES('" . mysql_real_escape_string($_POST["nombre"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $nombre . "','" . $_POST["categoria"] . "',now(),'" . $nombreDoc . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="anuncios.php"</script>';
	exit();
}
//EDITAR ANUNCIOS
if ($_POST["id"] == 29) {

	if ($_FILES['archivo']['name'] != "") {
		//ARCHIVO
		$destino = "../../files/anuncios/";
		$archivoDoc = $_FILES['archivo']['tmp_name'];

		$extensionDoc = end(explode(".", $_FILES['archivo']['name']));
		$nombreDoc = uniqid('an_') . "." . $extensionDoc;
		@unlink($destino . "/" . $nombreDoc);

		move_uploaded_file($archivoDoc, $destino . "/" . $nombreDoc);

		mysql_query("UPDATE anuncios SET anu_archivo='" . $nombreDoc . "' WHERE anu_id=" . $_POST["idR"] . ";", $conexion);
		if (mysql_errno() != 0) {
			echo mysql_error();
			exit();
		}
	}

	$conextra = "";
	if ($_FILES['imagen']['name'] != "") {
		//IMAGENES
		$archivo = $_FILES['imagen']['tmp_name'];
		$destino = "../../files/anuncios/";

		$extension = end(explode(".", $_FILES['imagen']['name']));
		$nombre = uniqid('an_') . "." . $extension;
		@unlink($destino . "/" . $nombre);

		move_uploaded_file($archivo, $destino . "/" . $nombre);

		$conextra = ", anu_imagen='" . $nombre . "'";
	}

	mysql_query("UPDATE anuncios SET anu_titulo='" . mysql_real_escape_string($_POST["nombre"]) . "', anu_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "' " . $conextra . " , anu_categoria='" . $_POST["categoria"] . "' WHERE anu_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}

	echo '<script type="text/javascript">window.location.href="anuncios.php"</script>';
	exit();
}
//CREAR CLIENTES
if ($_POST["id"] == 30) {
	//IMAGENES
	/*
$archivo= $_FILES['imagen']['tmp_name']; 
$nombre= $_FILES['imagen']['name'];
$destino="../../files/cliente/";
move_uploaded_file($archivo, $destino ."/".$nombre);*/
	mysql_query("INSERT INTO clientes(cli_nombre, cli_email, cli_telefono)VALUES('" . $_POST["nombre"] . "','" . $_POST["email"] . "','" . $_POST["telefono"] . "')", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="clientes.php"</script>';
	exit();
}
//EDITAR CLIENTES
if ($_POST["id"] == 31) {
	mysql_query("UPDATE clientes SET cli_nombre='" . $_POST["nombre"] . "', cli_email='" . $_POST["email"] . "', cli_telefono='" . $_POST["telefono"] . "'  WHERE cli_id ='" . $_POST["idR"] . "'", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="clientes.php"</script>';
	exit();
}
//ACTUALIZAR PEDIDOS
if ($_POST["id"] == 32) {
	mysql_query("UPDATE pedidos SET ped_estado='" . $_POST["estado"] . "',ped_cedula='" . $_POST["cedula"] . "', ped_nombre='" . $_POST["nombre"] . "', ped_email='" . $_POST["email"] . "', ped_telefono='" . $_POST["tel"] . "', ped_direccion='" . $_POST["dir"] . "', ped_ciudad='" . $_POST["ciudad"] . "' WHERE ped_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="pedidos.php"</script>';
	exit();
}
//CREAR PLANES
if ($_POST["id"] == 33) {
	mysql_query("INSERT INTO tienda_paquetes(tpp_nombre, tpp_descripcion, tpp_valor, tpp_periocidad,tpp_destacado, tpp_nombre_boton)VALUES('" . $_POST["titulo"] . "','" . $_POST["des"] . "','" . $_POST["precio"] . "','" . $_POST["periocidad"] . "','" . $_POST["destacado"] . "','" . $_POST["nombreBoton"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="planes.php"</script>';
	exit();
}
//EDITAR PLANES
if ($_POST["id"] == 34) {
	mysql_query("UPDATE tienda_paquetes SET  tpp_nombre='" . $_POST["titulo"] . "', tpp_descripcion='" . $_POST["des"] . "', tpp_valor='" . $_POST["precio"] . "', tpp_periocidad='" . $_POST["periocidad"] . "', tpp_destacado='" . $_POST["destacado"] . "', tpp_nombre_boton='" . $_POST["nombreBoton"] . "' WHERE tpp_id=" . $_POST["idR"] . "", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="planes.php"</script>';
	exit();
}
//CREAR PLANES ITEMS
if ($_POST["id"] == 35) {
	mysql_query("INSERT INTO tienda_items(tpi_nombre, tpi_descripcion,tpi_paquete)VALUES('" . $_POST["titulo"] . "','" . $_POST["des"] . "','" . $_POST["paquete"] . "');", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_POST["paquete"] . '"</script>';
	exit();
}
//EDITAR PLANES ITEMS
if ($_POST["id"] == 36) {
	mysql_query("UPDATE tienda_items SET tpi_nombre='" . $_POST["titulo"] . "', tpi_descripcion='" . $_POST["des"] . "' WHERE tpi_id=" . $_POST["idR"] . "", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_POST["paquete"] . '"</script>';
	exit();
}
//AGREGAR LINKS DE CLIENTES
if ($_POST["id"] == 37) {
	$n = mysql_num_rows(mysql_query("SELECT cpm_id, cpm_id_cliente, cpm_material, cpm_tipo FROM clientes_materiales WHERE cpm_id_cliente=" . $_POST["idC"] . ";", $conexion));
	if ($n == 0) {
		mysql_query("INSERT INTO clientes_materiales(cpm_id_cliente, cpm_material, cpm_tipo)VALUES('" . $_POST["idC"] . "','" . $_POST["links"] . "','2');", $conexion);
	} else {
		mysql_query("UPDATE clientes_materiales SET cpm_material='" . $_POST["links"] . "' WHERE cpm_id_cliente=" . $_POST["idC"] . ";", $conexion);
		//echo "UPDATE clientes_materiales SET cpm_material=".$_POST["links"]." WHERE cpm_id_cliente=".$_POST["idC"].";";
	}
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="cliente-materiales.php?id=' . $_POST["idC"] . '"</script>';
	exit();
}
//EDITAR CONFIGURACION
if ($_POST["id"] == 38) {
	mysql_query("UPDATE configuracion SET conf_fondo_encabezado='" . $_POST["fondoEncabezado"] . "', conf_fondo_prefooter='" . $_POST["fondoAntePie"] . "', conf_fondo_footer='" . $_POST["fondoPie"] . "', conf_fondo_anuncio_especial='" . $_POST["fondoAnuncioEspecial"] . "', conf_color_boton_menu='" . $_POST["colorBoton"] . "', conf_color_boton_anuncio='" . $_POST["colorAnuncio"] . "', conf_titulo_boletin='" . $_POST["tituloBoletin"] . "', conf_texto_boletin='" . $_POST["textoBoletin"] . "', conf_activo_clientes='" . $_POST["mostrarClientes"] . "', conf_activo_productos_destacados='" . $_POST["mostrarProductos"] . "', conf_boton_boletin='" . $_POST["botonBoletin"] . "', conf_logo_posicion='" . $_POST["pLogo"] . "', conf_noti_productos='" . $_POST["notiProductos"] . "', conf_noti_blog='" . $_POST["notiBlog"] . "', conf_noti_eventos='" . $_POST["notiEvento"] . "', conf_noti_eventos_inscripcion='" . $_POST["notiEventoInscripcion"] . "', conf_opacidad_menu='" . $_POST["OpacidadMenu"] . "', conf_opacidad_prefooter='" . $_POST["OpacidadPreFooter"] . "', conf_opacidad_footer='" . $_POST["OpacidadFooter"] . "' WHERE conf_id=1", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="configuracion.php"</script>';
	exit();
}
//EDITAR PERFIL
if ($_POST["id"] == 39) {
	mysql_query("UPDATE usuarios SET usr_clave='" . mysql_real_escape_string($_POST["clave"]) . "', usr_nombre='" . $_POST["nombre"] . "', usr_email='" . $_POST["email"] . "' WHERE usr_id=" . $_POST["usuarioActual"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="perfil.php"</script>';
	exit();
}
//EDITAR PAGINAS POR SECCIONES
if ($_POST["id"] == 40) {
	mysql_query("UPDATE paginas_secciones SET pps_menu='" . $_POST["menu"] . "', pps_slider='" . $_POST["slider"] . "', pps_theme='" . $_POST["theme"] . "', pps_prefooter='" . $_POST["prefooter"] . "', pps_footer='" . $_POST["footer"] . "', pps_mapa='" . $_POST["mapa"] . "', pps_modal='" . $_POST["modal"] . "' WHERE pps_id=" . $_POST["idR"] . ";", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="paginas-config.php?idR=' . $_POST["idR"] . '"</script>';
	exit();
}
//EDITAR MODAL
if ($_POST["id"] == 41) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/modal/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT mod_img FROM modal WHERE mod_id=1;", $conexion));
		//@unlink("../../files/modal/".$refoto["mod_img"]."");
		$conextra = ", mod_img='" . $nombre . "'";
	}
	mysql_query("UPDATE modal SET mod_titulo='" . mysql_real_escape_string($_POST["titulo"]) . "', mod_contenido='" . mysql_real_escape_string($_POST["descripcion"]) . "', mod_link='" . $_POST["url"] . "', mod_activo='" . $_POST["activo"] . "' " . $conextra . " WHERE mod_id=1", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="modal.php"</script>';
	exit();
}

//CREAR PORTAFOLIO
if ($_POST["id"] == 42) {
	$logo = $_FILES['imagen']['name'];
	$destino = "../../files/portafolio/";
	move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . "/" . $logo);
	mysql_query("INSERT INTO portafolio(por_nombre, por_descripcion, por_imagen, por_producto)VALUES('" . mysql_real_escape_string($_POST["nombre"]) . "','" . mysql_real_escape_string($_POST["descripcion"]) . "','" . $logo . "', '" . $_POST["producto"] . "')", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="portafolio.php?producto=' . $_POST["producto"] . '"</script>';
	exit();
}

//EDITAR PORTAFOLIO
if ($_POST["id"] == 43) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['imagen']['tmp_name'];
	$nombre = $_FILES['imagen']['name'];
	$destino = "../../files/portafolio/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT por_imagen FROM portafolio WHERE por_id='" . $_POST["idR"] . "'", $conexion));
		//@//@unlink("../../files/portafolio/".$refoto["por_imagen"]."");
		$conextra = ", por_imagen='" . $nombre . "'";
	}
	mysql_query("UPDATE portafolio SET por_nombre='" . mysql_real_escape_string($_POST["nombre"]) . "', por_descripcion='" . mysql_real_escape_string($_POST["descripcion"]) . "' " . $conextra . " WHERE por_id='" . $_POST["idR"] . "'", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="portafolio.php?producto=' . $_POST["producto"] . '"</script>';
	exit();
}
//EDITAR MODAL
if ($_POST["id"] == 44) {
	//IMAGENES
	$conextra = "";
	$archivo = $_FILES['logo']['tmp_name'];
	$nombre = $_FILES['logo']['name'];
	$destino = "../../files/banner-publicitarios/";
	move_uploaded_file($archivo, $destino . "/" . $nombre);
	if ($nombre != "") {
		$refoto = mysql_fetch_array(mysql_query("SELECT ban_imagen FROM banner_publicitarios WHERE ban_id='" . $_REQUEST["idR"] . "'", $conexion));
		$conextra = ", ban_imagen='" . $nombre . "'";
	}
	mysql_query("UPDATE banner_publicitarios SET ban_url='" . $_POST["url"] . "', ban_activo='" . $_POST["activo"] . "' " . $conextra . " WHERE ban_id='" . $_REQUEST["idR"] . "'", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="banner-publicitarios.php?idR=' . $_REQUEST["idR"] . '"</script>';
	exit();
}


//===============================================================================================================================================================================================================================================GET====================GET=========GET===GET====GET======GET===GET====GET====GET=======GET================================================================================================
//ELIMINAR EVENTO
if ($_GET["get"] == 1) {
	$rimg = mysql_fetch_array(mysql_query("SELECT * FROM eventos WHERE eve_id='" . $_GET["idE"] . "'", $conexion));
	mysql_query("DELETE FROM eventos_inscripcion WHERE epi_id_evento='" . $_GET["idE"] . "'", $conexion);
	mysql_query("DELETE FROM eventos WHERE eve_id='" . $_GET["idE"] . "'", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	//@unlink("../../files/eventos/".$rimg["eve_imagen"]);
	$ruta = "../../files/eventos/" . $_GET["idE"] . "/";  //nombre de la carpeta
	$ruta2 = "../../files/eventos/" . $_GET["idE"] . "/thumbnail/";  //nombre de la carpeta
	$images = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);
	if (count($images) > 0) {
		foreach ($images as $img) {
			//@unlink($img);
		}
	}
	$images2 = glob("$ruta2{*.gif,*.jpg,*.png}", GLOB_BRACE);
	if (count($images2) > 0) {
		foreach ($images2 as $img2) {
			//@unlink($img2);
		}
	}
	rmdir("../../files/eventos/" . $_GET["idE"] . "/thumbnail");
	rmdir("../../files/eventos/" . $_GET["idE"]);


	echo '<script type="text/javascript">window.location.href="eventos.php";</script>';
	exit();
}
//DESACTIVAR CATEGORIA
if ($_GET["get"] == 2) {

	mysql_query("UPDATE categorias SET cat_activa=2 WHERE cat_id='" . $_GET["idC"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="categorias.php";</script>';
	exit();
}
//ACTIVAR CATEGORIA
if ($_GET["get"] == 11) {

	mysql_query("UPDATE categorias SET cat_activa=1 WHERE cat_id='" . $_GET["idC"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="categorias.php";</script>';
	exit();
}
//ELIMINAR SUBCATEGORIA
if ($_GET["get"] == 3) {
	mysql_query("DELETE FROM anuncios WHERE anu_categoria='" . $_GET["idsC"] . "'", $conexion);
	mysql_query("DELETE FROM blog WHERE blog_categoria='" . $_GET["idsC"] . "'", $conexion);
	mysql_query("DELETE FROM eventos WHERE eve_categoria='" . $_GET["idsC"] . "'", $conexion);
	mysql_query("DELETE FROM productos WHERE pro_categoria='" . $_GET["idsC"] . "'", $conexion);
	mysql_query("DELETE FROM videos WHERE vid_categoria='" . $_GET["idsC"] . "'", $conexion);

	mysql_query("DELETE FROM sub_categorias WHERE scat_id='" . $_GET["idsC"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="subcategorias.php";</script>';
	exit();
}
//ELIMINAR PRODUCTOS
if ($_GET["get"] == 4) {
	$refoto = mysql_fetch_array(mysql_query("SELECT pro_imagen FROM productos WHERE pro_id=" . $_GET["idp"] . ";", $conexion));
	//@unlink("../../files/productos/".$refoto["pro_imagen"]."");
	mysql_query("DELETE FROM productos WHERE pro_id='" . $_GET["idp"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="productos.php";</script>';
	exit();
}
//ELIMINAR VIDEOS
if ($_GET["get"] == 5) {
	mysql_query("DELETE FROM videos WHERE vid_id='" . $_GET["idv"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="videos.php";</script>';
	exit();
}
//ELIMINAR USUARIOS
if ($_GET["get"] == 6) {
	mysql_query("DELETE FROM usuarios WHERE usr_id='" . $_GET["idu"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="usuarios.php";</script>';
	exit();
}
//ELIMINAR REDES SOCIALES
if ($_GET["get"] == 7) {
	$refoto = mysql_fetch_array(mysql_query("SELECT red_icono FROM redes_sociales WHERE red_id=" . $_GET["idS"] . ";", $conexion));
	if ($refoto["red_icono"] != "") {
		//@unlink("../../files/icono-redsocial/".$refoto["red_icono"]."");
	}
	mysql_query("DELETE FROM redes_sociales WHERE red_id='" . $_GET["idS"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="redes-sociales.php";</script>';
	exit();
}
//DESACTIVAR PAGINAS
if ($_GET["get"] == 8) {
	mysql_query("UPDATE paginas SET pag_activa=2 WHERE pag_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="paginas.php";</script>';
	exit();
}
//ELIMINAR SUBPAGINAS
if ($_GET["get"] == 9) {
	mysql_query("DELETE FROM subpaginas WHERE sub_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="subpaginas.php";</script>';
	exit();
}
//ACTIVAR PAGINAS
if ($_GET["get"] == 10) {
	mysql_query("UPDATE paginas SET pag_activa=1 WHERE pag_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="paginas.php";</script>';
	exit();
}
//ELIMINAR CONTACTENOS
if ($_GET["get"] == 12) {
	mysql_query("DELETE FROM contactenos WHERE cont_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="contacto.php";</script>';
	exit();
}
//ELIMINAR SUBSCRITOS A BOLETIN
if ($_GET["get"] == 13) {
	mysql_query("DELETE FROM boletin WHERE bol_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="boletin.php";</script>';
	exit();
}
//ELIMINAR BLOG
if ($_GET["get"] == 14) {

	$refoto = mysql_fetch_array(mysql_query("SELECT blog_imagen FROM blog WHERE blog_id=" . $_GET["idR"] . ";", $conexion));
	if ($refoto["blog_imagen"] != "") {
		//@unlink("../../files/blog/".$refoto["blog_imagen"]."");
	}
	$numcoment = mysql_num_rows(mysql_query("SELECT * FROM blog_comentarios where blogc_blog=" . $_GET["idR"] . ";", $conexion));
	if ($numcoment > 0) {
		mysql_query("DELETE FROM blog_comentarios WHERE blogc_blog='" . $_GET["idR"] . "'", $conexion);
	}
	mysql_query("DELETE FROM blog WHERE blog_id='" . $_GET["idR"] . "'", $conexion);
	if (mysql_errno() != 0) {
		echo mysql_error();
		exit();
	}
	echo '<script type="text/javascript">window.location.href="blog.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO ESPECIAL
if ($_GET["get"] == 15) {
	mysql_query("DELETE FROM anuncio_especial WHERE ape_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="anuncio-especial.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO ESPECIAL
if ($_GET["get"] == 16) {
	mysql_query("DELETE FROM sitios_recomendados WHERE sit_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="sitios-recomendados.php";</script>';
	exit();
}
//ELIMINAR ANUNCIO
if ($_GET["get"] == 17) {
	mysql_query("DELETE FROM anuncios WHERE anu_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="anuncios.php";</script>';
	exit();
}
//APROBAR EVENTOS
if ($_GET["get"] == 18) {
	mysql_query("UPDATE eventos_inscripcion SET epi_estado='2' WHERE epi_id=" . $_GET["idR"] . "", $conexion);
	if ($configuracionPagina[16] == 1) {
		$inscripcion = mysql_fetch_array(mysql_query("SELECT * FROM eventos_inscripcion ei INNER JOIN eventos e ON ei.epi_id_evento=e.eve_id WHERE eve_id='" . $_GET["idR"] . "'", $conexion));
		//Envio de notificacion
		$fin =  '<html><body>';
		$fin .= $inscripcion["epi_nombre"] . ', 
						Te informamos que tu inscripci&oacute;n al Evento ' . $inscripcion["eve_nombre"] . ' ha sido Aprobada en <a href="' . $informacionPagina[12] . '">' . $informacionPagina[1] . '</a>.<br>
						<table width="80%" align="center" border="1" style="font-family:Verdana, Arial, Helvetica, sans-serif;" rules="groups" cellpadding="3" cellspacing="3">
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:center;" colspan="2">
							<h1>' . $informacionPagina[1] . '</h1>
							<img src="' . $informacionPagina[12] . '/files/logo/' . $informacionPagina[2] . '" alt="Space Invaders" width="100" />
						</td>
					</tr>
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">FECHA</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . date("d/M/Y") . '</td>
					</tr>
					
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">NOMBRE EVENTO</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . $inscripcion["eve_nombre"] . '</td>
					</tr>

					
					<tr>
						<td style="background:#FFF; color:#000; text-align:center; font-size:10px;" colspan="2">
							<span style="font-size:18px;">' . $informacionPagina[1] . '</span><br>
							' . $informacionPagina[3] . '<br>
							' . $informacionPagina[4] . '
						</td>
					</tr>
					
				</table>
						';



		$fin .= '';

		$fin .=  '<html><body>';


		$sfrom = $informacionPagina[3]; //LA CUETA DEL QUE ENVIA EL MENSAJE

		$sdestinatario = "jomejia@unac.edu.co," . $inscripcion["epi_email"]; //CUENTA DEL QUE RECIBE EL MENSAJE

		$ssubject = "Inscripcion Evento Aprobado " . $_POST["eve_nombre"] . " - " . $informacionPagina[1]; //ASUNTO DEL MENSAJE 

		$shtml = $fin; //MENSAJE EN SI

		$sheader = "From:" . $sfrom . "\nReply-To:" . $sfrom . "\n";

		$sheader = $sheader . "X-Mailer:PHP/" . phpversion() . "\n";

		$sheader = $sheader . "Mime-Version: 1.0\n";

		$sheader = $sheader . "Content-Type: text/html; charset=UTF-8\r\n";

		@mail($sdestinatario, $ssubject, $shtml, $sheader);
		//fin envio notificacion
	}
	echo '<script type="text/javascript">window.location.href="inscripcion-eventos.php";</script>';
	exit();
}

//DESAPROBAR EVENTOS
if ($_GET["get"] == 19) {
	mysql_query("UPDATE eventos_inscripcion SET epi_estado='3' WHERE epi_id=" . $_GET["idR"] . "", $conexion);
	if ($configuracionPagina[16] == 1) {
		$inscripcion = mysql_fetch_array(mysql_query("SELECT * FROM eventos_inscripcion ei INNER JOIN eventos e ON ei.epi_id_evento=e.eve_id WHERE eve_id='" . $_GET["idR"] . "'", $conexion));
		//Envio de notificacion
		$fin =  '<html><body>';
		$fin .= $inscripcion["epi_nombre"] . ', 
						Lamentamos informarte que tu inscripci&oacute;n al Evento ' . $inscripcion["eve_nombre"] . ' NO ha sido Aprobada en <a href="' . $informacionPagina[12] . '">' . $informacionPagina[1] . '</a>.<br>
						Te sugerimos estar atentos a los futuros eventos para que puedas inscribirte y asistir.<br><br>
						<table width="80%" align="center" border="1" style="font-family:Verdana, Arial, Helvetica, sans-serif;" rules="groups" cellpadding="3" cellspacing="3">
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:center;" colspan="2">
							<h1>' . $informacionPagina[1] . '</h1>
							<img src="' . $informacionPagina[12] . '/files/logo/' . $informacionPagina[2] . '" alt="Space Invaders" width="100" />
						</td>
					</tr>
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">FECHA</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . date("d/M/Y") . '</td>
					</tr>
					
					
					<tr>
						<td style="background:' . $configuracionPagina[1] . '; color:' . $configuracionPagina[5] . '; text-align:right;">NOMBRE EVENTO</td>
						<td style="background:#F6F6F6; color:#000000; text-align:left;">&nbsp;' . $inscripcion["eve_nombre"] . '</td>
					</tr>

					
					<tr>
						<td style="background:#FFF; color:#000; text-align:center; font-size:10px;" colspan="2">
							<span style="font-size:18px;">' . $informacionPagina[1] . '</span><br>
							' . $informacionPagina[3] . '<br>
							' . $informacionPagina[4] . '
						</td>
					</tr>
					
				</table>
						';



		$fin .= '';

		$fin .=  '<html><body>';


		$sfrom = $informacionPagina[3]; //LA CUETA DEL QUE ENVIA EL MENSAJE

		$sdestinatario = "jomejia@unac.edu.co," . $inscripcion["epi_email"]; //CUENTA DEL QUE RECIBE EL MENSAJE

		$ssubject = "Inscripcion Evento NO Aprobado " . $_POST["eve_nombre"] . " - " . $informacionPagina[1]; //ASUNTO DEL MENSAJE 

		$shtml = $fin; //MENSAJE EN SI

		$sheader = "From:" . $sfrom . "\nReply-To:" . $sfrom . "\n";

		$sheader = $sheader . "X-Mailer:PHP/" . phpversion() . "\n";

		$sheader = $sheader . "Mime-Version: 1.0\n";

		$sheader = $sheader . "Content-Type: text/html; charset=UTF-8\r\n";

		@mail($sdestinatario, $ssubject, $shtml, $sheader);
		//fin envio notificacion
	}
	echo '<script type="text/javascript">window.location.href="inscripcion-eventos.php";</script>';
	exit();
}

//ELIMINAR CLIENTES
if ($_GET["get"] == 20) {
	mysql_query("DELETE FROM clientes WHERE cli_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="clientes.php";</script>';
	exit();
}
//ELIMINAR COMENTARIO BLOG
if ($_GET["get"] == 21) {
	mysql_query("DELETE FROM blog_comentarios WHERE blogc_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="blog-items.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR PLAN
if ($_GET["get"] == 22) {
	mysql_query("DELETE FROM tienda_items WHERE tpi_paquete='" . $_GET["idR"] . "'", $conexion);
	mysql_query("DELETE FROM tienda_paquetes WHERE tpp_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="planes.php";</script>';
	exit();
}
//ELIMINAR ITEM PLAN
if ($_GET["get"] == 23) {
	mysql_query("DELETE FROM tienda_items WHERE tpi_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="planes-items.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR SLIDER
if ($_GET["get"] == 24) {
	mysql_query("DELETE FROM slider WHERE sli_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="slider.php?id=' . $_GET["idR"] . '";</script>';
	exit();
}
//ELIMINAR PORTAFOLIO
if ($_GET["get"] == 25) {
	mysql_query("DELETE FROM portafolio WHERE por_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="' . $_SERVER["HTTP_REFERER"] . '";</script>';
	exit();
}
//ELIMINAR PEDIDOS
if ($_GET["get"] == 26) {
	mysql_query("DELETE FROM pedidos_items WHERE ppi_id_pedido='" . $_GET["idR"] . "'", $conexion);
	mysql_query("DELETE FROM pedidos WHERE ped_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="pedidos.php";</script>';
	exit();
}
//ELIMINAR INSCRIPCION EVENTOS
if ($_GET["get"] == 27) {
	mysql_query("DELETE FROM eventos_inscripcion WHERE epi_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="inscripcion-eventos.php";</script>';
	exit();
}
//ELIMINAR VISITAS
if ($_GET["get"] == 28) {
	mysql_query("DELETE FROM visitas WHERE vis_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="visitas.php";</script>';
	exit();
}
//ELIMINAR SONIDOS
if ($_GET["get"] == 29) {
	mysql_query("UPDATE paginas SET pag_musica='' WHERE pag_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="paginas-info.php?idR=' . $_GET["idR"] . '&a=2";</script>';
	exit();
}
//ELIMINAR FONDO
if ($_GET["get"] == 30) {
	mysql_query("UPDATE paginas SET pag_background='' WHERE pag_id='" . $_GET["idR"] . "'", $conexion);
	echo '<script type="text/javascript">window.location.href="paginas-info.php?idR=' . $_GET["idR"] . '&a=2";</script>';
	exit();
}
