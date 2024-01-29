	<div class="row row-page-manager">
		<?php foreach ($rows as $i => $r): $depth = 1; ?>
		<?php $data = array(
			'row' => $r, 'position' => $i+1, 'total' => count($rows), 'depth' => $depth
		); ?>
		<?php echo $this->load->view('backend/page_index_loop', $data, true); ?>
		<?php endforeach; ?>
	</div>