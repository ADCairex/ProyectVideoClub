<?php
    // function validar_dni($dni){
    //     $letra = substr($dni, -1);
    //     $numeros = substr($dni, 0, -1);
    //     if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){ // dni argentina  8 caracteres
    //         echo 'valido';
    //     }else{
    //         echo 'no valido';
    //     }
    // }
    
    class Equipamiento {

        public $id;
        public $nombre;
        public $antiguedad;
        public $dimensionLargo;
        public $dimensionAncho;
        public $peso;
        public $imagen;
        public $icono;
        public $descripcion;

        function __construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion){

            $this->id = $id;
            $this->nombre = $nombre;
            $this->antiguedad = $antiguedad;
            $this->dimensionLargo = $dimensionLargo;
            $this->dimensionAncho = $dimensionAncho;
            $this->peso= $peso;
            $this->imagen = $imagen;
            $this->icono= $icono;
            $this->descripcion = $descripcion;
        }

        function calcularAntiguedad() {
            $actualDate = getdate();
            $this->antiguedad = explode('/', $this->antiguedad);
            $year = $this->antiguedad[2];
            $month = $this->antiguedad[1];
            $day = $this->antiguedad[0];
            $antiguedad = $actualDate['year'] - $year;
            if ($month > $actualDate['mon'] || ($month = $actualDate['mon'] && $day > $actualDate['mday'])) {
                $antiguedad = $antiguedad - 1;
            }

            $this->antiguedad = $antiguedad;
            return $antiguedad;
        }
    
    }

    class Espada extends Equipamiento {

        public $materialHoja;
        public $materialMango;

        function __construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion, $materialHoja, $materialMango ){
            parent::__construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion);
    
            $this->materialHoja = $materialHoja;
            $this->materialMango = $materialMango;
        }

    }
    
    class Arco extends Equipamiento {

        public $materialCuerpo;
        public $materialCuerda;

        function __construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion, $materialCuerpo, $materialCuerda ){
            parent::__construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion);
    
            $this->materialCuerpo = $materialCuerpo;
            $this->materialCuerda = $materialCuerda;
        }
    }

    class Casco extends Equipamiento {
        public $material;
        public $resistencia;

        function __construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion, $material, $resistencia ){
            parent::__construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion);
    
            $this->material = $material;
            $this->resistencia = $resistencia;
        }
    }

    class Hacha extends Equipamiento {

        public $materialHojaH;
        public $materialMangoH;
    
        function __construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion, $materialHojaH, $materialMangoH ){
            parent::__construct($id, $nombre, $antiguedad, $dimensionLargo, $dimensionAncho, $peso, $imagen, $icono, $descripcion);
    
            $this->materialHojaH = $materialHojaH;
            $this->materialMangoH = $materialMangoH;
        }
    }
?>
