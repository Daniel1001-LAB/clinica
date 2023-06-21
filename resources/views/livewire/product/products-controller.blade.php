<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('productos.create')
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                    @endcan
                </ul>
            </div>
            @can('productos.search')
            @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white">DESCRIPCIÓN</th>
								<th class="table-th text-white text-center">BARCODE</th>
								<th class="table-th text-white text-center">CATEGORÍA</th>
                                <th class="table-th text-white text-center">COSTO</th>
								<th class="table-th text-white text-center">PRECIO</th>
								<th class="table-th text-white text-center">STOCK</th>
								<th class="table-th text-white text-center">INV.MIN</th>
								<th class="table-th text-white text-center">IMAGEN</th>
								<th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
									<h6 class="text-left">{{$product->name}}</h6>
								</td>
								<td>
									<h6 class="text-center">{{$product->barcode}}</h6>
								</td>
								<td>
									<h6 class="text-center">{{$product->category}}</h6>
								</td>
                                <td>
									<h6 class="text-center">{{$product->cost}}</h6>
								</td>
								<td>
									<h6 class="text-center">{{$product->price}}</h6>
								</td>
								<td>
									<h6 class="text-center {{$product->stock <= $product->alerts ? 'text-danger' : '' }} ">
										{{$product->stock}}
									</h6>
								</td>
								<td>
									<h6 class="text-center">{{$product->alerts}}</h6>
								</td>


                                <td class="text-center">
                                    <span>
                                        <img src="{{asset('storage/' . $product->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    @can('productos.edit')
                                    <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Edit"
                                    wire:click.prevent="Edit({{$product->id}})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('productos.delete')
                                    <a href="javascript:void(0)" class="btn btn-dark" title="Delete"
                                    onclick="Confirm('{{$product->id}}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan

                                    <button type="button" wire:click.prevent="ScanCode('{{$product->barcode}}')" class="btn btn-dark"><i class="fas fa-shopping-cart"></i>
									</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.product.form')
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('product-added', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('product-updated', msg => {
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('product-deleted', msg => {
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
