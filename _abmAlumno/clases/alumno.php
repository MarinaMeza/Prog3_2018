<?php
    class Alumno {
        public $nombre;
        public $legajo;
        public $foto;

        public function __construct($pNombre, $pLegajo, $pFoto) {
            $this->nombre = $pNombre;
            $this->legajo = $pLegajo;
            $this->GuardarFoto($pFoto);
        }

        public function Guardar() {
            if(!file_exists('archivos')) {
                mkdir('archivos', 0777, true);
            }
            $ruta = "archivos/".$this->nombre.".txt";
            $archivo = fopen($ruta, 'w') or die("No pudo abrirse el archivo: ".$ruta);
            fwrite($archivo, "Nombre: ".$this->nombre."\r\nLegajo: ".$this->legajo);
            fclose($archivo);
        }

        public function GuardarFoto($pFoto) {
            
            if(!file_exists('fotos')) {
                mkdir('fotos', 0777, true);
            }
            $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
            
            if($pFoto != "") {
                $this->foto = "fotos/".$this->nombre."-".$this->legajo.".".$extension;
            }
            //echo "<br>Foto: ".$this->foto;
            //move_uploaded_file($pFoto,'fotos/'.$this->foto);
            
            move_uploaded_file($_FILES['foto']['tmp_name'],$this->foto);
        }

        public static function holaAlumno() {
            echo "hola alumno";
        }
    }
?>