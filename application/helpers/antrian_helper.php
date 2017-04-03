<?php

function assets_url($filename = false) {
	if ($filename == false) {
		return site_url() . 'assets/front/';
	} else {
		return site_url() . 'assets/front/' . $filename;
	}
}

function assets_admin_url($filename = false) {
	if ($filename == false) {
		return site_url() . 'assets/admin/';
	} else {
		return site_url() . 'assets/admin/' . $filename;
	}
}
