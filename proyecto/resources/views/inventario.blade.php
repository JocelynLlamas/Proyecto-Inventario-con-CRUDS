<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="col">
            <div class="card" style="width: 30%; margin-left: auto; margin-right: auto;">
                <div class="card-image" style="width: 100%;">
                    <img src="https://lp2.hm.com/hmgoepprod?set=width[1280],quality[80],options[limit]&source=url[https://www2.hm.com/content/dam/home_s05/april_2022/7045c/7045C-3x2-perfect-gifts-wedding-housewarming-party-birthday.jpg]&scale=width[global.width],height[15000],options[global.options]&sink=format[jpg],quality[global.quality]" class="card-img-top" alt="...">
                </div>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">Añadir un nuevo artículo al inventario</h5>
                    <!-- FORMULARIO-->
                    <div class="row">
                        <form class="col s12" action="/crearArticulo" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group" style="margin:0 auto; width: 50%;">
                                <label class="col-form-label mt-4 name" for="">Nombre</label>
                                <input type="text" class="form-control validate" placeholder="Escriba el nombre aquí" id="" name="nombre">
                            </div>

                            <div class="form-group" style="margin:0 auto; width: 50%;">
                                <label class="col-form-label mt-4 name" for="">Descripción</label>
                                <input type="text" class="form-control validate" placeholder="Escriba la descripción aquí" id="" name="descripcion">
                            </div>

                            <div style="margin-top: 3%;">
                                <select class="form-select" name="categoria_id">
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" style="margin:0 auto; width: 50%;">
                                <label class="col-form-label mt-4 name" for="">Número de piezas</label>
                                <input type="number" class="form-control validate" placeholder="Indique el número de piezas aquí" id="" name="piezas" min="1">
                            </div>

                            <div class="form-group" style="margin:0 auto; width: 50%;">
                                <label class="form-label mt-4">Precio</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3" style="margin:0 auto; width: 50%;">
                                <label for="formFileMultiple" class="form-label">Añada fotos del artículo</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple name="foto" accept="image/*" aria-label="Upload" autocomplete="off">
                            </div>

                            <div class="row" style=" margin: 0 auto; width:50%">
                                <button type="submit" class="btn btn-primary">Añadir</button>
                            </div>

                        </form>
                    </div>
                    <!-- /FORMULARIO -->
                </div>
            </div>
            <!-- MODAL -->
            @foreach($articulos as $articulo)

            <div class="modal fade" id="exampleModal{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$articulo->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edición del artículo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/guardaedicion" method="POST">
                            <div class="modal-body">

                                @csrf
                                <input type="hidden" name="id" id="inp-id" value="{{$articulo->id}}">
                                <label for="">Nombre de artículo</label>
                                <input type="text" name="nombre" id="inp-nombre" value="{{$articulo->nombre}}">
                                <br>
                                <label class="col-form-label mt-4 name" for="">Descripción</label>
                                <input type="text" class="form-control validate" value="{{$articulo->descripcion}}" id="" name="descripcion">
                                <br>
                                <label for="">Piezas</label>
                                <input type="number" name="piezas" id="inp-piezas" value="{{$articulo->piezas}}">
                                <br>
                                <label for="">Precio</label>
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio" value="{{$articulo->precio}}">
                                <span class="input-group-text">.00</span>
                                <br>
                                <select class="form-select" name="categoria_id">
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="formFileMultiple" class="form-label">Añada fotos del artículo</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple name="foto" accept="image/*" aria-label="Upload" autocomplete="off">
                                <br>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /MODAL -->
            <!-- TABLA -->
            <table class="table table-hover" style="width: 50%; margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Piezas</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <th scope="row">{{$articulo->nombre}}</th>
                        <td>{{$articulo->descripcion}}</td>
                        <td>{{$articulo->piezas}}</td>
                        <td>{{$articulo->precio}}</td>
                        <td>{{$articulo->nombreCategoria}}</td>
                        <td>
                            <img src="{{ asset('images/' . $articulo->image_path) }}" width="350">
                        </td>
                        <td><a href="/eliminar/{{$articulo->id}}">Eliminar</a></td>
                        <td>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$articulo->id}}">
                                Editar
                            </button> -->
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$articulo->id}}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /TABLA -->
            <!-- PDF -->
            <div class="card" style="width: 30%; margin-left: auto; margin-right: auto;">
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">Descargar todo el inventario de Recicla Bazar</h5>
                    <!-- FORMULARIO-->
                    <div class="row">
                        <form action="/descargaPdf" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Descargar">
                        </form>
                    </div>
                    <!-- /FORMULARIO -->
                </div>
            </div>
            <!-- /PDF -->
            <!-- IMPORTAR .CSV -->
            <!-- <div class="card" style="width: 30%; margin-left: auto; margin-right: auto;">
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">Importar un .csv</h5> -->
            <!-- FORMULARIO-->
            <!-- <div class="row">
                        <form action="/import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" accept=".csv" class="form-control">
                            <input type="submit" class="btn btn-primary" value="Importar">
                        </form>
                    </div> -->
            <!-- /FORMULARIO -->
            <!-- </div>
            </div> -->
            <!-- /IMPORTAR .CSV -->
        </div>
    </div>
</x-app-layout>
@include('layouts.footer')