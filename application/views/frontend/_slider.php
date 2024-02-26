<?php
$Slides = $this->db->query("SELECT * FROM slides WHERE deleted_by = 0 ORDER BY 'DESC'");
?>
<?php foreach ($Slides->result_array() as $slide): ?>
<div class="carousel-item active">
    <img class="w-100" src="<?=img_url($slide['image'], 'slides')?>" alt="<?=$slide['title']?>">
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
        <div class="p-3" style="max-width: 900px;">
            <h5 class="text-white text-uppercase mb-3 animated slideInDown">~ <?=$slide['subtitle']?> ~</h5>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?=$slide['title']?></h1>
            <?php if($slide['button_label_left'] != ''){ ?>
                <a target="_blank" href="<?=$slide['url_left']?>" class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft"><?=ucfirst($slide['button_label_left'])?></a>
            <?php } ?>            
            <a href="<?=$slide['url_right']?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?=$slide['button_label_right']?></a>
        </div>
    </div>
</div>
<?php endforeach; ?>