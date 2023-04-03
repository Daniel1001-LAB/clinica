<div class="card border-secondary mb-3 mt-4 shadow ">
    <div class="card-header bg-transparent border-secondary ">
        <h3 class="h4 capitalize">{{ __('assignable permissions') }}</h3>
        </div>
        <input type="hidden" name="id" value="{{ $role->id}}">
        <div class="card-body">
            <div class="grid grid-cols-2">
                @foreach ($permissions as $key=>$p )
                    <label for="permissions">
                    <input type="checkbox" name="permissions[]" id="permissions"
                    value="{{ $p->id }}"  {{ in_array($p->id,$permissions_id) ? "checked":""}}
                    >{{ __($p->privilege) }}
                    </label>
                @endforeach
            </div>
        </div>
</div>

