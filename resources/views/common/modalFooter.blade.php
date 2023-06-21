</div>
<div class="modal-footer">

    <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info"
        data-dismiss="modal" style="background-color: #343a40;">CERRAR</button>


    @if ($selected_id < 1)
        <button type="button" wire:click.prevent="Store()" class="btn btn-dark close-modal">GUARDAR</button>
    @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal">ACTUALIZAR</button>
    @endif


</div>
</div>
</div>
</div>
