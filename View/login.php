<section>
	<div class="container">

		<div class="col-md-8" style="margin-left: 350px;">
			<h3 class=" text-center">Bạn đã có tài khoản?</h3>
			<form action="index.php?action=dangnhap&act=dangnhap_action" method="post" class="signin-form">
				<div class="form-group">
					<input type="text" class="form-control" name="txtusername" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input id="password-field" type="password" name="txtpassword" class="form-control" placeholder="Password" required>
					
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
				</div>
				<div class="form-group d-md-flex">
					<div class="w-50">

					</div>
					<div class="w-50 text-md-right">
						<a href="index.php?action=forget">Quên mật khẩu</a>
					</div>
				</div>
			</form>

		</div>
	</div>
</section>