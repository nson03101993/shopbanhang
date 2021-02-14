@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Sản Phẩm
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
                <div class="col-sm-4">
                    @if (Session::has('message'))
                        <h3 class="text-danger">{{ Session::get('message') }}</h3>
                    @endif
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
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Tồn Kho</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Mô tả</th>
                            <th>Danh Mục</th>
                            <th>Thương Hiệu</th>
                            <th>Trạng thái</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$items->product_name}}</td>
                                <td>{{number_format($items->product_price,0,",",".")}} VNĐ</td>
                                <td>{{$items->product_quantity}}</td>
                                <td><img width="60px" height="60px" src="{{asset('public/backend/uploads/product/'.$items->product_image)}}" /></td>
                                <td>{!!$items->product_desc!!}</td>
                                <td>{{$items->category->cat_name}}</td>
                                <td>{{$items->brand->brand_name}}</td>
                                <td>
                                    <?php
                                        if($items->product_status == 0){
                                    ?>
                                        <a href="{{ route('unhide_product',['product_id' => $items->product_id]) }}"><span style="font-size: 25px; color: red" class="fa fa-thumbs-down"></span></a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <a href="{{ route('hide_product',['product_id' => $items->product_id]) }}"><span style="font-size: 25px; color: blue" class="fa fa-thumbs-up"></span></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('edit_product', ['product_id'=>$items->product_id]) }}"><i class="fa fa-pencil-square-o text-success"></i></a>
                                    <a onClick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{{ route('delete_product', ['product_id' => $items->product_id, 'product_image' => $items->product_image ]) }}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} sản phẩm</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                           {{--  <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li> --}}
                            {{ $all_product->links() }}
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
