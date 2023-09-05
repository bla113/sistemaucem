<?php



class ChatControlador{

    public static function ctrCrearChat($mesaje,$UsuarioRecibe,$usuarioEnvia){


        $tabla='chat_ucem';
        
        $datos=[
            'ID_USUARIO_ENVIA'=>$usuarioEnvia,
            'ID_USUARIO_RECIBE'=>$UsuarioRecibe,
            'MENSAJE'=>$mesaje
        ];
        $respuesta = ModeloChat::mdlCrearChat($tabla,$datos);

      
        



        return $respuesta;


        
    }


    static public function ctrMostrarChats($item,$valor){

        $tabla= 'chat_ucem';

        
        $respuesta=ModeloChat::mdlMostrarChats($tabla, $item, $valor);

        return $respuesta;


    }

}