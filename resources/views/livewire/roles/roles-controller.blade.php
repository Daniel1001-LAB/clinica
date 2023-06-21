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
                        @foreach ($roles as $role)
                            <tbody>
                                <tr>
                                    <td >
                                        <h6>{{ $role->id }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $role->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar Registro"
                                            wire:click="Edit({{ $role->id }})">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="btn btn-dark" title="Delete"
                                            onclick="Confirm('{{ $role->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.roles.form')
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('role-added', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('role-updated', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('role-deleted', msg => {
                // $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('role-exists', msg => {
                noty(msg)
            })
            window.livewire.on('role-error', msg => {
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
