@extends('sidebar')

@section('main_content')

<div id="account-page">
	<div class="container">
		<div class="account-box">
			<h1>Thu Minh</h1>
			<div class="row">
				<div class="col-md-9">
					<div class="details-account">
                        <h4>Thông tin tài khoản</h4>
                        <div class="box-content">
                            <div class="row">
                                <form method="POST" action="#" id="formUpdateInfoUser" enctype="multipart/form-data">
                                    <div class="col-md-7">
                                        {{ @csrf_token }}
                                        <input type="hidden" name="_method" value="PUT">                                            
                                        <input type="hidden" name="id" value="62">
                                        <label for="name" class="label-register">Họ và tên <span class="red">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên"  autocapitalize="words" value="Thu Minh">
                                        <label class="error"></label>
                                        <br>

                                        <label for="username" class="label-register">UserName <span class="red">*</span></label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="UserName"  autocapitalize="words" value="thuminh">
                                        <label class="error"></label>
                                        <br>
                                        <label for="phone" class="label-register">Phone</label>
                                        <input type="text" placeholder="Phone" class="form-control "  disabled="" value="0977036293">
                                        <br>
                                        <label for="email" class="label-register">Email</label>
                                        <input type="email" placeholder="Email" class="form-control "  disabled="" value="thuminh@gmail.com">
                                        <br>
                                        <label for="address" class="label-register">Địa chỉ <span class="red">*</span></label>
                                        <input type="text" name="address" id="address" placeholder="Địa chỉ" class="form-control "  autocorrect="off" autocapitalize="off" value="Hà Nội Hải Phòng Nghệ An">
                                        <label class="error"></label>
                                        <br>
                                        <input type="checkbox" id="changePassword"> <label for="chkChangePassword" class="label-register">Thay đổi mật khẩu </label>
                                        <br>
                                        <div style="display: none" id="blockPassword">
                                            <label for="password" class="label-register">Password <span class="red">*</span></label>
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control ">
                                            <label class="error"></label>
                                            <br>
                                            <label for="password_confirm" class="label-register">Password Confirm <span class="red">*</span></label>
                                            <input type="password" name="password_confirm" id="password_confirm" placeholder="Password Confirm" class="form-control ">
                                            <label class="error"></label>
                                        </div>
                                        <br>
                                        <p>
                                            <input type="submit" value="Cập nhật" class="btn btn-warning">
                                        </p>
                                    </div>
                                    <div class="col-md-offset-1 col-md-3">
                                        <div class="upload-image">
                                            <img src="http://websitebansua.test/images/employee.png" title="Thu Minh" alt="Thu Minh" style="max-width: 100%;border-radius: 50%;width: 130px;height: 130px;">
                                            <input name="avatar" type="file" accept="image/*" class="custom-file-input">
                                        </div>
                                        <label id="avatar-error" class="error" for="avatar"></label>
                                        <small class="text-danger"></small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#changePassword').on('click', function(){
        if( $('#blockPassword').is(':hidden')){
            $('#blockPassword').show();
        }
        else{
            $('#blockPassword').hide();
        }
    });
</script>


@endsection
