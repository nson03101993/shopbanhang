@extends('admin_layout')

@section('main_content')

    <div style="background-color: #fff" class="row">
        <div class="col-lg-12">
            <div style="padding: 30px">
                <section class="content-header">
                    <h2>
                        Thông tin chi tiết đơn hàng #DH00{{ $orders->orders_id }}
                    </h2>
                </section>
                <section class="content">
                    <div style=" margin: -15px; ">                     
                        <section class="invoice">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="page-header">
                                        <i class="fa fa-globe"></i> Hóa đơn bán hàng
                                        <small class="pull-right">Ngày tạo: {{ $date_time }}</small>
                                    </h3>
                                </div>                           
                            </div>                
                            <div class="row invoice-info">
                                <div class="col-sm-8 invoice-col">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Người nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Họ tên: </th>
                                                <td>{{ $orders->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td>{{ $orders->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone: </th>
                                                <td>{{ $orders->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Địa chỉ: </th>
                                                <td>{{ $orders->customer_name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="col-sm-4 invoice-col">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Hóa đơn số #DH00{{ $orders->orders_id }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Mã đơn hàng: </th>
                                                <td>#DH00{{ $orders->orders_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ngày đặt: </th>
                                                <td>
                                                    <?php
                                                        $time = $orders->created_at;
                                                        $date = explode(" ", $time);
                                                        echo $date[0];
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tài khoản đặt hàng: </th>
                                                <td>968-34567</td>
                                            </tr>
                                            <tr>
                                                <th>Trạng thái: </th>
                                                <td>
                                                    <span class="label label-info">Đang chờ xử lý</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                            </div>
                             

                       
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình ảnh</th>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Giảm giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <img src="#"
                                                        alt="SỮA TƯƠI THANH TRÙNG KHÔNG ĐƯỜNG"
                                                        style=" width: 90px; height: auto; ">
                                                </td>
                                                <td>
                                                    SỮA TƯƠI THANH TRÙNG KHÔNG ĐƯỜNG
                                                </td>
                                                <td>2</td>
                                                <td>45.000 ₫</td>
                                                <td>0%</td>
                                                <td>90.000 ₫</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                         

                            <div class="row">
                                
                                <div class="col-xs-6">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><span class="">Lưu ý: </span></th>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <form action="#" method="POST">
                                            <input type="hidden" name="_token"
                                                value=""> <input type="hidden"
                                                name="_method" value="PUT">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 10px" for="status">Trạng thái</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" <?php if($orders->orders_status == 1){echo 'selected';} ?> > Đang chờ xử lý</option>
                                                        <option value="2" <?php if($orders->orders_status == 2){echo 'selected';} ?> > Đang giao</option>
                                                        <option value="3" <?php if($orders->orders_status == 3){echo 'selected';} ?> > Đã giao</option>
                                                        <option value="4" <?php if($orders->orders_status == 4){echo 'selected';} ?> > Đã hủy</option>
                                                    </select>
                                                    <small class="text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="margin-top: 10px;" for="">&nbsp;</label> <br>
                                                    <button type="submit" class="btn btn-info">Cập nhật trạng thái</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                    <img src=""
                                        alt="Visa">
                                    <img src=""
                                        alt="Mastercard">
                                    <img src=""
                                        alt="American Express">
                                    <img src=""
                                        alt="Paypal">
                                </div>
                                <div class="col-xs-6">


                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Tạm tính:</th>
                                                    <td>90.000 ₫</td>
                                                </tr>
                                                <tr>
                                                    <th>Phí vận chuyển:</th>
                                                    <td>Free</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tiền:</th>
                                                    <th>90.000 ₫</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                            </div>
                            

                            
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <br>
                                    <a href="" target="_blank"
                                        class="btn btn-default"><i class="fa fa-print"></i> In đơn hàng</a>
                                    &nbsp;
                                    <a href="" target="_blank"
                                        class="btn btn-default" style="margin-left: 5px;">
                                        <i class="fa fa-download"></i> Xuất hóa đơn
                                    </a>
                                    <a href="" class="btn btn-primary pull-right"
                                        style="margin-right: 5px;">
                                        Trở về
                                    </a>
                                    <a href=""
                                        class="btn btn-warning pull-right" style="margin-right: 5px;">
                                        Sửa đơn hàng này
                                    </a>
                                </div>
                            </div>
                        </section>
                        
                        <div class="clearfix"></div>
                    </div>

                </section>
                
            </div>
             
        </div>
    </div>

@endsection
