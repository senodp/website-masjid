<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="<?=site_url()?>" class="navbar-brand p-0">
        <h2 class="m-0">
            <i class="fa fa-mosque me-2"></i>
            Al Muhajirin
        </h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <?php foreach ($Menu_parents as $Menu): ?>
            <?php if ( array_key_exists($Menu['id'], $Menu_children) ): ?>
            <!-- <a href="index.html" class="nav-item nav-link active">Home</a> -->
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                <div class="dropdown-menu m-0">
                    <a href="singlepage.html" class="dropdown-item">Profile Lengkap</a>
                    <a href="tim-dkm.html" class="dropdown-item">Susunan Pengurus DKM</a>
                    <a href="jamaah.html" class="dropdown-item">Data Semua Jamaah</a>
                </div>
            </div> -->
            <!-- <a href="about.html" class="nav-item nav-link">Profile</a> -->

            <!-- <a href="singlepage.html" class="nav-item nav-link">Manajemen Masjid</a>
            <a href="artikel.html" class="nav-item nav-link">Artikel</a>
            <a href="artikel.html" class="nav-item nav-link">Kegiatan</a> -->

            <!-- <a href="contact.html" class="nav-item nav-link">Media</a> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?=$Menu['title']?></a>
                <div class="dropdown-menu m-0">
                    <?php foreach ($Menu_children[$Menu['id']] as $Submenu): ?>
                        <a href="<?=site_url($Submenu['parent_url'].'/'.$Submenu['url'])?>" class="dropdown-item <?=active_menu($Page, $Submenu)?>"><?=$Submenu['title']?></a>
                    <!-- <a href="galeri.html" class="dropdown-item">Galeri</a>
                    <a href="video.html" class="dropdown-item">Video</a> -->
                    <?php endforeach; ?>
                </div>
            </div>
            <?php else: ?>
            <a href="<?=site_url($Menu['url'])?>" class="nav-item nav-link <?=active_menu($Page, $Menu)?>"><?=$Menu['title']?></a>
            <!-- <a href="contact.html" class="nav-item nav-link">Kontak</a> -->
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
        <a href="<?=site_url('contact')?>" class="btn btn-primary py-2 px-4 ms-3">Saran / Masukan</a>
    </div>
</nav>