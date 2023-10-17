<style>
    .form-control{
        height: auto;
    }
</style>
        @csrf
        <div class="form-group">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title ?? '' }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-control">
            <label for="body">نص المقاله</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body ?? '' }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-control">
            <label for="author">بقلم</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ $post->author ?? '' }}">
        </div>
        @error('author')
            <div class="text-danger">{{ $message }}</div>
            @enderror

