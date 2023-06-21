<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        @can('categorias.create')
                            <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal"
                                data-target="#theModal">Agregar</a>
                        @endcan
                    </li>
                </ul>
            </div>
            @can('categorias.search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped  mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th scope="col" class="table-th text-white">DESCRIPCIÓN</th>
                                <th scope="col" class="table-th text-white text-center">IMAGEN</th>
                                <th scope="col" class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        @foreach ($categories as $category)
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <h6>{{ $category->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            <img src="{{ asset('storage/' . $category->imagen) }}"
                                                alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @can('categorias.edit')
                                        <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Edit"
                                            wire:click="Edit({{ $category->id }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('categorias.delete')
                                        <a href="javascript:void(0)" class="btn btn-dark" title="Delete"
                                            onclick="Confirm('{{ $category->id }}', '{{ $category->products->count() }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endcan

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('category-added', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('category-deleted', msg => {
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
        });

        function Confirm(id, products) {

            if (products > 0) {
                swal('NO SE PUEDE ELIMINAR LA CATEGORIA PROQUE TIENE PRODUCTOS RELACIONADOS')
                return;
            }

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
