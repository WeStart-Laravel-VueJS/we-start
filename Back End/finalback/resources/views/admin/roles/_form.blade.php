<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $role->name) }}">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    {{-- @dump($role->permissions->find(2)) --}}
    <div class="col-md-12">
        <div class="mb-3">
            <label for="name">Permissions</label>

            <br><label><input type="checkbox" id="check_all"> All Permissions</label>
            <ul style="column-count: 2" class="list-unstyled">
                @foreach ($permissions as $p)
                <li>
                    <label><input @checked($role->permissions->find($p->id)) type="checkbox" name="permissions[]" value="{{ $p->id }}"> {{ $p->name }}</label>
                </li>
                @endforeach

            </ul>

        </div>
    </div>

</div>

@section('js')

<script>
    $('#check_all').change(function() {
        $('ul input[type=checkbox]').prop('checked', this.checked)
    })
</script>

@stop
