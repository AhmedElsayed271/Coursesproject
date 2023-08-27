@csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name Of Course</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
            placeholder="Enter Name Of Course" value="{{ old('name', $course->name ?? '') }}">
    </div>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
       <textarea class="form-control" name="description" id="" >{{ old('description', $course->name ?? '') }}</textarea>
    </div>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price"
            placeholder="Price" value="{{ old('price', $course->price ?? '') }}">
    </div>
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputEmail1">Old Price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="old_price"
            placeholder="Price" value="{{ old('old_price', $course->old_price ?? '') }}">
    </div>
    @error('old_price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div>
    </div>

        <div class="text-danger" id="video"></div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $type_button ?? "Update" }}</button>
</div>
