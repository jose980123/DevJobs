<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center mb-10">
                        Mis Notificaciones
                    </h1>
                    @forelse ($notificaciones as $notify )
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center m-2 rounded-lg shadow-md">
                            <div>
                                <p>Tienes un candidato en:
                                    <span class="font-bold">{{ $notify->data['nombre_vacante'] }}</span>
                                </p>
                                <p>
                                    <span class="font-bold">{{ $notify->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                            <div class="mt-2 lg:mt-0">
                                <a href="{{ route('candidatos.index', $notify->data['id_vacante']) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                    Ver Candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-600">No hay notificaciones que mostrar</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>