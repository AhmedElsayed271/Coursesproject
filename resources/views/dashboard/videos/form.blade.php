@csrf
<div class="card-body">
    <div class="text-danger" id="errorvido"></div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="video" accept="video/*">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div>
        @error('video')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-danger" id="video"></div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="section_id" id="exampleInputEmail1"
            placeholder="Enter Name Of Category" value="{{ $section_id ?? '' }}">
    </div>

    <div class="progress">
        <div id="progressbar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div id="statustxt">0%</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button id="UploadBtn" type="submit" class="btn btn-primary">Upload</button>
</div>
