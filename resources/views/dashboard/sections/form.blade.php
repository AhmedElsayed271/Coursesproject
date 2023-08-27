@csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name Of Section</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
            placeholder="Enter Name Of Category" value="{{ old('name', $section->name ?? '') }}">
    </div>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputEmail1">section number</label>
        <input type="text" class="form-control" name="section_no" id="exampleInputEmail1"
            placeholder="section number" value="{{ old('section_no', $section->Section_no ?? '') }}">
    </div>
    @error('section_no')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <input type="hidden" class="form-control" name="course_id" id="exampleInputEmail1"
            placeholder="Enter Name Of Category" value="{{ $course_id ?? '' }}">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button id="submit" type="submit" class="btn btn-primary">{{ $button_name ?? "Update" }}</button>
</div>
