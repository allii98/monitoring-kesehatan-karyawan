<?php

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userlogin');
	if ($user_session) {
		redirect('Admin');
	}
}
function check_already()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userlogin');
	if ($user_session) {
		redirect('Home');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level != 1) {
		redirect('Home');
	}
}