<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acerca de') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- ABOUT US -->
        <div class="contenedor" style="width: 100%;">
            <!-- VIDEO -->
            <video autoplay muted loop>
                <source src="{{ asset('assets/media/video.mp4') }}" type="video/mp4">
                No es compatible :c
            </video>
            <!-- /VIDEO -->

            <section id="sect1" class="sect">
                <h1 style="color:white !important; font-size:23px; width:100%">Recicla Bazar es una familia de distintas marcas, lo que hace posible que los clientes se expresen a través
                    de la moda y el diseño, y elijan un estilo de vida más sostenible. Vendemos valor para las personas y la sociedad en
                    general al ofrecer nuestra oferta al cliente y al desarrollarnos con un enfoque en el crecimiento sostenible y rentable.</h>
            </section>
        </div>
        <!-- /ABOUT US -->
    </div>
</x-app-layout>
@include('layouts.footer')