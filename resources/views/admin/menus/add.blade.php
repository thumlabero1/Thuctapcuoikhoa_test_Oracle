@extends('admin.main')
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
    <textarea name="description" class="form-control" id="menu" rows="3" placeholder="Enter product description"></textarea>
  </div>

  <div class="mb-3">
    <label for="menu" class="form-label">Mô tả chi tiết</label>
    <textarea name="content" class="form-control" id="menu" rows="3" placeholder="Enter product description"></textarea>
  </div>

    <div class="form-group">
      <label>kích hoạt</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="productType" id="active" value="type1">
        <label class="form-check-label" for="type1">
          Type 1
        </label>
      </div>
      
      <div class="form-check">
        <input class="form-check-input" type="radio" name="productType" id="type2" value="type2">
        <label class="form-check-label" for="type2">
          Type 2
        </label>
      </div>
      
    </div>
  <button type="submit" class="btn btn-primary">Tạo danh mục</button>
</form>

@endsection