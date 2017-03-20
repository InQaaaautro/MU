<?php


global $CFG, $USER, $DB, $OUTPUT, $PAGE;

$courserenderer = $PAGE->get_renderer('core', 'course');
$availablecourseshtml = $courserenderer->frontpage_combo_list();


		$token = 'f16a12a68b085d1a4ebd6bb4a00d3325';
		$domainname = 'https://localhost/moodleNew';
		$functionname = 'core_user_create_users';
		// REST RETURNED VALUES FORMAT
		$restformat = 'json';
		
		header("Content-Type: application/json");
		$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
		
		$curl = new curl;
		//$params = "&users[0][username]=loginnn&users[0][password]=4815162342Qq*&users[0][firstname]=allala&users[0][lastname]=trest&users[0][email]=ty@mail.ru";
		//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
		$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
		$resp = $curl->post($serverurl . $restformat, $params);