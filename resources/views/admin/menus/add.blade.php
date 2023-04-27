@extends('admin.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
<h2 class="text-white text-center">Thêm danh mục</h2>
  <form action="" method="POST">
    <div class="form-group mb-3">
      <label for="menu" class="form-label text-white font-weight-bold">Tên danh mục</label>
      <input type="text" class="form-control" name ="name" id="name" placeholder="Nhập tên danh mục">
    </div>

    <div class="mb-3">
      <label class="form-label text-white font-weight-bold">Danh mục cha</label>
      <select class="form-control" name="parent_id" id="parent_id">
        @foreach($menus as $menu)
        <option value="{{$menu->id}}">{{$menu->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Mô tả</label>
      <textarea name="description" class="form-control" id="description" rows="3" placeholder="Mô tả danh mục"></textarea>
    </div>

    <div class="mb-3 content" id=content>
      <label for="menu" class="form-label text-white font-weight-bold">Mô tả chi tiết</label>
      <textarea name="content" class="form-control" id="content"></textarea>
    </div>
<br>
    <div class="form-group">
      <label for="active" class="form-label text-white font-weight-bold">Trạng thái kích hoạt</label>
      <select class="form-select form-control" id="active" name="active">
        <option value="1">Có</option>
        <option value="0">Không</option>
      </select>
    </div> 
<br>
    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    @csrf
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
