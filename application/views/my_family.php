<section class="background">
	<section class="content">
		<div class="container">
			<div class="row content_main">
				<div class="padd">
					<div class="col-12">
						<div class="title_main pt-2 text-center">
							<h2>My Family</h2>
							<nav aria-label="breadcrumb" class="bread_main">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Family</li>
								</ol>
							</nav>
						</div>
					</div>
					
					<div class="col-lg-2 member_detail_left">
						<div class="sec_content">
							<div class="content-1">
								<p>
									<?= anchor('login', "Login", 'class="contet_a"') ?>
								</p>
							</div>
							<div class="content-1">
								<p>
									<a class="contet_a" href="javascript:;">My Family</a>
								</p>
							</div>
							<div class="content-1">
								<p>
									<a class="contet_a" href="javascript:;">Register Your Family Free</a>
								</p>
							</div>
							<div class="content-1">
								<p>
									<a class="contet_a" href="javascript:;">Family Tree</a>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-10 member_detail_middle">
						<div class="log_in">
							<form action="/action_page.php">
								<label for="html"><strong>Mobile / Email </strong></label><br>
								<input name="user_name" type="text" value="" size="30" placeholder=""><br>
								<label for="html"><strong>Password	: </strong></label><br>
								<input name="password" type="password" size="30">
							</form>
							<p class="family_p">Enter your Mobile number or email address as per your profile details with us to receive OTP to login.</p>
							<p class="family_p">By logging in to website you are declaring that you are agreeing to <span><a href="javascript:;">Terms and Conditions</a> and <a href="javascript:;">Privacy Policy</a></span> </p>
							<div class="otp_main">
							<a class="otp" href="javascript:;">Get Otp</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>