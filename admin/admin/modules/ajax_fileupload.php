<?php
if (!defined('DIRECT_ACCESS')) { header( 'Location: ../../../' ); exit(); }
error_reporting(0);	// Turns off error reporting
if (!file_exists('../../config.php') || filesize('../../config.php') < 10) {		// check for config
require_once '../../lib/lib_db.php'; db_down(); exit();
}
	require_once '../../config.php';
	include_once '../../lib/lib_db.php';
	include_once '../../lib/lib_auth.php';
	include_once '../../lib/lib_date.php';
	include_once '../../lib/lib_validate.php';
	include_once '../../lib/lib_upload.php';
	include_once '../../lib/lib_rss.php';
	include_once '../../lib/lib_tags.php';
	include_once '../../lib/lib_logs.php';

	if ($GLOBALS['pixie_user'] && $GLOBALS['pixie_user_privs'] >= 1) {

	globalSec('ajax_fileupload.php', 1);

	extract($_REQUEST);		// access to form vars if register globals is off // note : NOT setting a prefix yet, not looked at it yet
	$prefs = get_prefs();
	extract($prefs);
	include '../../lang/' . $language . '.php';
	
	// rebuild new form field
	if ($form) {
	
		if (first_word($form) == 'image') {
		db_dropdown('pixie_files', "" , $form, "file_type = 'Image' order by file_id desc");
		if (!$ie) {
		echo "\n\t\t\t\t\t\t\t\t<span class=\"more_upload\">or <a href=\"#\" onclick=\"upswitch('" . $form . "'); return false;\" title=\"" . $lang['upload'] . "\">" . strtolower($lang['upload'])."...</a></span>\n\t\t\t\t\t\t\t\t</div>\n";
		}
		} else if (first_word($form) == 'document') {
		db_dropdown('pixie_files', "" , $form, "file_type = 'Other' order by file_id desc");
		if (!$ie) {
		echo "\n\t\t\t\t\t\t\t\t<span class=\"more_upload\">or <a href=\"#\" onclick=\"upswitch('" . $form . "'); return false;\" title=\"" . $lang['upload'] . "\">" . strtolower($lang['upload'])."...</a></span>\n\t\t\t\t\t\t\t\t</div>\n";
		}
		} else if (first_word($form) == 'video') {
		db_dropdown('pixie_files', "" , $form, "file_type = 'Video' order by file_id desc");
		if (!$ie) {
		echo "\n\t\t\t\t\t\t\t\t<span class=\"more_upload\">or <a href=\"#\" onclick=\"upswitch('" . $form . "'); return false;\" title=\"" . $lang['upload'] . "\">" . strtolower($lang['upload']) . "...</a></span>\n\t\t\t\t\t\t\t\t</div>\n";
		}
		} else if (first_word($form) == 'audio') {
		db_dropdown('pixie_files', "" , $form, "file_type = 'Audio' order by file_id desc");
		if (!$ie) {
		echo "\n\t\t\t\t\t\t\t\t<span class=\"more_upload\">or <a href=\"#\" onclick=\"upswitch('" . $form . "'); return false;\" title=\"" . $lang['upload'] . "\">" . strtolower($lang['upload']) . "...</a></span>\n\t\t\t\t\t\t\t\t</div>\n";
		}
		} else {
		db_dropdown('pixie_files', "" , $form, "file_id >= '0' order by file_id desc");
		if (!$ie) {
		echo "\n\t\t\t\t\t\t\t\t<span class=\"more_upload\">or <a href=\"#\" onclick=\"upswitch('" . $form . "'); return false;\" title=\"" . $lang['upload'] . "\">" . strtolower($lang['upload']) . "...</a></span>\n\t\t\t\t\t\t\t\t</div>\n";
		}
		}

		die();
	}

	$max_size = 1024*100;

	$multi_upload = new muli_files;
	
	$file_name = $_FILES['upload']['name'][0];
	$file_ext = substr(strrchr($file_name, '.'), 1);
	$file_ext = strtolower($file_ext);
	
	if (($file_ext == 'jpg') || ($file_ext == 'gif') || ($file_ext == 'png')) {
		$dir = '../../../files/images/';
		$file_type = 'Image';
	} else if (($file_ext == 'mov') || ($file_ext == 'flv') || ($file_ext == 'avi') || ($file_ext == 'm4v') || ($file_ext == 'mp4') || ($file_ext == 'mkv')|| ($file_ext == 'ogv')) {
		$dir = '../../../files/video/';
		$file_type = 'Video';
	} else if (($file_ext == 'mp3') || ($file_ext == 'flac') || ($file_ext == 'ogg') || ($file_ext == 'wav') || ($file_ext == 'pls') || ($file_ext == 'm4a') || ($file_ext == 'xspf')) {
		$dir = '../../../files/audio/';
		$file_type = 'Audio';
	} else {
		$dir = '../../../files/other/';
		$file_type = 'Other';
	}

	$file_tags = str_replace('_'," ", $field);
	
	$multi_upload->upload_dir = $dir; 
	$multi_upload->message[] = $multi_upload->extra_text(4);
	$multi_upload->do_filename_check = 'y';
	$multi_upload->tmp_names_array = $_FILES['upload']['tmp_name'];
	$multi_upload->names_array = $_FILES['upload']['name'];
	$multi_upload->error_array = $_FILES['upload']['error'];
	$multi_upload->replace = (isset($_POST['replace'])) ? $_POST['replace'] : 'n';
	$multi_upload->extensions = array('.png', '.jpg', '.gif', '.zip', '.mp3', '.pdf', '.exe', '.rar', '.swf', '.vcf', '.css', '.dmg', '.php', '.doc', '.xls', '.xml', '.eps', '.rtf', '.iso', '.psd', '.txt', '.ppt', '.mov', '.flv', '.avi', '.m4v', '.mp4', '.gz', '.bz2', '.tar', '.7z', '.svg', '.svgz', '.lzma', '.sig', '.sign', '.js', '.rb', '.ttf', '.html', '.phtml', '.flac', '.ogg', '.wav', '.mkv', '.pls', '.m4a', '.xspf', '.ogv');
	$multi_upload->upload_multi_files();

	if (lastword($multi_upload->show_error_string()) == 'uploaded.')	{

		$sql = "file_name = '$file_name', file_extension = '$file_ext', file_type = '$file_type', tags = '$file_tags'"; 
		$ok = safe_insert('pixie_files', $sql);

		if (!$ok) {
			$message = $lang['file_upload_error'];
		} else {
			$messageok = $multi_upload->show_error_string();
			logme($messageok,'no','folder');
			safe_optimize('pixie_files');
			safe_repair('pixie_files');
		}
	} else {
		$message = $multi_upload->show_error_string();
	}

	
	print $message;

}
?>