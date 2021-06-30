<?php
        
        require_once (__DIR__."/../MDB/mdbCompra.php");
        require_once (__DIR__."/../MDB/mdbProducto.php");
        require_once (__DIR__."/../MDB/mdbDescuento.php");
        $productosdescuento=leerdescuentos();
        $array_clases_compras=null;
        $id_cliente=$_GET['id_cliente'];
        $array_clases_compras=buscarcomprasporidcliente($id_cliente);
        //var_dump($array_clases_compras);
        $productos_usuario=array();
        
       //se buscan los productos en la base de datos dependiendo del usuario
        foreach ($array_clases_compras as  $compra) {
                
                $producto=buscarproductoporid($compra["id_producto"]);
                array_push($productos_usuario,$producto->toArray());
        }
        foreach ( $productosdescuento as  $descuento) {
                $arraydescuentos[$descuento["id_producto"]]=$descuento["valor_descuento"];
        }
        foreach ( $array_clases_compras as  $compra) {
                $arraycompras[$compra["id_producto"]]=$compra["cantidad_compra"];
        }
        echo json_encode(array($arraycompras,$productos_usuario,$arraydescuentos));
        //echo json_encode($arraydescuentos);
?>