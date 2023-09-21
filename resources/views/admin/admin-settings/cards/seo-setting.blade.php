<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.seo-setting.update') }}" method="POST">
            @csrf
            @method('PUT')
            {{-- NB: Don't add the value attributes yet, until there's first contents in the database --}}
            <div class="form-group">
                <label for="title">Site Seo Title</label>
                <input type="text" name="site_seo_title" id="title" value="{{ $settings['site_seo_title'] }}" class="form-control" value="">
                @error('site_seo_title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="description">Site Seo Description</label>
                <textarea name="site_seo_description" id="description" class="form-control" style="height: 300px" id="" cols="30" rows="10">{{ $settings['site_seo_description'] }}</textarea>
                @error('site_seo_description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="keyword">Site Seo Keywords</label>
                <input name="site_seo_keywords" type="text" id="keyword" class="form-control inputtags" value="{{ $settings['site_seo_keywords'] }}">
                @error('site_seo_keywords')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
