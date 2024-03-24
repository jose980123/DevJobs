<div>
    <div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
        <h3 class="text-center text-2xl font-bold my-4">
            Postularme a esta vacante
        </h3>
            @if (session()->has('mensaje'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">{{session('mensaje')}}</p>
                        </div>
                    </div>
                </div>
            @else
                <form  wire:submit.prevent='postularme' action="" class="w-96 mt-5">
                    <div>
                        <x-input-label for="cv" :value="__('Hoja de Vida')" />
                        <x-text-input id="cv" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-gray-500
                            hover:file:bg-violet-100" type="file" wire:model="cv" accept=".pdf" />
                    
                        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                    </div>

                    <x-primary-button class="my-5" wire:click="$dispatch('candidato')">
                        Aplicar
                    </x-primary-button>
                </form>
            @endif
    </div>
</div>