<!-- BEGIN #header -->
		<div id="header" class="app-header">
			
			<!-- BEGIN desktop-toggler -->
			<div class="desktop-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- BEGIN desktop-toggler -->
			
			<!-- BEGIN mobile-toggler -->
			<div class="mobile-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- END mobile-toggler -->
			
			
			
			<!-- BEGIN brand -->
			<div class="brand">
				<a href="/admin" class="brand-logo">
					<img src="../forimages/fastmini.png" style="width:60%;">
				</a>
			</div>
			<!-- END brand -->
			
			<!-- BEGIN menu -->
			<div class="menu">
			
				<div class="menu-item dropdown dropdown-mobile-full">
					<a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
						<div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
						<div class="menu-badge bg-theme"></div>
					</a>
					<div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
						<h6 class="dropdown-header fs-10px mb-1">BİLDİRİMLER</h6>
						<div class="dropdown-divider mt-1"></div>
						
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px w-20px">
								<i class="bi bi-gear text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">KURULUM TAMAMLANDI</div>
								<div class="small text-inverse text-opacity-50">Sistem çalışmayı sürdürüyor...</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						
						
						<hr class="my-0">
						<div class="py-10px mb-n2 text-center">
							<a href="#" class="text-decoration-none fw-bold">TÜMÜ OKUNDU</a>
						</div>
					</div>
				</div>
				<div class="menu-item dropdown dropdown-mobile-full">
					<a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
						<div class="menu-img online">
							<img src="images/mask.jpg" alt="Profile" height="60">
						</div>
						<div class="menu-text d-sm-block d-none w-170px">
							<span>[Yönetici : <?=$kullanici_adi?>]</span></div>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
    <a class="dropdown-item d-flex align-items-center" href="fast-out.php">Çıkış Yap <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
</div>

				</div>
			</div>
			<!-- END menu -->
			
			<!-- BEGIN menu-search -->
			<form class="menu-search" method="POST" name="header_search_form">
				<div class="menu-search-container">
					<div class="menu-search-icon"><i class="bi bi-search"></i></div>
					<div class="menu-search-input">
						<input type="text" class="form-control form-control-lg" placeholder="Search menu...">
					</div>
					<div class="menu-search-icon">
						<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
					</div>
				</div>
			</form>
			<!-- END menu-search -->
		</div>
		<!-- END #header -->