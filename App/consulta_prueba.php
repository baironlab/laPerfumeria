<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta Prueba</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/jquery.circliful.css" rel="stylesheet">
	<link href="css/appMerk.css" rel="stylesheet">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/holder.min.js"></script>
        <script src="js/jquery.circliful.min.js"></script>
      <script src="js/bootstrap.js"></script>
	<script src="js/appmerk.js"></script>
        <script>
                      function realizaProceso(valorCaja1, valorCaja2){
                              var parametros = {
                                      "valorCaja1" : valorCaja1,
                                      "valorCaja2" : valorCaja2
                              };
                              $.ajax({
                                      data:  parametros,
                                      url:   'ejemplo_ajax_proceso.php',
                                      type:  'post',
                                      beforeSend: function () {
                                              $("#resultado").html("Procesando, espere por favor...");
                                      },
                                      success:  function (response) {
                                              $("#resultado").html(response);
                                      }
                              });
                      }
        </script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="timePlan"></div>
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="#">
              <img src="images/Crear_Estudios.png">
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="usuario nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Bienvenido Byron Garcia</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-star"> Plan Dedicado</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-out"> Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
        <h2 class="reporte">Reporte</h2>
<div id="cont-appMerk" class="container-fluid">
      <div class="row">
              <!-- Alertas
                    <div class="alert alert-success" role="alert"> Positivo</div>
                    <div class="alert alert-info" role="alert">Recuerde...</div>
                    <div class="alert alert-warning" role="alert">...</div>
                    <div class="alert alert-danger" role="alert"> ¡Cuidado!</div>
            -->
        <div class="col-md-12 main">

          <div id="contReporte" class="row placeholders col-sm-offset-1">
      <!-- Reporte Graficos -->
            <div class="col-xs-6 col-sm-3 placeholder">
              <div id="cFace" data-dimension="150" data-text="50 post" data-info="Facebook" data-width="30" data-fontsize="16" data-percent="45" data-fgcolor="#3b5998" data-bgcolor="#dfe3ee" data-type="half" data-fill="#fff"></div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
             <div id="cTwee" data-dimension="150" data-text="140 post" data-info="Twitter" data-width="30" data-fontsize="16" data-percent="75" data-fgcolor="#9AE4E8" data-bgcolor="#eee" data-type="half" data-fill="#fff"></div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <div id="cYoutube" data-dimension="150" data-text="1 video" data-info="Youtube" data-width="30" data-fontsize="16" data-percent="50" data-fgcolor="#B50505" data-bgcolor="#eee" data-type="half" data-fill="#fff"></div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
             <div id="cReportes" data-dimension="150" data-text="1 reporte" data-info="Estadisticas" data-width="30" data-fontsize="16" data-percent="30" data-fgcolor="#E49A39" data-bgcolor="#eee" data-type="half" data-fill="#fff"></div>
            </div>
          </div>
        <div class="row">
          <div class="cont-ajax">
            <h3>Contenido Ajax</h3>
            Introduce valor 1
          <input type="text" name="caja_texto" id="valor1" value="0"/>
          Introduce valor 2
          <input type="text" name="caja_texto" id="valor2" value="0"/>
          Realiza suma
        <input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());return false;" value="Calcula"/>
        <br/>
        Resultado: <span id="resultado">0</span>
        </div>
          <header class="col-sm-12 cont-filtros">
                          <h2 class="titu-2 col-sm-3"><span class="glyphicon glyphicon-calendar"></span> Programación 14/11/2014 al 19/11/2014</h2>
                                   <div class="btn-group  filtros pull-right">
                                                       <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-bookmark">F</span></button>
                                                       <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-bookmark">T</span></button>
                                                       <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-bookmark">Y</span></button>
                                  </div>

          </header>

<!--[ Cronograma ]   -->

              <div class="col-xs-12 col-sm-2 box-cont">
                <h2 class="titu-4">Lunes</h2>
<?php
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

$conecion = mysql_connect('localhost','root','root') or die ("Problemas en la conexion");

mysql_select_db('sociamed', $conecion);

$consulta_Cliente    = "SELECT Clientes.nombre,
			             Clientes.empresa,
			             Plan_cliente.id_cliente,
			             Plan_cliente.fecha_vecimiento,
			             Planes.nombre_plan
                      		FROM Clientes
                      		INNER JOIN Plan_cliente ON Clientes.id_cliente = Plan_cliente.id_cliente
                      		INNER JOIN Planes ON Plan_cliente.id_plan = Planes.id_plan";

$consulta_Post    = "SELECT     Clientes.empresa,
			             Post_cliente.id_post,
			             Post_cliente.titulo,
			             Post_cliente.imagen,
			             Post_cliente.descripcion,
			             Post_cliente.dia,
			             Red.nombre,
                              Campana.id_campana,
                              Campana.nombre as nombre_campana,
                              Campana.inicio,
                              Campana.fin,
                              programacion_campanas.semana,
                              Categoria_cliente.nombre as tipo_post,
                              programacion_campanas.tema
                	           FROM Clientes
                              INNER JOIN Post_cliente ON Clientes.id_cliente = Post_cliente.id_cliente
                	             INNER JOIN Categoria_cliente ON Post_cliente.id_categoria = Categoria_cliente.id_categoria
                              INNER JOIN Red ON Post_cliente.id_red = Red.id_red
                              INNER JOIN Campana ON Post_cliente.id_campana = Campana.id_campana
                              INNER JOIN programacion_campanas ON Campana.id_campana = programacion_campanas.id_campana
                             # WHERE Campana.id_campana = 1 AND Post_cliente.dia = 'Lunes'
                             " ;

