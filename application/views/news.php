<section class="background">
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title_main pt-2 text-center">
						<h2>News</h2>
						<nav aria-label="breadcrumb" class="bread_main">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">News</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-3">
					<?= anchor('news-details', '
						<div class="card crd_nws" style="width: 100%;">
							<img class="card-img-top crd_nws_img" src="assets/images/user.png" alt="Card image cap">
							<div class="card-body crd_nws_bdy">
								<h5 class="card-title crd_nws_title">Card title</h5>
								<p class="card-text crd_nws_text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
							</div>
						</div>
					', 'class="crd_nws_a"') ?>
					
				</div>
			</div>

			

		</div>
	</section>
</section>