<div>
    <div class="p-10">
        <div class="mb-5">
            <h3 class="font-bold text-3xl text-gray-800 my-3">
                {{ $vacante->titulo }}
            </h3>
            <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10 rounded-lg">
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Empresa:
                    <span class="normal-case font-normal">
                        {{ $vacante->empresa }}
                    </span>
                </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Ultimo dia:
                    <span class="normal-case font-normal">
                       {{ $vacante->ultimo_dia->format('d/m/y') }} {{ $vacante->ultimo_dia->diffForHumans() }}
                    </span>
                </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Categoría:
                    <span class="normal-case font-normal">
                       {{ $vacante->categoria->categoria }}
                    </span>
                </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Salario:
                    <span class="normal-case font-normal">
                       {{ $vacante->salario->salario}}
                    </span>
                </p>
            </div>
        </div>
        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="Imagen de la vacante {{$vacante->titulo}}">
            </div>

            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold mb-5">
                    Descripción del puesto
                </h2>
                <p>
                    {{$vacante->descripcion}}
                </p>
            </div>
        </div>
        @guest
            <div class="mt-5 p-5 text-center">
                <button
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center hover:bg-emerald-600"
                    wire:click="$dispatch('aplicarVacante', {{ $vacante->id }})">
                    Aplicar
                </button>
            </div>
        @endguest

        @cannot('create', App\Model\Vacante::class)
            @livewire('postular-vacante', ['vacante' => $vacante])
        @endcan
        

    </div>
</div>
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('livewire:initialized', () => {
                @this.on('aplicarVacante', (vacanteId) => {
                    Swal.fire({
                        title: '¿Quieres Aplicar a esta Vacante?',
                        text: "Para aplicar tienes que iniciar sesíon!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Aplicar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // login
                            @this.call('aplicar', vacanteId);
                        }
                    })
     
                });
            });
</script>
@endpush