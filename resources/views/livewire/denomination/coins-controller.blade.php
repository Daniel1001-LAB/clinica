<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal"
                            data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th scope="col" class="table-th text-white">TIPO</th>
                                <th scope="col" class="table-th text-white text-center">VALOR</th>
                                <th scope="col" class="table-th text-white text-center">IMAGEN</th>
                                <th scope="col" class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        @foreach ($coins as $coin)
                            <tbody>
                                <tr>
                                    <td >
                                        <h6 class="">{{ $coin->type }}</h6>
                                    </td>
                                    <td >
                                        <h6 class="text-center">Lps. {{ number_format($coin->value, 2) }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            <img src="{{ asset('storage/' . $coin->imagen) }}"
                                                alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Edit"
                                            wire:click="Edit({{ $coin->id }})">

                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="btn btn-dark" title="Delete"
                                            onclick="Confirm('{{ $coin->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                    {{$coins->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.denomination.form')
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('item-added', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('item-updated', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('item-deleted', msg => {
                // $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('hide-modal', msg => {
                $('#theModal').modal('hide');
                // noty(msg)
            })
            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
            })
            window.livewire.on('hidden.bs.modal', msg => {
                $('.er').css('display', 'none');
            })

            $('#theModal').on('hidden.bs.modal', function(e) {
                $('.er').css('display', 'none');
            })
        });

        function Confirm(id) {

            swal({
                title: 'CONFIRMAR',
                text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cerrar',
                cancelButtonColor: '#fff',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3B3F5C',
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id)
                    swal.close()
                }
            })
        }
    </script>
@endpush
