<html>
<head>
<title>
  <?php
	 function asignar($var,$index) {
		if (isset($var[$index])) {
			return $var[$index];
		}
	 }
	 
		$folder = "./Matematica/";
		$matlinks = [
			'opalg' => ["Operaciones Algebráicas","opalgebraicas.htm","Introducción y ejemplos de Operaciones Algebráicas"],
			'relyfun' => ["Relaciones y Funciones","relyfun.htm","Introducción a los conceptos de relaciones y funciones"],
			'funlin' => ["Funciones Lineales","funcioneslineales.htm","Breve introducción a las funciones líneales"],
			'estufun' => ["Estudio de Funciones","estufun.htm","Breve introducción al estudio de funciones a partir de los gráficos"],
			'limites' => ["Límites","limites.htm","Introducción al calculo de límites"],
			'derivadas' => ["Derivadas","derivadas.htm","Elementos del cálculo de derivadas"],
			'mattay' => ["Teorema de Taylor","mattay.htm","Introducción al polinomio de Taylor"],
			'integrales' => ["Integrales","integrales.htm","Introducción a las integrales"],
		];
		$alglinks = [
			'matpi1' => ["Cálculo de Pi","./Algoritmos/matpi1.htm","Breve descripción de un algoritmo para calcular Pi"],
			'datealg' => ["Date","./Algoritmos/datealg.htm","Breve descripción introductoria del algoritmo utilizado en la librería libdate"],
			'0' => ["Cálculo de Pi en C#","https://github.com/Debrec/calcpi","Versión de calculo de pi en C# alojada en github"],
			'1' => ["Código de cálculo de pi", "./Descargas/CalculoDePi.zip", "Código fuente del programa para calcular pi en c++"],
			'2' => ["Código de libdate","./Descargas/LibDate.zip","Código fuente de libdate en c++"],
		];

    function titulo($pag, $sub) {
	  global $matlinks,$alglinks;
      $pre = "matcpp - ";
      if ($sub == '') {
        if($pag == '' || $pag == 'inicio') {
          echo $pre . "Inicio";
        } else if ($pag == 'cursomat') {
          echo $pre . "Análisis Matemático";
        } else if ($pag == 'algorithm') {
          echo $pre . "Algoritmos";
        } else if ($pag == 'contacto') {
		  echo $pre . "Contacto";
		} else if ($pag == 'login') {
		  echo  $pre . 'Login';
		}
      } else if ($sub == 'mat') {
				foreach ($matlinks as $clave => $value) {
					if ($pag == $clave) {
						echo $pre . $value[0];
						break;
					}
				}
      } else if ($sub == 'alg') {
				foreach ($alglinks as $clave => $value) {
					if ($pag == $clave) {
						echo $pre . $value[0];
						break;
					}
				}
      }
    }

    function cuerpo($pag,$sub,$msg,$id) {
			global $folder, $matlinks, $alglinks,$nombre,$email,$texto,$numpag;
      if ($sub == '') {
        echo "<div class=sub>";
        if(($pag == '') || ($pag=='inicio')) {
          include("./inicio.html");
        } else if ($pag == 'cursomat') {
          include("./cursomat.php");
        } else if ($pag == 'algoritmos') {
          include("./algorithm.php");
				} 
      } else if ($sub=='mat') {
        echo "<div class=lateral>";
        include('cmlateral.php');
        echo "</div><div class=blanco>";
				foreach ($matlinks as $clave => $value) {
					if ($pag == $clave) {
						include($folder.$value[1]);
						break;
					}
				}
      } else if ($sub == 'alg') {
        echo "<div class=lateral>";
        include('aglateral.php');
        echo "</div><div class=blanco>";
				foreach ($alglinks as $clave => $value) {
					if ($pag == $clave) {
						include($value[1]);
						break;
					}
				}
      }
    }

  $pag = asignar($_GET,'pag');
  $sub = asignar($_GET,'sub');
	$msg = asignar($_GET,'msg');
	$id = asignar($_GET,'id');	

  titulo($pag,$sub);
  ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="es">
<meta content="matemática,análisis matemático,mathematic,cálculo,límites,taylor,polinomio,taylor,series,numericas,suceciones,convergencia,polinomio de taylor,pi,c++,c, programación numerica,numeric,programing,programing libraries,numerical methods" name="keywords">
<meta content="Una breve introducción al análisis matemático. Se incluyen también comentarios y ejemplos de uso de lenguages de programación (c/c++) para realizar calculos numéricos. Ademas de algunas librerías matemáticas para utilizar arrays dinámicos en C++." name="description">
<meta content="Spanish" name="language">
<link type="text/css" rel="stylesheet" href="import.css" _wpro_HREF="import.css">
</head>

<body>
<div class=body>
  <div class=sup>
    <?php include("./superior.html"); ?>
  </div>
  <?php
  cuerpo($pag,$sub,$msg,$id);
  ?>
  </div>
</div>
</body>
</html>
