<?php
class ControladorCursos{



    static public function ctrMostrarCusos($item,$valor){

        $tabla='vista_horario_oferta';

        
        
        $respuesta=ModeloCursos::mdlMostrarCursos($tabla,$item,$valor);
        
        return $respuesta;

    }

    static public function ctrMostrarEstudiantesCursos($item,$valor){

        $tabla='vista_estudiantes_curso';

        $respuesta=ModeloCursos::mdlMostrarCursos($tabla,$item,$valor);
        
        return $respuesta;

    }






    
}
