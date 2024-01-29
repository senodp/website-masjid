<?php

trait FooterCrud {
	function _footer(){
		$footer_names = [
			'footer_map_code',
			'footer_contact_title',
			'footer_contact_address'
		];

		$footer_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required']
		];

		options_save($footer_names, $footer_options, true);

		die('success');
	}
}