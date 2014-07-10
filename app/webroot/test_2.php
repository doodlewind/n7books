<?php 
// 1. 初始化
function patternDouban ($title, $author = null) {
	$ch = curl_init();
	// 2. 设置选项，包括URL
	 $browser = array (
	        "user_agent" => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6 (.NET CLR 3.5.30729)",
	        "language" => "en-us,en;q=0.5"
    );

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        "User-Agent: {$browser['user_agent']}",
	        "Accept-Language: {$browser['language']}"
    ));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	if ($author!=null){
		$url_with_author = 'http://book.douban.com/subject_search?search_text='.$title.'+'.$author.'&cat=1001';
		curl_setopt($ch, CURLOPT_URL, $url_with_author);
		$output = curl_exec($ch);
	 	if (ereg ("(http://img[3-5].douban.com/mpic/s[0-9]{6,9}.jpg)", $output, $regs)) {
			 curl_close($ch);
			 return $regs[1];
		}
	}

	$url_without_author = 'http://book.douban.com/subject_search?search_text='.$title.'&cat=1001';
	curl_setopt($ch, CURLOPT_URL, $url_without_author);
	$output = curl_exec($ch);

 	if (ereg ("(http://img[3-5].douban.com/mpic/s[0-9]{6,9}.jpg)", $output, $regs)) {
		curl_close($ch);
		return $regs[1];
	}else {
		curl_close($ch);
		return null;
	}
}

?>