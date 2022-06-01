<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>Inventario</title>
    <style type="text/css">
        .imagen {
            width: 100%;
            border-radius: 10px;
            margin-left: 1%;
            margin-bottom: 3%;
        }

        .cajaContenedora {
            /* display: inline-block; */
            width: auto;
            margin: auto;
            /* margin-right: 10px; */
        }

        /*DEBE PARTIR DESDE LA PARTE DE ARRIBA PARA QUE VAYA BAJANDO*/
        .cajaContenedoraTexto {
            width: 94%;
            height: 170px;
            background-color: #cee6f7;
            text-decoration: none;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 15px 20px 15px 20px;
            text-align: center;
            margin-left: 1%;
            margin-bottom: 3%;
        }

        p {
            font-size: 1em;
            margin-top: 0%;
        }

        h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: center;
            color: white;
            margin-top: -35%;
        }
    </style>
</head>

<body>
    <img src="https://www2.hm.com/content/dam/sustainability-site/startpage/9501-CPD-01_16x9-sustainability-destination.jpg" alt="" class="imagen">
    <h3>INVENTARIO RECICLA BAZAR</h3>
    <!--CAJA CONTENEDORA-->
    @foreach($articulos as $articulo)
    <div class="cajaContenedora">
        <div class="cajaContenedoraTexto">

            <p>Nombre: {{$articulo->nombre}}</p>
            <p>Descripción: {{$articulo->descripcion}}</p>
            <p>Piezas: {{$articulo->piezas}}</p>
            <p>Precio: {{$articulo->precio}}</p>
            <p>Categoría: {{$articulo->categoria_id}}</p>

        </div>
    </div>
    @endforeach
</body>

</html>