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
                    <table class="table table-bordered table-striped  mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th scope="col" class="table-th text-white ">ID</th>
                                <th scope="col" class="table-th text-white text-center">DESCRIPCIÓN</th>
                                <th scope="col" class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        @foreach ($permissions as $permission)
                            <tbody>
                                <tr>
                                    <td >
                                        <h6>{{ $permission->id }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $permission->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar Registro"
                                            wire:click="Edit({{ $permission->id }})">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="btn btn-dark" title="Delete"
                                            onclick="Confirm('{{ $permission->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                    {{$permissions->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.permissions.form')
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('permission-added', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('permission-updated', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('permission-deleted', msg => {
                // $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('permission-exists', msg => {
                noty(msg)
            })
            window.livewire.on('permission-error', msg => {
                noty(msg)
            })
            window.livewire.on('hide-modal', msg => {
                $('#theModal').modal('hide');
                // noty(msg)
            })
            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
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
                    window.livewire.emit('destroy', id)
                    swal.close()
                }
            })
        }
    </script>
@endpush
