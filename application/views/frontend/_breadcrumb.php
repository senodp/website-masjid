
	<nav aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-white">
        <li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
        <?php $crumbs = Common_crumbs(); foreach ($crumbs as $i => $trail): $c = $i+1; ?>
		<?php if ( $c == count($crumbs) ): ?>
         	<li class="breadcrumb-item"> <?=$trail[0]?></li>
         <?php else: ?>
        	<li class="breadcrumb-item" aria-current="page">
        		<?php if ( !empty($trail[1]) ): ?><a href="<?=$trail[1]?>"> <?=$trail[0]?></a>
        		<?php else: ?><?=$trail[0]?>
			    <?php endif; ?>
        	</li>
        <?php endif; ?>
		<?php endforeach; ?>
    </ol>
</nav>
