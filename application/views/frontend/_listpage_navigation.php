<!--===================== Listpage Navigation ========================-->

<!-- <?php if (in_array('category', $Page_options)): ?>
        <ul class="news-category">
            <li class="active"><a href="<?=$Page_url?>">All</a></li>
        <?php foreach (Taxonomies($Page['id'], 'Category') as $tx): ?>
            <li><a href="<?=$Page_url.'/category/'.$tx['id'].'/'.$tx['name']?>"><?=$tx['name']?></a></li>
        <?php endforeach; ?>
        </ul>
<?php endif; ?> -->

<?php if (in_array('category', $Page_options)): ?>
<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Kategori Artikel</h3>
    </div>
    <div class="link-animated d-flex flex-column justify-content-start">
        <?php foreach (Taxonomies($Page['id'], 'Category') as $tx): ?>
            <a class="shadow h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="<?=$Page_url.'/category/'.$tx['id'].'/'.$tx['name']?>"><i class="bi bi-arrow-right me-2"></i><?=$tx['name']?></a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!--===================== End of Listpage Navigation ========================-->