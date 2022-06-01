<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 55%;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/logo.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 style="color: white; font-size:100px; margin-top:-130%">Ropa</h1>
                            </div>
                            <img src="{{ asset('assets/img/blusa.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/lentes.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 style="color: white; font-size:100px; margin-top:-130%">Accesorios</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/botas.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 style="color: white; font-size:100px; margin-top:-130%">Zapatos</h1>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('layouts.footer')