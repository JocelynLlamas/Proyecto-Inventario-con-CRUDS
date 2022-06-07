<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="col">
            <div class="card" style="width: 30%; margin-left: auto; margin-right: auto;">
                <div class="card-image" style="width: 100%;">
                    <img src="https://lp2.hm.com/hmgoepprod?set=width[960],quality[80],options[limit]&source=url[https://www2.hm.com/content/dam/sustainability-site/lets-be-transparent/9501-CPM-36_16x9-lets-be-transparent.jpg]&scale=width[global.width],height[15000],options[global.options]&sink=format[jpg],quality[global.quality]" class="card-img-top" alt="...">
                </div>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">Añadir una nueva categoría al inventario</h5>
                    <!-- FORMULARIO-->
                    <div class="row">
                        <form class="col s12" action="/crearCategoria" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group" style="margin:0 auto; width: 50%;margin-bottom:5%">
                                <label class="col-form-label mt-4 name" for="">Nombre</label>
                                <input type="text" class="form-control validate" placeholder="Escriba el nombre aquí" id="" name="nombreCategoria">
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
            @foreach($categorias as $categoria)

            <div class="modal fade" id="exampleModal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$categoria->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edición de la categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/guardaedicionCat" method="POST">
                            <div class="modal-body">

                                @csrf
                                <input type="hidden" name="id" id="inp-id" value="{{$categoria->id}}">
                                <label for="">Nombre de la categoría</label>
                                <input type="text" name="nombreCategoria" id="inp-nombre" value="{{$categoria->nombreCategoria}}">
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
            <table class="table table-hover" style="width: 30%; margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td><a href="/articuloPorCategoria/{{$categoria->id}}">{{$categoria->nombreCategoria}}</a></td>
                        <td><a href="/eliminarCat/{{$categoria->id}}">Eliminar</a></td>
                        <td>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Editar
                            </button> -->
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$categoria->id}}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /TABLA -->
        </div>
    </div>
</x-app-layout>
@include('layouts.footer')