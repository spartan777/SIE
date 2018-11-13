<?php
error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");
$id = $_POST['id'];
$sqlValidacion = "SELECT * FROM inscripcion WHERE id_aspirante = $id";
$ans = mysqli_query($con,$sqlValidacion);
if($ans->num_rows > 0){
  header("location:../home.php?op=datos_inscripcion&id=$id&context=inscrito");
}else{
$sql = "SELECT gen.paterno, gen.materno, gen.nombre, gen.fecha_nacimiento, dom.estado_civil,
               dom.calle, dom.colonia, dom.municipio, dom.estado, dom.cp, dom.telefono,
               dom.paterno_padre, dom.materno_padre, dom.nombre_padre, con.domicilio_distinto,
               con.calle as calle_tutor, con.colonia as colonia_tutor, con.municipio as municipio_tutor,
               con.estado as estado_tutor, con.cp as cp_tutor, con.telefono as telefono_tutor,
               gen.escuela_procedencia, gen.promedio, gen.secundaria_estudio, gen.promedio_secundaria
        FROM aspirantes_datos_generales gen, aspirante_datos_domicilio dom, aspirantes_datos_contacto con
        WHERE gen.id_aspirante = $id AND gen.id_aspirante = dom.id_aspirante AND gen.id_aspirante = con.id_aspirante";

$sqlGenerales = "UPDATE aspirantes_datos_generales SET paterno = '".$_POST['paterno']."', materno = '".$_POST['materno']."',
                nombre = '".$_POST['nombre']."', fecha_nacimiento = '".$_POST['fecha_nacimiento']."',
                escuela_procedencia = '".$_POST['escuela_procedencia']."', promedio = '".$_POST['promedio']."',
                secundaria_estudio = '".$_POST['secundaria_estudio']."', promedio_secundaria = '".$_POST['promedio_secundaria']."',
                id_carrera_1 = '".$_POST['id_carrera']."'
                WHERE id_aspirante = $id";

$sqlDomicilio = "UPDATE aspirante_datos_domicilio SET estado_civil = '".$_POST['estado_civil']."', calle = '".$_POST['calle']."',
                 colonia = '".$_POST['colonia']."', municipio = '".$_POST['municipio']."', estado = '".$_POST['estado']."',
                 cp = '".$_POST['cp']."', telefono = '".$_POST['telefono']."', paterno_padre = '".$_POST['paterno_padre']."',
                 materno_padre = '".$_POST['materno_padre']."', nombre_padre = '".$_POST['nombre_padre']."'
                 WHERE id_aspirante = $id";

if($_POST['domicilio_distinto'] == "no"){
  $sqlContacto = "UPDATE aspirantes_datos_contacto SET telefono = '".$_POST['telefono_tutor']."'
                  WHERE id_aspirante = $id";
}else{
  $sqlContacto = "UPDATE aspirantes_datos_contacto SET calle = '".$_POST['calle_tutor']."', colonia = '".$_POST['colonia_tutor']."',
                  municipio = '".$_POST['municipio_tutor']."', estado = '".$_POST['estado_tutor']."', cp = '".$_POST['cp_tutor']."',
                  telefono = '".$_POST['telefono_tutor']."'
                  WHERE id_aspirante = $id";
}

$ansGenerales = mysqli_query($con,$sqlGenerales);
$ansDomicilio = mysqli_query($con,$sqlDomicilio);
$ansContecto = mysqli_query($con,$sqlContacto);

if($ansGenerales && $ansDomicilio && $ansContecto){
  $sqlInscripcion = "INSERT INTO inscripcion (id_aspirante) VALUES ($id)";
  $ansInscripcion = mysqli_query($con,$sqlInscripcion);
  if($ansInscripcion){
    $last_id = mysqli_insert_id($con);
    $nocontrol = str_pad($last_id, 3, "0", STR_PAD_LEFT);
    $sqlUpdate = "UPDATE inscripcion SET no_control = '$nocontrol' WHERE id_inscripcion = $last_id AND id_aspirante = $id";
    $ansUpdate = mysqli_query($con,$sqlUpdate);
    if($ansUpdate){
      $sqlInsertDocumentos = "INSERT INTO inscripcion_documentos (no_control, acta_nacimiento, certificado_secundaria, buena_conducta,
                              certificado_bachillerato, curp, fotografias, dictamen_revalidacion, forma_fm, cuota, certificado_medico)
                              VALUES ('$nocontrol', '".$_POST['acta_nacimiento']."', '".$_POST['certificado_secundaria']."', '".$_POST['buena_conducta']."',
                              '".$_POST['certificado_bachillerato']."', '".$_POST['curp']."', '".$_POST['fotografias']."', '".$_POST['dictamen_revalidacion']."',
                               '".$_POST['forma_fm']."', '".$_POST['cuota']."', '".$_POST['certificado_medico']."')";
      $ansInsertDocumentos = mysqli_query($con, $sqlInsertDocumentos);
      if($ansInsertDocumentos){
        header("location:../home.php?op=datos_inscripcion&id=$id&context=success&no_control=$nocontrol");
      }else{
        header("location:../home.php?op=datos_inscripcion&id=$id&context=error-documentos");
      }
    }else{
      header("location:../home.php?op=datos_inscripcion&id=$id&context=error-update");
    }
  }else{
      header("location:../home.php?op=datos_inscripcion&id=$id&context=error-inscripcion");
  }
}else{
  header("location:../home.php?op=datos_inscripcion&id=$id&context=error");
}
}