$resultado  = mysql_query($consulta_Post , $conecion);

  // Consulta Clientes
/*
while ($fila= mysql_fetch_array($resultado )) {
                  echo $fila['id_cliente']." ".$fila['empresa']." ".$fila['nombre']." ".$fila['nombre_plan']." ".$fila['fecha_vecimiento'];
  }
  */
  // Consulta Post
  while ($fila= mysql_fetch_array($resultado )) {
                   echo 	'<div class="box-post e'.$fila['nombre'].'"><div class="msnRepor hover-'.$fila['id_post'].' col-xs-12"><label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>';
                   echo      '<textarea class="box-msn" name="" id=""></textarea><button type="button" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>';
                   echo 	'<button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('.$fila['id_post'].')"> <span class="glyphicon glyphicon-chevron-up"></span> </button>' ;
                 	 echo 	'<div style="clear:both"></div></div>' ;
                 	  echo 	'<header>';
                 	 echo 	'<span  class="label label-'.$fila['nombre'].'">'.$fila['nombre'].' '.$fila['id_post'].'</span>';
                   echo       '<div class="aprobado pull-right">  <span class="titu-1">Aprobado:</span>';
                   echo 	'<div class="btn-group"><button type="button" class="btn btn-default btn-sm btn-aprobado"><span class="glyphicon glyphicon-ok"></span> </button>';
                   echo 	'<button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('.$fila['id_post'].')"><span class="glyphicon glyphicon-remove"></span></button></div></div>';
                   echo 	'</header>' ;
                   echo 	'<figure class="img1"><img src="admin/imagenes/'.$fila['imagen'].'" alt="" style="width:100%"></figure>';
                   echo 	'<h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span>'.$fila['titulo'].'</h3>';
                   echo 	'<h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span>'.$fila['tipo_post'].'</h3>';
                    echo ' <p class="par-1">'.$fila['descripcion'].'</p>';
                    echo 	'</div>';
                     //  echo "Campaña No: ".$fila['id_campana']." ".$fila['nombre']." ".$fila['inicio']."<br> ".$fila['semana']." ".$fila['tema'];
  }

mysql_close($conecion);
?>
             </div>

              <div class="col-xs-12 col-sm-2 box-cont">
                <h2 class="titu-4">Martes</h2>
                <div class="box-post eTwee">
                      <div class="msnRepor hover-3 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('3')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-twee"> Twitter 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                   <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('3')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                          <figure class="img1"><img src="images/postFace4.png" alt="" style="width:100%"></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

            <div class="box-post eTwee">
                      <div class="msnRepor hover-4 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('4')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-twee"> Twitter 02 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                   <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('4')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

              </div>

              <div class="col-xs-12 col-sm-2 box-cont">
                <h2 class="titu-4">Miercoles</h2>
                <div class="box-post  eYoutube">
                      <div class="msnRepor hover-5 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('5')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-youtube"> Youtube 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                 <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('5')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

            <div class="box-post  eYoutube">
                      <div class="msnRepor hover-6 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('6')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-youtube"> Youtube 02 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                 <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('6')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

              </div>

              <div class="col-xs-12 col-sm-2 box-cont">
                <h2 class="titu-4">Jueves</h2>
                <div class="box-post eFace">
                      <div class="msnRepor hover-7 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('7')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-face"> Facebook 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                  <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('7')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

            <div class="box-post eFace">
                      <div class="msnRepor hover-8 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('8')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-face"> Facebook 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                  <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('8')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

              </div>

              <div class="col-xs-12 col-sm-2 box-cont">
                <h2 class="titu-4">Viernes</h2>
                <div class="box-post eFace">
                      <div class="msnRepor hover-9 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('9')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-face"> Facebook 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                  <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('9')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

            <div class="box-post eFace">
                      <div class="msnRepor hover-10 col-xs-12">
                                        <label class="titu-2">Deje su observación </label><span class="glyphicon glyphicon-comment pull-right"> </span>
                                        <textarea class="box-msn" name="" id=""></textarea>
                                        <button type="button" class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                      </button>
                                      <button type="button" class="btn btn-default btn-sm pull-left " onclick="cerrar('10')">
                                                <span class="glyphicon glyphicon-chevron-up"></span>
                                      </button>
                                      <div style="clear:both"></div>
                      </div>
                  <header>
                            <span  class="label label-face"> Facebook 01 </span>
                            <div class="aprobado pull-right">
                                    <span class="titu-1">Aprobado:</span>
                                  <div class="btn-group">
                                           <button type="button" class="btn btn-default btn-sm btn-aprobado">
                                            <span class="glyphicon glyphicon-ok"></span>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm btn-obser" onclick="observacion('10')">
                                            <span class="glyphicon glyphicon-remove"></span>
                                         </button>
                                 </div>
                            </div>
                  </header>
                  <figure class="img1"><img src="images/postFace4.png" alt="" ></figure>
                  <h3 class="titu-3"><span class="glyphicon glyphicon-bullhorn"></span> Tips de salud</h3>
                  <p class="par-1">
                    Lorem ipsum dolor sit amet, consectetur elit. Illo eum quisquam sequi fuga recusandae.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eum quisquam sequi fuga recusandae.
                  </p>
              </div>

              </div>

        </div>
          </div>
      </div>
    </div>
  <script>

/*
$( window ).resize(function() {
                       location.reload();
});
*/
</script>
</body>
</html>