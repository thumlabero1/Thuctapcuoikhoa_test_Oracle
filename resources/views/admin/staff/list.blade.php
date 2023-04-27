@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Ngày vào làm</th>
            <th>Mã nhân viên</th>
            <th>Lương cơ bản</th>
            <th>Hệ số lương</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($staffs as $key => $staff)
            <tr>
                <td>{{ $staff->id }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->address}}</td>
                <td>{{ $staff->start_day }}</td>
                <td>{{ $staff->staff_id }}</td>
                <td>{{ $staff->salary }}</td>
                <td>{{ $staff->coefficients_salary }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/staff/edit/{{ $staff->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $staff->id }}, '/admin/staff/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   
@endsection


