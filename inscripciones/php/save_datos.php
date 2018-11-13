<?php
$id = $_POST['id'];
/*$sql = "SELECT gen.paterno, gen.materno, gen.nombre, gen.fecha_nacimiento, dom.estado_civil,
               dom.calle, dom.colonia, dom.municipio, dom.estado, dom.cp, dom.telefono,
               dom.paterno_padre, dom.materno_padre, dom.nombre_padre, con.domicilio_distinto,
               con.calle as calle_tutor, con.colonia as colonia_tutor, con.municipio as municipio_tutor,
               con.estado as estado_tutor, con.cp as cp_tutor, con.telefono as telefono_tutor,
               gen.escuela_procedencia, gen.promedio, gen.secundaria_estudio, gen.promedio_secundaria
        FROM aspirantes_datos_generales gen, aspirante_datos_domicilio dom, aspirantes_datos_contacto con
        WHERE gen.id_aspirante = $id AND gen.id_aspirante = dom.id_aspirante AND gen.id_aspirante = con.id_aspirante";
*/
$sqlGenerales = "UPDATE aspirantes_datos_generales SET paterno = '".$_POST['paterno']."', materno = '".$_POST['materno']."',
                nombre = '".$_POST['nombre']."', fecha_nacimiento = '".$_POST['fecha_nacimiento']."',
                escuela_procedencia = '".$_POST['escuela_procedencia']."', promedio = '".$_POST['promedio']."',
                secundaria_estudio = '".$_POST['secundaria_estudio']."', promedio_secundaria = '".$_POST['promedio_secundaria']."'
                WHERE id_aspirante = $id";
echo "Generales: ".$sqlGenerales;
$sqlDomicilio = "UPDATE aspirante_datos_domicilio SET estado_civil = '".$_POST['estado_civil']."', calle = '".$_POST['calle']."',
                 colonia = '".$_POST['colonia']."', municipio = '".$_POST['municipio']."', estado = '".$_POST['estado']."',
                 cp = '".$_POST['cp']."', telefono = '".$_POST['telefono']."', paterno_padre = '".$_POST['paterno_padre']."',
                 materno_padre = '".$_POST['materno_padre']."', nombre_padre = '".$_POST['nombre_padre']."'
                 WHERE id_aspirante = $id";
echo "Domicilio: ".$sqlDomicilio;
if($_POST['domicilio_distinto'] == "no"){
  $sqlContacto = "UPDATE aspirantes_datos_contacto SET telefono = '".$_POST['telefono_tutor']."'
                  WHERE id_aspirante = $id";
}else{
  $sqlContacto = "UPDATE aspirantes_datos_contacto SET calle = '".$_POST['calle_tutor']."', colonia = '".$_POST['colonia_tutor']."',
                  municipio = '".$_POST['municipio_tutor']."', estado = '".$_POST['estado_tutor']."', cp = '".$_POST['cp_tutor']."',
                  telefono = '".$_POST['telefono_tutor']."'
                  WHERE id_aspirante = $id";
}




echo "Contacto: ".$sqlContacto;
