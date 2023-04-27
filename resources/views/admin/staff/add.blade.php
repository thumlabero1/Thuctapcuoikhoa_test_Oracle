@extends('admin.main')

@section('content')
<form action="" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="name" class="form-label">Tên:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="address" class="form-label">Địa chỉ:</label>
        <input type="text" name="address" id="address" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="start_day" class="form-label">Ngày vào làm:</label>
        <input type="date" name="start_day" id="start_day" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="staff_id" class="form-label">Mã nhân viên:</label>
        <input type="text" name="staff_id" id="staff_id" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="salary" class="form-label">Lương cơ bản:</label>
        <input type="number" name="salary" id="salary" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="coefficients_salary" class="form-label">Hệ số lương:</label>
        <input type="number" name="coefficients_salary" id="coefficients_salary" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="thumb" class="form-label">Hình ảnh:</label>
        <input type="file" name="thumb" id="thumb" class="form-control-file" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>
        @csrf
    </form>
@endsection

