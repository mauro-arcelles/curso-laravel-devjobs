<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes) > 0)
            @foreach ($vacantes as $vacante)
                <div class="p-6 bg-white border-b border-gray-200 md:flex justify-between items-center">
                    <div class="space-y-3">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                        <p class="text-sm text-gray-500">Último dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                    </div>

                    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0 ">
                        <a href="#"
                            class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>
                        <a href="{{ route('vacantes.edit', $vacante->id) }}"
                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                        <button wire:click="$dispatch('mostrarAlerta', {vacanteId: {{ $vacante->id }}})"
                            class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
                    </div>
                </div>
            @endforeach
        @else
            <p class="p-3 text-center text-sm text-gray-500">No hay vacantes que mostrar</p>
        @endif
    </div>

    <div class="mt-10 white">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:initialized', function() {
            @this.on('mostrarAlerta', ({
                vacanteId
            }) => {
                Swal.fire({
                    title: "Eliminar Vacante?",
                    text: "Una vacante eliminada no se puede recuperar!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eliminarVacante', vacanteId)

                        Swal.fire({
                            title: "Se eliminó la vacante!",
                            text: "Eliminado correctamente.",
                            icon: "success"
                        });
                    }
                });
            })
        });
    </script>
@endpush
