<div>
    @livewire('filtrar-vacantes')
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
                Las Vacantes Disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6">
                @forelse ($vacantes as $vacante )
                    <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center m-2 rounded-lg shadow-md">
                        <div>
                            <a class="text-3xl font-extrabold text-gray-600" href="{{ route('vacantes.show', $vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{ $vacante->empresa }}</p>
                            <p class="font-bold text-xs text-gray-600">Fecha limite: 
                                <span class="font-normal">
                                    {{ $vacante->ultimo_dia->format('d/m/y') }} {{ $vacante->ultimo_dia->diffForHumans() }}
                                </span>
                            </p>
                        </div>
                        <div class="mt-2 lg:mt-0">
                                <a href="{{ route('vacantes.show', $vacante->id) }}"
                                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase block text-center">
                                    Ver Vacante
                                </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay Vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
