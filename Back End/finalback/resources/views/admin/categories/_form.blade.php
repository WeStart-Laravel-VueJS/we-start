<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_en">English Name</label>
            <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $category->name_en) }}">
            @error('name_en')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_ar">Arabic Name</label>
            <input type="text" name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $category->name_ar) }}">
            @error('name_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_en">English Description</label>
            <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="4" >{{ old('description_en', $category->description_en) }}</textarea>
            @error('description_en')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_ar">Arabic Description</label>
            <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" rows="4" >{{ old('description_ar', $category->description_ar) }}</textarea>
            @error('description_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $category->icon) }}">
            @error('icon')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
            <small class="form-text">Copy icon name form <a href="https://fontawesome.com/search">FontAwesome</a></small>

        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="parent_id">Parent</label>
            <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                <option value="">Select Parent</option>
                @foreach ($categories as $c)
                    <option @checked($category->id == $c->id) value="{{ $c->id }}">{{ $c->name_trans }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror

        </div>
    </div>
</div>
