<?php
    class Alumno {
        public $nombre;
        public $legajo;
        public $foto;

        public function __construct($pNombre, $pLegajo, $pFoto) {
            $this->nombre = $pNombre;
            $this->legajo = $pLegajo;
            $extension = pathinfo($pFoto, PATHINFO_EXTENSION);

            $this->foto = "fotos/".$this->nombre."-".$this->legajo.".".$extension;
        }

        public function Guardar() {
            if(!file_exists('archivos')) {
                mkdir('archivos', 0777, true);
            }
            $ruta = "archivos/alumnos.txt";
            $archivo = fopen($ruta, 'a') or die("No pudo abrirse el archivo: ".$ruta);
            $linea = "NOMBRE ".$this->nombre." LEGAJO ".$this->legajo." FOTO ".$this->foto."\r\n";
            $arrayAlumnos = Alumno::TraerTodos();
                
            foreach ($arrayAlumnos as $alumno) {
                
                $foto = $alumno[5];
                if ($alumno != '') {
                    if ($this->foto == $foto) {
                        die();
                        $this->GuardarFoto($foto);
                    }
                }
            }
            if (fwrite($archivo, $linea)) {
                if ($this->foto != '') {
                    $this->GuardarFoto($foto);
                    //fclose($archivo);
                }else {
                    //fclose($archivo);
                }
            } else {
//                fclose($archivo);
            }
            fclose($archivo);
        }

        public function GuardarFoto($pFoto) {
            var_dump($pFoto);
            if(!file_exists('fotos')) {
                mkdir('fotos', 0777, true);
            }
            $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
            echo "<br>extension: ".$extension."<br>";
            if($pFoto != "") {
                if ($extension != 'jpg') {
                    echo "<br>IF<br>";
                    echo "<br>Error guardando la foto<br>";
                }else {
                    echo "<br>ELSE<br>";
                    $this->foto = "fotos/".$this->nombre."-".$this->legajo.".".$extension;
                    move_uploaded_file($_FILES['foto']['tmp_name'],$this->foto);
                    echo "<br>foto<br>";
                }
            }
            //echo "<br>Foto: ".$this->foto;
            //move_uploaded_file($pFoto,'fotos/'.$this->foto);
        }

        public static function BajaAlumno($pLegajo) {
            if (!file_exists('alumnosBorrados')) {
                mkdir('alumnosBorrados', 0777, true);
            }

        }

        public function ArchivarFoto() {

        }

        public static function TraerTodos() {
            $listaAlumnos = array();
            $archivo = fopen('archivos/alumnos.txt','r');
            while(!feof($archivo)) {
                $linea = fgets($archivo);
                $alumnos = explode(' ',$linea);
                $alumnos[0] = trim($alumnos[0]);
                if ($alumnos[0] != '') {
                    $listaAlumnos[] = $alumnos;
                }
            }
            fclose($archivo);
            //var_dump($listaAlumnos);
            return $listaAlumnos;
        }

        public static function holaAlumno() {
            echo "hola alumno";
        }
    }
?>