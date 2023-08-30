<header class="main-header">
	<div class="mobile-overlay"></div>
	<div class="container">
		<!-- Desktop Navigation-->
		<div class="header-sticky">
			<div class="logo-wrap logo-img">
				<img src="<?= get_template_directory_uri() ?>/assets/images/mjbaga-tech-black.png" alt="Logo">
			</div>
			<div class="mobile-nav mobile-only">
				<div class="hamburger-menu">
					<div class="nav-line l1"></div>
					<div class="nav-line l2"></div>
					<div class="nav-line l3"></div>
				</div>
			</div>
			<div class="navigation desktop">
				<div class="nav">
					<div class="nav-wrap">
						<div class="nav-main desktop-nav">
							<div class="nav-main__features"> 
								<?php print $data->primary_navigation; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
  