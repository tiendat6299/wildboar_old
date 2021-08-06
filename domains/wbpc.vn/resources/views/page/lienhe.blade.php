@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên Hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Thông tin Liên Hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1566.0242734168926!2d105.82017515939297!3d21.00648559756742!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad4b1b72a0a71bce!2sWild%20Boar%20Store!5e0!3m2!1svi!2s!4v1595185500121!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Phiếu Liên lạc</h2>
					<div class="space20">&nbsp;</div>
					<p>Thông qua việc đăng kí và phản hồi của các bạn, bên mình sẽ cố gắng phát triển mạnh mẽ hơn</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ và Tên (bắt buộc">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email của bạn (bắt buộc)">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội Dung"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên lạc</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						26B N4 TT Binh Đoàn 12 (Đối diện 161, Thịnh Quang, Đống Đa, Hà Nội<br>
						Việt Nam
					</p>
					<div class="space20">&nbsp;</div>
										<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Tuyển dụng</h6>
					<p>
						Bên mình luôn cần tuyển thêm những cộng tác viên có năng lực và có ý chí phấn đấu trong công việc <br>
						<a href="chuoi0223@gmail.com">chuoi0223@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection