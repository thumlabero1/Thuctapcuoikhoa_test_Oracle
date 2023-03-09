@extends('admin.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
  <form action="/add-product" method="POST">
    @csrf
    <div class="mb-3">
      <label for="menu" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" name ="menu" id="menu" placeholder="Enter product name">
    </div>

    <div class="mb-3">
      <label class="form-label">Danh mục cha</label>
      <select class="form-control" name="parent_id" id="">
        <option value="0">
          Danh mục cha
        </option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Mô tả</label>
      <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description"></textarea>
    </div>

    <div class="mb-3 content" id=content>
      <label for="menu" class="form-label">Mô tả chi tiết</label>
      <textarea name="content" class="form-control" id="content"></textarea>
    </div>

    <div class="form-group">
      <label for="active">Trạng thái kích hoạt</label>
      <select class="form-select form-control" id="active" name="active">
        <option value="1">Có</option>
        <option value="0">Không</option>
      </select>
    </div> 

    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
  </form>

  <script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

@section('footer')
@endsection
