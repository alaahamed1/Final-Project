<div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
    </div>
</div>

<div class="row mb-3">
    <label for="Description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description"
            value="{{ $category->description }}">
    </div>
</div>
