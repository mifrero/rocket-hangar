<?php

// get hosting information
	class hosting {

		var $url; 

		function get_hosting($url) { 

			include('lib/simple_html_dom.php');

			$hosting = file_get_contents( 'https://check-host.net/ip-info?host='.$url );

			$hosting_html = str_get_html($hosting);

			$results = $hosting_html->find('div[id=ip_info_inside-dbip]', 0);

			$results = ereg_replace('/images', 'images', $results);
			$results = ereg_replace('class="hostinfo result', 'class="table table-striped table-sm', $results);

			return $results;

 		}

	} 