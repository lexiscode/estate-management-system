<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.general-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- NB: Don't add the value attributes yet, until there's first contents in the database --}}
            <div class="form-group">
                <label for="">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
                @error('site_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_logo']) }}" alt="" width="150px"> <br>
                <label for="">Site Logo</label>
                <input type="file" name="site_logo" class="form-control">
                @error('site_logo')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_favicon']) }}" alt="" width="150px"> <br>
                <label for="">Site Favicon</label>
                <input type="file" name="site_favicon" class="form-control">
                @error('site_favicon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
