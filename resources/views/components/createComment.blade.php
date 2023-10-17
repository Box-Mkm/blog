<form action="/posts/{{ $post->id }}/comments" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">الاسم</label>
        <input name="name"  class="form-control" id="name">
    </div>
    @error('name')
        <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
        @enderror
    <div class="form-group">
        <label for="body">تعليق</label>
        <textarea class="form-control" name ="body" id="body" rows="3"></textarea>
    </div>
    @error('body')
        <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
        @enderror
    <button type="submit" class="btn btn-primary">حفظ</button>
</form>
