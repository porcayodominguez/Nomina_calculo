<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Evaluación Tema 2 "Porcayo Domínguez Jesús Alfredo</title>
    <link rel="stylesheet" href="estiloscalculos.css">
  </head>
  <body>
    <div class="contenedor-principal">
      <img class="logo-left" src="fondos/iconos/nomina.svg" alt="Esto es una imagen">
        <h2 class="contenedor-titulo">RESULTADO DE SU NÓMINA.</h2>
    <div class="contenedor-form">
    <?php
    //VARIABLES DE DATOS//
    $nombre= $_POST['nombre'];
    $apellidop= $_POST['apellidop'];
    $apellidom= $_POST['apellidom'];
    $salariodiario= $_POST['salariodiario'];
    $dias= $_POST['dias'];
    $año= $_POST['año'];
    $falta= $_POST['falta'];
    $horasextras= $_POST['horasextras'];
    //VARIABLES DE CÁLCULO//
   $sueldobase=0;
   $eficiencia=0;
   $puntualidad=0;
   $totalextrasd=0;
   $totalextrast=0;
   $ISR=0;
   $SCEAV=0;
   $SIV=0;
   $SS=0;
   $FOVISSSTE=0;
    //SEMANAL//
    //PERCEPCIONES//
    //CÁLCULO SUELDO BRUTO, FALTAS, EFICIENCIA DE TRABAJO//
        if ($dias>=1 && $dias<=31) {
          $sueldobase=$salariodiario*$dias;

          if($dias>=1 && $dias<=31){
              $sueldobase=$dias*$salariodiario;
              $salariod= $sueldobase-$salariodiario;
              $eficiencia= $sueldobase*0.055;
              $puntualidad= $sueldobase*0.62;
            }
         if ($horasextras<9){
           $totalextrasd=(($salariodiario/8)*2)*$horasextras;

         }
         else{
           $totalextrast=($salariodiario/8*3)*($horasextras-9)+($salariodiario/8*2)*9;
         }
         $PERCEPCIONES=($sueldobase + $eficiencia + $puntualidad + $totalextrasd + $totalextrast);

    //DEDUCCIONES//
      $ISR= $sueldobase*0.1825;
      $SCEAV= $sueldobase*0.796;
      $SIV= $sueldobase*0.81;
      $SS= $sueldobase*0.439;
      $FOVISSSTE= $sueldobase*0.30;

      $DEDUCCIONES=($ISR + $SCEAV + $SIV + $SS + $FOVISSSTE);

    //SUMA DE PERCEPCIONES Y DEDUCCIONES//
    $resultado = ($PERCEPCIONES + $DEDUCCIONES);

    //SALDO LIQUIDO//
    $sueldoliquido=($PERCEPCIONES - $DEDUCCIONES);


     //RESULTADO FINAL.//
     echo "<h1>DATOS INGRESADOS:</h1><br><br><br>";
     echo "<li>Hola estimado/estimada $nombre $apellidop $apellidom.</li> <br><br><br> ";
     echo "<li>Su salario diario es de: $$salariodiario pesos.</li> <br><br><br> ";
     echo "<li>Sus dias trabajados: $dias dias.</li><br><br><br>";
     echo "<li>Usted empezó a laborar en el año $año.</li><br><br><br>";


     echo "<h2>PERCEPCIONES:</h2><br><br><br>";
     echo "<li>Estimado/Estimada $nombre su sueldo bruto es de: $$sueldobase pesos.</li><br><br><br>";
     echo "<li>Si usted justifico sus faltas su sueldo es de: $$sueldobase pesos.</li><br><br><br>";
     echo "<li>Si usted no justifico sus faltas por lo tanto su sueldo es de: $$salariod pesos.</li><br><br><br>";
     echo "<li>Su eficiencia de trabajo es de: $$eficiencia pesos.</li><br><br><br>";
     echo "<li>Su estimulo por puntualidad y asistencia es de: $$puntualidad pesos.</li><br><br><br>";
     echo "<li>Su cantidad de horas extras son: $$horasextras horas.</li><br><br><br>";
     echo "<li>Pago de horas extras dobles: $$totalextrasd pesos.</li><br><br><br>";
     echo "<li>Pago de horas extras triples: $$totalextrast pesos.</li><br><br><br>";
     echo "<lu><h3>TOTAL DE PERCEPCIONES: $$PERCEPCIONES pesos.</h3></lu><br><br><br>";

    echo "<h2>DEDUCCIONES:</h2><br><br><br>";
    echo "<li>CANTIDAD DE ISR: $$ISR pesos.</li><br><br><br>";
    echo "<li>CANTIDAD DE SCEAV (Seguro de cesantía en edad avanzada y vejez): $$SCEAV pesos.</li><br><br><br>";
    echo "<li>CANTIDAD DE SIV (Seguro de invalidez y vida): $$SIV pesos.</li><br><br><br>";
    echo "<li>CANTIDAD DE SS (Seguro de Salud): $$SS pesos.</li><br><br><br>";
    echo "<li>FOVISSSTE: $$FOVISSSTE pesos.</li> <br><br><br>";

    echo "<h3>TOTAL DE DEDUCCIONES: $$DEDUCCIONES pesos.</h3><br><br><br>";


    echo "<h3>TOTAL: $resultado </h3><br><br><br>";
    echo "<h2>EL SUELDO LIQUIDO ES DE: $$sueldoliquido pesos.</h2>";
}
      ?>
   </div>
   </div>
  </body>
</html>
