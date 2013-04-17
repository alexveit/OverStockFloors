<?php
 
 class MobileChecker
 {
	 
	private $mobile_browser = '0';
	
	private $mobile_ua;
	private $mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda ','xda-');
	
	public function is_mobile()
	{
		$this->mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$this->mobile_browser++;
		}
		 
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$this->mobile_browser++;
		}    
		  
		if (in_array($this->mobile_ua,$this->mobile_agents)) {
			$this->mobile_browser++;
		}
		 
		/*if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
			$this->mobile_browser++;
		}*/
		 
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
			$this->mobile_browser = 0;
		}
		
		if ($this->mobile_browser > 0) {
		   return true;
		}
		else {
		   return false;
		}
	}
};
 
?>