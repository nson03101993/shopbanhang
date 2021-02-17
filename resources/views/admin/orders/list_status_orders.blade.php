@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Đơn Hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Lọc theo tên</option>
                        <option value="1">Lọc theo mô tả</option>
                        <option value="2">Lọc theo trạng thái</option>
                    </select>
                    <button class="btn btn-sm btn-default">Lọc</button>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_orders as $key => $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>#DH00{{ $items->orders_id }}</td>
                                <td>{{ $items->customer_name }}</td>
                                <td>{{ $items->address }}</td>
                                <td>{{ $items->phone }}</td>
                                <td>{{ $items->orders_total }}</td>
                                <td>{{ $items->created_at }}</td>
                                <td>
                                    <?php
                                        switch($items->orders_status){
                                            case 1:
                                                echo '<p class="text-primary">Đang chờ xử lý</p>';
                                                break;
                                            case 2:
                                                echo '<p class="text-warning">Đang giao</p>';
                                                break;
                                            case 3:
                                                echo '<p class="text-success">Đã giao</p>';
                                                break;
                                            default:
                                                echo '<p class="text-danger">Đã hủy</p>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} đơn hàng</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $all_orders->links() }} 
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center">
                        <span style="font-size: 20px; color: red; padding-right: 20px" class="fa fa-thumbs-down">Ẩn</span>
                        <span style="font-size: 20px; color: blue" class="fa fa-thumbs-up">Hiển thị</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
