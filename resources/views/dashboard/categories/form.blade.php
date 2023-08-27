@csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name Of Category</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
            placeholder="Enter Name Of Category" value="{{ old('name',$category->name ?? "") }}">
    </div>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" value="active" @if(old('status',$category->status ?? "") == "active") checked @endif>
          <label class="form-check-label">active</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" value="inactive" @if(old('status',$category->status ?? "") == "inactive") checked @endif>
          <label class="form-check-label">inactive</label>
        </div>
      </div>
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_name ?? "Update" }}</button>
</div>