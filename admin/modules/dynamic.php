<?php
if (!defined('DIRECT_ACCESS')) {
	header('Location: ../../');
	exit();
}
/**
 * Pixie: The Small, Simple, Site Maker.
 * 
 * Licence: GNU General Public License v3
 * Copyright (C) 2010, Scott Evans
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses/
 *
 * Title: Dynamic Page Module
 *
 * @package Pixie
 * @copyright 2008-2010 Scott Evans
 * @author Scott Evans
 * @author Sam Collett
 * @author Tony White
 * @author Isa Worcs
 * @link http://www.getpixie.co.uk
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3
 *
 */
global $timezone;
switch ($do) {
	// Module Admin
	case 'admin':
		if (isset($GLOBALS['pixie_user']) && $GLOBALS['pixie_user_privs'] >= 1) {
			if ($x == "") {
				$message = 'Please create a dynamic page in the settings area.';
			} else {
				$type       = 'dynamic';
				$table_name = 'pixie_dynamic_posts';
				$edit_id    = 'post_id';
				$page_id    = safe_field('page_id', 'pixie_core', "page_name='$x'");
				if ((isset($go)) && ($go == 'new')) {
					admin_head();
					admin_new($table_name, $edit_exclude = array(
						'page_id',
						'post_id',
						'last_modified',
						'author',
						'post_views',
						'post_slug'
					));
				} else if ((isset($edit)) && ($edit)) {
					admin_head();
					admin_edit($table_name, $edit_id, $edit, $edit_exclude = array(
						'page_id',
						'post_id',
						'last_modified',
						'last_modified_by',
						'author',
						'post_views',
						'post_slug'
					));
				} else {
					admin_carousel($x);
					echo "\t\t\t<div id=\"blocks\">\n";
					admin_block_search($type);
					admin_block_tag_cloud($table_name, 'page_id = ' . $page_id . '');
					echo "\t\t\t\t</div>\n";
					admin_head();
					echo "\t\t\t\t<div id=\"pixie_content\">";
					admin_overview($table_name, 'where page_id = ' . $page_id . '', 'posted', 'desc', $exclude = array(
						'page_id',
						'post_id',
						'author',
						'public',
						'comments',
						'tags',
						'content',
						'last_modified',
						'last_modified_by',
						'post_views',
						'post_slug'
					), '15', $type);
					echo "\t\t\t\t</div>";
				}
			}
		}
		break;
	// Show Module
	default:
		extract(safe_row('*', 'pixie_dynamic_settings', "page_id = '$page_id'"));
		switch ($m) {
			case 'archives':
				$mtitle = "$page_display_name (" . $lang['archives'] . ")";
				show_archives();
				break;
			case 'permalink':
				if (isset($comment_submit)) {
					if ($web == 'http://') {
						$web = "";
					}
					$howmanycomments = count(safe_rows('*', 'pixie_log', "log_message like '%" . $lang['comment_save_log'] . "%' and user_ip = '" . $_SERVER["REMOTE_ADDR"] . "', INTERVAL -4 HOUR)"));
					if ($howmanycomments >= 4) {
						/* Spam limit - 4 posts every 4 hours. */
						if (!$lang['comment_throttle_error']) {
							$lang['comment_throttle_error'] = 'You are posting comments too quickly. Please slow down.';
						}
						$error = $lang['comment_throttle_error'];
					}
					$comment = strip_tags($comment, '<strong><em><a>');
					$comment = nl2br($comment);
					$comment = str_replace('<a', "<a rel=\"external nofollow\"", $comment);
					$name    = strip_tags($name);
					if (isset($email)) {
						$email = strip_tags($email);
					}
					$web      = strip_tags($web);
					$post     = strip_tags($post);
					$scomment = sterilise($comment);
					$sweb     = sterilise($web);
					$sname    = sterilise($name);
					if (isset($email)) {
						$semail = sterilise($email);
					}
					$scream = array();
					if (!$name) {
						if (isset($error)) {
						} else {
							$error = NULL;
						}
						$error .= $lang['comment_name_error'] . ' ';
						$scream[] = 'name';
					}
					if (!$comment) {
						$error .= $lang['comment_comment_error'] . ' ';
						$scream[] = 'comment';
					}
					$check = new Validator();
					if (!$check->validateEmail($email, $lang['comment_email_error'] . ' ')) {
						$scream[] = 'email';
					}
					if ((!preg_match('/localhost/', $prefs['site_url'])) && (!preg_match('/127.0.0./', $prefs['site_url']))) {
						if (($web) && (!$check->validateURL($web, $lang['comment_web_error'] . ' '))) {
							$scream[] = 'web';
						}
					}
					if ($comment !== NULL) {
						$duplicate                = 0;
						$last_comment_last_number = getThing($query = 'SELECT * FROM pixie_module_comments ORDER BY comments_id DESC');
						$last_comment             = getThing($query = "SELECT comment FROM pixie_module_comments WHERE comments_id='$last_comment_last_number'");
						if (strcasecmp($comment, $last_comment) === 0) {
							$duplicate = 1;
						}
					}
					if ($check->foundErrors()) {
						if (isset($error)) {
						} else {
							$error = NULL;
						}
						$error .= $check->listErrors('x');
					}
					$commentson = safe_field('comments', 'pixie_dynamic_posts', "post_id ='$post'");
					if ($commentson == 'yes') {
						// PROBABLY NEED TO SAVE DATE ON COMMENT MANUALLY
						if (isset($error)) {
							sleep(6); /* slow spammers down */
						} else {
							if ($duplicate !== 1) {
								if ((isset($admin_user)) && ($admin_user)) {
									$admin_user = strip_tags($admin_user);
									$sql        = "comment = '$comment', name = '$name', email = '$email', url = '$web', post_id = '$post', admin_user = 'yes'";
								} else {
									$sql = "comment = '$comment', name = '$name', email = '$email', url = '$web', post_id = '$post', admin_user = 'no'";
								}
								$comment_ok = safe_insert('pixie_module_comments', $sql);
								$title      = safe_field('title', 'pixie_dynamic_posts', "post_id ='$post'");
								$countcom   = count(safe_rows('*', 'pixie_module_comments', "post_id ='$post'"));
								if (isset($s)) {
									logme($name . ' ' . $lang['comment_save_log'] . "<a href=\"" . createURL($s, $m, $x) . "#comment_$countcom\" title=\"$title\">$title</a>.", 'no', 'comment');
								}
							} else {
								$err   = explode('|', $error);
								$error = $err[0];
							}
						}
					}
				}
				$mtitle = "";
				show_single();
				break;
			case 'page':
				$start  = $posts_per_page * ($x - 1);
				$mtitle = "$page_display_name (" . $lang['dynamic_page'] . " $x)";
				$rs     = safe_rows_start('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes' order by posted desc limit $start,$posts_per_page");
				show_all($rs);
				break;
			case 'popular':
				$mtitle = "$page_display_name (" . $lang['popular'] . " $posts_per_page " . $lang['posts'] . ")";
				$rs     = safe_rows_start('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes' order by post_views desc limit $posts_per_page");
				show_all($rs);
				break;
			case 'tag':
				if ($p) {
					$start  = $posts_per_page * ($p - 1);
					$mtitle = "$page_display_name (" . $lang['tag'] . ": $x, " . $lang['dynamic_page'] . " $p)";
					$rs     = safe_rows_start('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes' and tags REGEXP '[[:<:]]" . $x . "[[:>:]]' order by posted desc limit $start, $posts_per_page");
					show_all($rs);
				} else {
					$x      = squash_slug($x);
					$mtitle = "$page_display_name (" . $lang['tag'] . ": $x)";
					$rs     = safe_rows_start('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes' and tags REGEXP '[[:<:]]" . $x . "[[:>:]]' order by posted desc limit $posts_per_page");
					show_all($rs);
				}
				break;
			case 'tags':
				if (isset($s)) {
					$id = get_page_id($s);
					echo "<h3>$page_display_name (" . $lang['tags'] . ")</h3>\n\t\t\t\t\t<div class=\"tag_section\">\n";
					public_tag_cloud('pixie_dynamic_posts', "page_id = {$id} and public = 'yes'");
					echo "\t\t\t\t\t</div>\n";
				}
				break;
			default:
				$mtitle = "$page_display_name";
				if (isset($s)) {
					$id = get_page_id($s);
					$rs = safe_rows_start('*', 'pixie_dynamic_posts', "page_id = '$id' and public = 'yes' order by posted desc limit $posts_per_page");
					show_all($rs);
				}
				break;
		}
		break;
}
// ------------------------------------------------------------------
// function show all
function show_all($rs) {
	global $s, $m, $x, $p, $mtitle, $site_url, $comments, $lang, $date_format, $posts_per_page, $timezone;
	echo "<h3>$mtitle</h3>\n";
	if (!$m) {
		if (isset($s)) {
			$page_description = safe_field('page_description', 'pixie_core', "page_name='$s'");
			//echo "\t\t\t\t\t<div id=\"page_description\">$page_description</div>";
		}
	}
	$i = 0;
	if ($rs) {
		while ($a = nextRow($rs)) {
			extract($a);
			$logunix     = returnUnixtimestamp($posted);
			$date        = safe_strftime($date_format, $logunix);
			$microformat = safe_strftime('%Y-%m-%dT%T%z', $logunix);
			$slug        = $post_slug;
			$fullname    = safe_field('realname', 'pixie_users', "user_name='$author'");
			if (public_page_exists('profiles')) {
				$mauthor = "<a href=\"" . createURL('profiles', $author) . "\" class=\"url fn\" title=\"" . $lang['view'] . " $fullname's " . $lang['profile'] . "\">$fullname</a>";
			} else {
				$mauthor = "<a href=\"$site_url\" class=\"url fn\" title=\"$site_url\">$fullname</a>";
			}
			if ((isset($tags)) && ($tags)) {
				$all_tags        = strip_tags($tags);
				$all_tags        = str_replace('&quot;', "", $tags);
				$tags_array_temp = explode(" ", $all_tags);
				for ($count = 0; $count < (count($tags_array_temp)); $count++) {
					$current = $tags_array_temp[$count];
					$first   = $current{strlen($current) - strlen($current)};
					if ($first == " ") {
						$current = substr($current, 1, strlen($current) - 1);
					}
					$ncurrent = make_slug($current);
					if ((isset($s)) && (isset($current))) {
						if (!isset($tag_list)) {
							$tag_list = NULL;
						}
						$tag_list .= "<a href=\"" . createURL($s, 'tag', $ncurrent) . "\" title=\"{$lang['view']} {$lang['all_posts_tagged']}: {$current}\" rel=\"tag\" >{$current}</a>, ";
					} else {
						$tag_list = NULL;
					}
					if ((isset($ncurrent)) && ($ncurrent != "")) {
						if (!isset($class_list)) {
							$class_list = NULL;
						}
						$class_list .= "tag_$ncurrent ";
					} else {
						$class_list = NULL;
					}
				}
				$tag_list = substr($tag_list, 0, (strlen($tag_list) - 2)) . "";
			}
			$comms    = safe_rows('*', 'pixie_module_comments', "post_id = '$post_id'");
			$no_comms = count($comms);
			if (isset($s)) {
				$permalink = createURL($s, 'permalink', $slug);
			}
			$authorclass = strtolower($author);
			$timeclass   = safe_strftime('y%Y m%m d%d h%H', $logunix);
			if (is_even($i + 1)) {
				$type = 'post_even';
			} else {
				$type = 'post_odd';
			}
			$num = $i + 1;
			echo "
					<div class=\"section hentry author_$authorclass $class_list$timeclass $type post_" . $num . "\" id=\"post_$post_id\">
						<h4 class=\"entry-title\"><a href=\"$permalink\" rel=\"bookmark\">$title</a></h4>
						<ul class=\"post_links\">
							<li class=\"post_date\"><abbr class=\"published\" title=\"$microformat\">$date</abbr></li>
							<li class=\"post_permalink\"><a href=\"$permalink\" title=\"" . $lang['permalink_to'] . ": $title\">" . $lang['permalink'] . "</a></li>";
			if (public_page_exists('comments')) {
				if (($comments == 'yes') or ($no_comms)) {
					echo "\n\t\t\t\t\t\t\t<li class=\"post_comments\"><a href=\"$permalink#comments\" title=\"" . $lang['comments'] . "\">" . $lang['comments'] . "</a> ($no_comms)</li>";
				}
			}
			if (isset($_COOKIE['pixie_login'])) {
				list($username, $cookie_hash) = explode(',', $_COOKIE['pixie_login']);
				$nonce = safe_field('nonce', 'pixie_users', "user_name='$username'");
				if (md5($username . $nonce) == $cookie_hash) {
					$privs = safe_field('privs', 'pixie_users', "user_name='$username'");
					if ($privs >= 1) {
						echo "\n\t\t\t\t\t\t\t<li class=\"post_edit\"><a href=\"" . $site_url . "admin/?s=publish&amp;m=dynamic";
						if (isset($s)) {
							echo '&amp;x=' . $s;
						}
						echo "&amp;edit=$post_id\" title=\"" . $lang['edit_post'] . "\">" . $lang['edit_post'] . "</a></li>";
					}
				}
			}
			echo "
						</ul>
						<div class=\"post entry-content\">\n";
			//<!--more-->
			$post = get_extended($content);
			echo "\t\t\t\t\t\t\t" . $post['main'];
			if ($post['extended']) {
				echo "\n\t\t\t\t\t\t\t<p><a href=\"$permalink\" class=\"read-more\" title=\"" . $lang['continue_reading'] . " $title\">" . $lang['continue_reading'] . " $title...</a></p>";
			}
			echo "
						</div>	
						<div class=\"post_credits\">
						 	<span class=\"vcard author\">" . $lang['by'] . " $mauthor</span>
						 	<span class=\"post_tags\">" . $lang['tagged'] . ": $tag_list</span>
						</div>				
					</div>\n\n";
			$tag_list   = "";
			$class_list = "";
			$i++;
		}
	}
	echo "\t\t\t\t\t<div id=\"nav_pages\" class=\"dynamic_bottom_nav\">\n";
	if ((!$m) or ($m == 'page')) {
		// how many posts do we have in total?
		if (isset($page_id)) {
			$totalposts = count(safe_rows('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes'"));
		} else {
			$totalposts = 0;
		}
		if ($m == 'page') {
			$currentnum   = $posts_per_page * $x;
			$nextpage     = $x + 1;
			$previouspage = $x - 1;
		} else {
			$nextpage   = 2;
			$currentnum = $posts_per_page;
		}
		//print $totalposts." - ".$currentnum;
		if ($totalposts > $currentnum) {
			// then we need to link onto the next page	
			echo "\t\t\t\t\t\t<div id=\"page_next\" class=\"link_next\"><a class=\"link_next_a\" href=\"";
			if (isset($s)) {
				echo createURL($s, 'page', $nextpage);
			}
			echo "\" title=\"" . $lang['next_page'] . ": $nextpage\">" . $lang['next_page'] . " &raquo;</a></div>\n";
		}
		if ($m == 'page') {
			if ($x >= 2) {
				if ($previouspage == 1) {
					echo "\t\t\t\t\t\t<div id=\"page_previous\" class=\"link_previous\"><a class=\"link_prev_a\" href=\"";
					if (isset($s)) {
						echo createURL($s);
					}
					echo "\" title=\"" . $lang['previous_page'] . ": $previouspage\">&laquo; " . $lang['previous_page'] . "</a></div>\n";
				} else {
					echo "\t\t\t\t\t\t<div id=\"page_previous\" class=\"link_previous\"><a class=\"link_prev_a\" href=\"";
					if (isset($s)) {
						echo createURL($s, 'page', $previouspage);
					}
					echo "\" title=\"" . $lang['previous_page'] . ": $previouspage\">&laquo; " . $lang['previous_page'] . "</a></div>\n";
				}
			}
		}
	} else if ($m == 'tag') {
		$p          = squash_slug($p);
		$totalposts = count(safe_rows('*', 'pixie_dynamic_posts', "page_id = '$page_id' and public = 'yes' and tags REGEXP '[[:<:]]" . $x . "[[:>:]]'"));
		if ($p) {
			$currentnum   = $posts_per_page * $p;
			$nextpage     = $p + 1;
			$previouspage = $p - 1;
		} else {
			$nextpage   = 2;
			$currentnum = $posts_per_page;
		}
		//print $totalposts." - ".$currentnum;
		if ($totalposts > $currentnum) {
			// then we need to link onto the next page	
			echo "\t\t\t\t\t\t<div id=\"page_next\" class=\"link_next\"><a class=\"link_next_a\" href=\"" . createURL($s, $m, $x, $nextpage) . "\" title=\"" . $lang['next_page'] . ": $nextpage\">" . $lang['next_page'] . " &raquo;</a></div>\n";
		}
		if ($p >= 2) {
			if ($previouspage == 1) {
				echo "\t\t\t\t\t\t<div id=\"page_previous\" class=\"link_previous\"><a class=\"link_prev_a\" href=\"" . createURL($s, $m, $x) . "\" title=\"" . $lang['previous_page'] . ": $previouspage\">&laquo; " . $lang['previous_page'] . "</a></div>\n";
			} else {
				echo "\t\t\t\t\t\t<div id=\"page_previous\" class=\"link_previous\"><a class=\"link_prev_a\" href=\"" . createURL($s, $m, $x, $previouspage) . "\" title=\"" . $lang['previous_page'] . ": $previouspage\">&laquo; " . $lang['previous_page'] . "</a></div>\n";
			}
		}
		// pagination for tags pages needs to be different... coming soon
	}
	echo "\t\t\t\t\t</div>\n";
}
// ------------------------------------------------------------------
// function show single
function show_single() {
	global $s, $m, $x, $mtitle, $site_url, $comments, $page_display_name, $site_name, $comment_ok, $date_format, $lang, $error, $scream, $sname, $semail, $scomment, $sweb, $timezone;
	$rs = safe_row('*', 'pixie_dynamic_posts', "post_slug = '$x' and public = 'yes' limit 0,1");
	if ($rs) {
		extract($rs);
		safe_update('pixie_dynamic_posts', "post_views  = $post_views + 1", "post_id = '$post_id'");
		$logunix     = returnUnixtimestamp($posted);
		$date        = safe_strftime($date_format, $logunix);
		$timeunix    = returnUnixtimestamp($last_modified);
		$xdate       = safe_strftime($date_format, $timeunix);
		$microformat = safe_strftime('%Y-%m-%dT%T%z', $logunix);
		$slug        = $post_slug;
		$fullname    = safe_field('realname', 'pixie_users', "user_name='$author'");
		if (public_page_exists('profiles')) {
			$mauthor = "<a href=\"" . createURL("profiles", $author) . "\" class=\"url fn\" title=\"" . $lang['view'] . " $fullname's " . $lang['profile'] . "\">$fullname</a>";
		} else {
			$mauthor = "<a href=\"$site_url\" class=\"url fn\" title=\"$site_url\">$fullname</a>";
		}
		if ((isset($tags)) && ($tags)) {
			$all_tags        = strip_tags($tags);
			$all_tags        = str_replace('&quot;', "", $tags);
			$tags_array_temp = explode(" ", $all_tags);
			for ($count = 0; $count < (count($tags_array_temp)); $count++) {
				$current = $tags_array_temp[$count];
				$first   = $current{strlen($current) - strlen($current)};
				if ($first == " ") {
					$current = substr($current, 1, strlen($current) - 1);
				}
				$ncurrent = make_slug($current);
				if ((isset($s)) && (isset($ncurrent))) {
					if ((isset($tag_list))) {
					} else {
						$tag_list = NULL;
					}
					$tag_list .= "<a href=\"" . createURL($s, 'tag', $ncurrent) . "\" title=\"" . $lang['view'] . " " . $lang['all_posts_tagged'] . ": " . $current . "\"  rel=\"tag\" >" . $current . "</a>, ";
				}
				if ($ncurrent != "") {
					if ((isset($class_list))) {
					} else {
						$class_list = NULL;
					}
					$class_list .= "tag_$ncurrent ";
				}
			}
			$tag_list = substr($tag_list, 0, (strlen($tag_list) - 2)) . "";
		}
		if (isset($s)) {
			$permalink = createURL($s, 'permalink', $slug);
		}
		$authorclass = strtolower($author);
		$timeclass   = safe_strftime('y%Y m%m d%d h%H', $logunix);
		echo "
					<div class=\"section hentry author_$authorclass $class_list$timeclass single\" id=\"post_$post_id\">
						<h4 class=\"entry-title\"><a href=\"$permalink\" rel=\"bookmark\">$title</a></h4>
						<ul class=\"post_links\">
							<li class=\"post_date\"><abbr class=\"published\" title=\"$microformat\">$date</abbr></li>";
		if (isset($_COOKIE['pixie_login'])) {
			list($username, $cookie_hash) = explode(',', $_COOKIE['pixie_login']);
			$nonce = safe_field('nonce', 'pixie_users', "user_name='$username'");
			if (md5($username . $nonce) == $cookie_hash) {
				$privs = safe_field('privs', 'pixie_users', "user_name='$username'");
				if ($privs >= 1) {
					echo "\n\t\t\t\t\t\t\t<li class=\"post_edit\"><a href=\"" . $site_url . "admin/?s=publish&amp;m=dynamic";
					if (isset($s)) {
						echo '&amp;x=' . $s;
					}
					echo "&amp;edit=$post_id\" title=\"" . $lang['edit_post'] . "\">" . $lang['edit_post'] . "</a></li>";
				}
			}
		}
		echo "
						</ul>
						<div class=\"post entry-content\">\n";
		//<!--more-->
		$post = get_extended($content);
		echo "\t\t\t\t\t\t\t" . $post['main'];
		if ($post['extended']) {
			echo $post['extended'];
		}
		echo "
						</div>		
						<div class=\"post_credits\">
						 	<span class=\"vcard author\">" . $lang['by'] . " $mauthor</span>
						 	<span class=\"post_tags\">" . $lang['tagged'] . ": $tag_list</span>
						 	<span class=\"post_updated\">" . $lang['last_updated'] . ": $xdate </span>
						</div>			
					</div>
					
					<div id=\"nav_posts\" class=\"dynamic_bottom_nav\">\n";
		// previous and next posts
		if (isset($s)) {
			$thisid = get_page_id($s);
		}
		// what post is next?
		$searchnext = safe_field('post_id', 'pixie_dynamic_posts', "page_id = '$thisid' and public = 'yes' and posted > '$posted' limit 0,1");
		if ($searchnext) {
			$ntitle = safe_field('title', 'pixie_dynamic_posts', "post_id ='$searchnext'");
			$nslug  = safe_field('post_slug', 'pixie_dynamic_posts', "post_id ='$searchnext'");
			echo "\t\t\t\t\t\t<div id=\"post_next\" class=\"link_next\"><a class=\"link_next_a\" href=\"";
			if (isset($s)) {
				echo createURL($s, 'permalink', $nslug);
			}
			echo "\" title=\"" . $lang['next_post'] . ": $ntitle\">" . $lang['next_post'] . " &raquo;</a></div>\n";
		}
		// what post is previous?
		$searchprev = safe_field('post_id', 'pixie_dynamic_posts', "page_id = '$thisid' and public = 'yes' and posted < '$posted' order by posted desc limit 0,1");
		if ($searchprev) {
			$ptitle = safe_field('title', 'pixie_dynamic_posts', "post_id ='$searchprev'");
			$pslug  = safe_field('post_slug', 'pixie_dynamic_posts', "post_id ='$searchprev'");
			echo "\t\t\t\t\t\t<div id=\"post_previous\" class=\"link_previous\"><a class=\"link_prev_a\" href=\"";
			if (isset($s)) {
				echo createURL($s, 'permalink', $pslug);
			}
			echo "\" title=\"" . $lang['previous_post'] . ": ";
			if (isset($ptitle)) {
				echo $ptitle;
			}
			echo "\">&laquo; " . $lang['previous_post'] . "</a></div>\n";
		}
		echo "\t\t\t\t\t</div>\n";
		$comms    = safe_rows('*', 'pixie_module_comments', "post_id = '$post_id'");
		$no_comms = count($comms);
		// fix to remove commenting when plug in is removed
		if (public_page_exists('comments')) {
			if (($comments == 'yes') or ($comms)) {
				echo "\n\t\t\t\t\t<div id=\"comments\">
						<h4 id=\"comments_title\">" . $lang['comments'] . "</h4>";
				if (isset($_COOKIE['pixie_login'])) {
					list($username, $cookie_hash) = explode(',', $_COOKIE['pixie_login']);
					$nonce = safe_field('nonce', 'pixie_users', "user_name='$username'");
					if (md5($username . $nonce) == $cookie_hash) {
						$realname = safe_field('realname', 'pixie_users', "user_name='$username'");
						$umail    = safe_field('email', 'pixie_users', "user_name='$username'");
					}
				}
				$r2 = safe_rows('*', 'pixie_module_comments', "post_id = '$post_id' order by posted asc");
				if ($r2) {
					$i = 0;
					while ($i < $no_comms) {
						extract($r2[$i]);
						$default = "{$site_url}files/images/no_grav.jpg";
						if (isset($email)) {
							$grav_url = 'http://www.gravatar.com/avatar.php?gravatar_id=' . md5($email) . '&amp;default=' . urlencode($default) . '&amp;size=40';
						}
						$hash = $i + 1;
						if ($url) {
							$namepr = "<span class=\"message_name author\"><a href=\"$permalink#comment_$hash\" rel=\"bookmark\" class=\"comment_permalink\">#$hash</a> <a href=\"" . htmlentities($url) . "\" rel=\"external nofollow\" class=\"url fn\">$name</a></span>";
						} else {
							$namepr = "<span class=\"message_name author\"><a href=\"$permalink#comment_$hash\" rel=\"bookmark\" class=\"comment_permalink\">#$hash</a> <span class=\"fn\">$name</span></span>";
						}
						if (is_even($i + 1)) {
							$type = 'comment_even';
						} else {
							$type = 'comment_odd';
						}
						if ($admin_user == 'yes') {
							$atype = ' comment_admin';
						} else {
							$atype = "";
						}
						$logunix            = returnUnixtimestamp($posted);
						$days_ago           = safe_strftime('since', $logunix);
						$microformatcomment = safe_strftime('%Y-%m-%dT%T%z', $logunix);
						$commenttimeclass   = safe_strftime('c_y%Y c_m%m c_d%d c_h%H', $logunix);
						echo "
						<div class=\"$type hentry comment comment_author_" . str_replace('-', '_', make_slug($name)) . " $commenttimeclass" . $atype . "\" id=\"comment_$hash\">
							<div class=\"comment_message\">
								<div class=\"message_details vcard\">
									<img src=\"$grav_url\" alt=\"Gravatar Image\" class=\"gr photo\" />
									$namepr
									<span class=\"message_time\"><abbr class=\"published\" title=\"$microformatcomment\">$days_ago</abbr></span>
								</div>
								<div class=\"message_body entry-title entry-content\"><p>$comment</p></div>
							</div>
						</div>";
						$i++;
					}
				} else {
					echo "\n\t\t\t\t\t\t<span class=\"comments_none\">" . $lang['no_comments'] . "</span>";
				}
				echo "
					</div>\n";
				echo "
					<div class=\"comment_form\" id=\"commentform\">";
				if ($comment_ok) {
					echo "\n\t\t\t\t\t\t\t<p class=\"success\">" . $lang['comment_thanks'] . '</p>';
				} else if ($comments == 'yes') {
					if (isset($s)) {
						$posty = createURL($s, $m, $x);
					}
					echo "
						<form accept-charset=\"UTF-8\" action=\"$posty#commentform\" method=\"post\" class=\"form\">
						<script type=\"text/javascript\">
						  var blogTool              = \"pixie\";
						  var blogURL               = \"$site_url\";
						  var blogTitle             = \"$site_name - $page_display_name\";
						  var postURL               = \"$posty\";
						  var postTitle             = \"$title\";
						  var commentTextFieldName  = \"comment\";
						  var commentButtonName     = \"comment_submit\";";
					if ((isset($realname)) && ($realname)) {
						echo "\n\t\t\t\t\t\t  var commentAuthorLoggedIn = true;";
					} else {
						echo "\n\t\t\t\t\t\t  var commentAuthorLoggedIn = false;";
					}
					echo "
						  var commentAuthorFieldName = \"name\";
						  var commentFormID       = \"commentform\";
						</script>
							<fieldset>
								<legend>" . $lang['comment_leave'] . "</legend>";
					if (isset($error)) {
						echo "\n\t\t\t\t\t\t\t\t<p class=\"error\">$error</p>";
						if (in_array('name', $scream)) {
							$name_style = 'form_highlight';
						}
						if (in_array('comment', $scream)) {
							$comment_style = 'form_highlight';
						}
						if (in_array('email', $scream)) {
							$email_style = 'form_highlight';
						}
						if (in_array('web', $scream)) {
							$web_style = 'form_highlight';
						}
					} else {
						echo "<p class=\"notice\">" . $lang['comment_form_info'] . "</p>";
					}
					echo "
								<div class=\"form_row ";
					if (isset($name_style)) {
						echo $name_style;
					}
					echo "\">
									<div class=\"form_label\"><label for=\"comment_name\">" . $lang['comment_name'] . " <span class=\"form_required\">" . $lang['form_required'] . "</span></label></div>";
					if ((isset($realname)) && ($realname)) {
						echo "\n\t\t\t\t\t\t\t\t\t<div class=\"form_item\"><input type=\"text\" disabled=\"disabled\" tabindex=\"1\" name=\"name\" class=\"form_text\" id=\"comment_name\"";
						if (isset($realname)) {
							echo " value=\"$realname\"";
						}
						echo " /></div>";
					} else {
						echo "\n\t\t\t\t\t\t\t\t<div class=\"form_item\"><input type=\"text\" tabindex=\"1\" name=\"name\" class=\"form_text\" id=\"comment_name\" value=\"$sname\"/></div>";
					}
					if ($sweb == "") {
						$sweb = 'http://';
					}
					if ((isset($realname)) && ($realname)) {
						$sweb   = $site_url;
						$semail = $umail;
					}
					echo "
								</div>
								<div class=\"form_row ";
					if (isset($email_style)) {
						echo $email_style;
					}
					echo "\">
									<div class=\"form_label\"><label for=\"comment_email\">" . $lang['comment_email'] . " <span class=\"form_required\">" . $lang['form_required'] . "</span></label></div>
									<div class=\"form_item\"><input type=\"text\" tabindex=\"2\" name=\"email\" class=\"form_text\" id=\"comment_email\" value=\"$semail\" /></div>
								</div>
								<div class=\"form_row ";
					if (isset($web_style)) {
						echo $web_style;
					}
					echo "\">
									<div class=\"form_label\"><label for=\"comment_web\">" . $lang['comment_web'] . " <span class=\"form_optional\">" . $lang['form_optional'] . "</span></label></div>
									<div class=\"form_item\"><input type=\"text\" tabindex=\"2\" name=\"web\" class=\"form_text\" id=\"comment_web\" value=\"$sweb\" /></div>
								</div>
								<div class=\"form_row ";
					if (isset($comment_style)) {
						echo $comment_style;
					}
					echo "\">
									<div class=\"form_label\"><label for=\"comment\">" . $lang['comment'] . " <span class=\"form_required\">" . $lang['form_required'] . "</span></label></div>
									<div class=\"form_item\"><textarea name=\"comment\" tabindex=\"3\" id=\"comment\" class=\"form_text_area\" cols=\"25\" rows=\"5\">$scomment</textarea></div>
								</div>
								<div class=\"form_row_submit\">
									<input type=\"submit\" name=\"comment_submit\" tabindex=\"4\" value=\"" . $lang['comment_button_leave'] . "\" class=\"form_submit\" />
									<input type=\"hidden\" name=\"post\" value=\"$post_id\" />";
					if ((isset($realname)) && ($realname)) {
						echo "\n\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"admin_user\" value=\"" . md5($nonce) . "\" />
									<input type=\"hidden\" name=\"name\"";
						if (isset($realname)) {
							echo " value=\"$realname\"";
						}
						echo " />";
					}
					echo "
								</div>
							</fieldset>
						</form>";
				} else {
					echo "\n\t\t\t\t\t\t<span class=\"comments_closed\">" . $lang['comment_closed'] . "</span>";
				}
				echo "
					</div>";
			}
			// end if comments plugin enabled
		}
	} else {
		extract(safe_row('*', 'pixie_core', "page_name='404'"));
		extract(safe_row('*', 'pixie_static_posts', "page_id='$page_id'"));
		if (isset($s)) {
			echo "<div id=\"$s\">\n\t\t\t\t\t\t<h3>$page_display_name</h3>\n";
			eval('?>' . $page_content . '<?php ');
			echo "\n\t\t\t\t\t</div>\n";
		}
	}
}
// ------------------------------------------------------------------
// function show archives
function show_archives() {
	global $s, $m, $x, $mtitle, $site_url, $page_display_name, $lang, $timezone;
	$date_array = getdate();
	$this_month = $date_array['mon'];
	$this_year  = $date_array['year'];
	if (isset($s)) {
		$id = get_page_id($s);
		$rs = safe_row('*', 'pixie_dynamic_posts', "page_id = '$id' and public = 'yes' order by posted asc limit 0,1");
	}
	echo "<div id=\"archives\">\n\t\t\t\t\t\t<h3>$mtitle</h3>\n\t\t\t\t\t\t<dl class=\"list_archives\">\n";
	if ($rs) {
		extract($rs);
		$last_year = returnUnixtimestamp($posted);
		$last_year = date('Y', $last_year);
		$num       = (($this_year - $last_year) * 12) + 12;
		$i         = 0;
		while ($i < $num) {
			$smonth      = mktime(0, 0, 0, $this_month, 1, $this_year);
			$start_month = safe_strftime('%Y-%m-%d', $smonth);
			$last_day    = date('t', $smonth);
			$emonth      = mktime(23, 59, 59, $this_month, $last_day, $this_year);
			$end_month   = safe_strftime('%Y-%m-%d %H:%M:%S', $emonth);
			$search      = safe_rows('*', 'pixie_dynamic_posts', "page_id = '$id' and public = 'yes' and posted between '" . $start_month . "' and date '" . $end_month . "' order by posted desc");
			if ($search) {
				echo "\t\t\t\t\t\t\t<dt>" . date('F', $smonth) . " " . $this_year . "</dt>\n";
				$numy = count($search);
				$j    = 0;
				while ($j < $numy) {
					$out   = $search[$j];
					$title = $out['title'];
					$posty = $out['posted'];
					$slug  = $out['post_slug'];
					$stamp = returnUnixtimestamp($posty);
					$day   = date('d', $stamp);
					echo "\t\t\t\t\t\t\t<dd><span class=\"archive_subdate\">" . $day . ":</span> <a href=\"";
					if (isset($s)) {
						echo createURL($s, 'permalink', $slug);
					}
					echo "\" title=\"" . $lang['permalink_to'] . ": $title\">" . $title . "</a></dd>\n";
					$j++;
				}
				$this_month = $this_month - 1;
				if ($this_month == 0) {
					$this_month = 12;
					$this_year  = $this_year - 1;
				}
			} else {
				$this_month = $this_month - 1;
				if ($this_month == 0) {
					$this_month = 12;
					$this_year  = $this_year - 1;
				}
			}
			$i++;
		}
	}
	echo "\t\t\t\t\t\t</dl>\n\t\t\t\t\t</div>";
}
?>