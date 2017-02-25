<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;

class CheckerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	if(isset($_POST['url'])){
		$url = $_POST['url'];
		$data = $this->check_moz($url);
		$dmoz = $this->check_dmoz($url);
		$data['dmoz'] = $dmoz;
		$data['alexa_rank'] = $this->alex_rank($url);		
		$data['alexa_data'] = $this->alexa_data($url);
		$data['fb']=$this->fb_like_share_comment($url);
		$data['google_plus_share'] = $this->google_plus_share($url);
		$data['pintrest_count'] = $this->pintrest_count($url);
		$data['stumbleupon'] = $this->stumbleupon($url);
		$data['linkdin_share'] = $this->linkdin_share($url);

		$data['xing_count'] = $this->xing_count($url);
		$data['buffer_share'] = $this->buffer_share($url);
		$data['reddit_share'] = $this->reddit_share($url);
		$data['url'] = $url;
		return view('pages.home')->with($data);
	}else{
		return view('pages.home');
	}
    
		//return View::make('pages.home',compact('statistics'));
	//	return view('', compact('movieList', 'statistics'));
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	/**
	 * Socail Networks Code.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function fb_like_share_comment($url)
	{
		$data = array();
		$url="http://graph.facebook.com/?id="."http://".$url;
		$content = json_decode(file_get_contents($url),true);
		if(isset($data['share']['share_count']))
			$data['total_share']=$data['share']['share_count'];
		else
			$data['total_share']=0;

		// if(isset($data[0]['like_count']))
		// 	$data['total_like']=$data[0]['like_count'];
		// else
		$data['total_like']=0;

		if(isset($data['share']['comment_count']))
			$data['total_comment']=$data['share']['comment_count'];
		else
			$data['total_comment']=0;

		return $data;
		
	}
	/*****Retrun google plus Share (plus one )*******/	
	public function google_plus_share($url){
		
		$url=$this->addHttp($url);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		$curl_results = curl_exec ($ch);
		curl_close ($ch);

		$curl_results = json_decode($curl_results, true);
		$ping =  isset($curl_results['result']['metadata']['globalCounts']['count']) ? $curl_results['result']['metadata']['globalCounts']['count']:0;
        
		return $ping;
	}

	/****8  Return Total Pin Count *******/
	public function pintrest_count($url){
		$url=$this->addHttp($url);
		$url=urlencode($url);
		$pin_url="http://api.pinterest.com/v1/urls/count.json?url={$url}";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $pin_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$content = curl_exec($ch);
		$content=str_replace("receiveCount","",$content);
		$content = str_replace(array('(', ')'), '', $content);
		$result=json_decode($content,TRUE);

		if(isset($result['count'])) {
			return $result['count'];
		}else{
			return 0;
		}
	}

	 /****** Get stumbleupon.com total views, like, comment, list ******/
	public function stumbleupon($url){
	    $url=$this->addHttp($url);
		$url=urlencode($url);
		$stumble_url="http://www.stumbleupon.com/services/1.01/badge.getinfo?url={$url}";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $stumble_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$content = curl_exec($ch);
		$content=json_decode($content,TRUE);

		$data=array();
		if(isset($content['result']['views'])){
			$data['total_view']= $content['result']['views'];
			$publicid= $content['result']['publicid'];
		} else $data['total_view'] = 0;

		/*** Get like, comment, list ****/	
		if(isset($publicid)){

			$url = "http://www.stumbleupon.com/content/{$publicid}";
			
			$stumble_content=$this->get_general_content($url);
			
			$html = new simple_html_dom();
			$html->load($stumble_content);
			
			/** Get the statistics of mark tag, it is in order (Likes, Comments, Lists) **/
			$like_share_list_info = $html->find('mark');
			foreach($like_share_list_info as $info) {
				$statistics[]=$info->plaintext;
			}
		}

		$data['stumbleupon_total_like']= isset($statistics[0]) ? $statistics[0]:0;
		$data['stumbleupon_total_comment']= isset($statistics[2]) ? $statistics[2]:0;
		$data['stumbleupon_total_list']= isset($statistics[4]) ? $statistics[4]:0;

		return $data;
	}
	 /**Get LinkdIn Share ***/
	public function linkdin_share($url){
		$url=$this->addHttp($url);
		$url=urlencode($url);
		$linkdin_url="http://www.linkedin.com/countserv/count/share?url={$url}&format=json";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $linkdin_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$content = curl_exec($ch);
		$content=json_decode($content,TRUE);
		$total_share=isset($content['count'])? $content['count']: 0;
		return $total_share;
	}
	/***Return Buffer share Count**/
	public function buffer_share($url){
	
		$url=$this->addHttp($url);
		$url=urlencode($url);
		$buffer_url="https://api.bufferapp.com/1/links/shares.json?url={$url}";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $buffer_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$content = curl_exec($ch);
		$content=json_decode($content,TRUE);

		$total_share=isset($content['shares'])? $content['shares']: 0;
		return $total_share;
	}
		/***Return reddit share Count**/
	public function reddit_share($url){
	
		$url=$this->addHttp($url);
		$url=urlencode($url);
		$reddit_url="https://www.reddit.com/api/info.json?url={$url}";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $reddit_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$content = curl_exec($ch);
		$content=json_decode($content,TRUE);

		/***Take Scroe, Up, Downs from first subreddit*****/
		$array=array();
		$array['score']=  isset($content['data']['children'][0]['data']['score'])? $content['data']['children'][0]['data']['score']:0;
		$array['downs']=  isset($content['data']['children'][0]['data']['downs'])?$content['data']['children'][0]['data']['downs']:0;
		$array['ups']=  isset($content['data']['children'][0]['data']['ups'])?$content['data']['children'][0]['data']['ups']:0;
		return $array;
	}
	public function xing_count($url){
		//$url = "http://mycodingtricks.com/html5/html5-inline-edit-with-mysql-php-jquery-and-ajax/";
		$url=$this->addHttp($url);
		$url=urlencode($url);
		$xing_url="https://www.xing-share.com/app/share?op=get_share_button;counter=top;url={$url}";
		$xing_content=$this->get_general_content($xing_url);
		$html = new \simple_html_dom();
		$html->load($xing_content);
		/** Get the statistics of mark tag, it is in order (Likes, Comments, Lists) **/
		$share_info = $html->find('span.xing-count');
		foreach($share_info as $info) {
			$statistics=$info->plaintext;
		}
		if(isset($statistics))
			$statistics;
		else 
			$statistics= 0;
	
		return $statistics;
	}




	public function check_moz($url,$proxy=''){
			// Get your access id and secret key here: https://moz.com/products/api/keys
		$accessID = "mozscape-c740a0c4dc";
		$secretKey = "fee2b5da5cad28918269c14c0c17ce55";
		// Set your expires times for several minutes into the future.
		// An expires time excessively far in the future will not be honored by the Mozscape API.
		$expires = time() + 300;
		// Put each parameter on a new line.
		$stringToSign = $accessID."\n".$expires;
		// Get the "raw" or binary output of the hmac hash.
		$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
		// Base64-encode it and then url-encode that.
		$urlSafeSignature = urlencode(base64_encode($binarySignature));
		// Specify the URL that you want link metrics for.
		$objectURL = $url;
		// Add up all the bit flags you want returned.
		// Learn more here: https://moz.com/help/guides/moz-api/mozscape/api-reference/url-metrics
		$cols = "103616137248";
		// Put it all together and you get your request URL.
		// This example uses the Mozscape URL Metrics API.
		$requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($objectURL)."?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
		// Use Curl to send off your request.
		$options = array(
			CURLOPT_RETURNTRANSFER => true
			);
		$ch = curl_init($requestUrl);
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		curl_close($ch);
		$content=json_decode($content,TRUE);
	
		/**** Using proxy of public and private proxy both ****/
		// if($this->proxy_ip!='')
		// 	curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
		
		// if($this->proxy_auth_pass!='')	
		// 	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth_pass);

		$data=array();
		$data['mozrank_subdomain_normalized'] = isset($content['fmrp'])?$content['fmrp']: "0";
		$data['mozrank_subdomain_raw'] = isset($content['fmrr'])?$content['fmrr']: "0";
		$data['mozrank_url_normalized'] = isset($content['umrp'])?$content['umrp']: "0";
		$data['mozrank_url_raw'] = isset($content['umrr'])?$content['umrr']: "0";
		$data['http_status_code'] = isset($content['us'])?$content['us']: "0";
		$data['domain_authority'] = isset($content['pda'])?$content['pda']: "0";
		$data['page_authority'] = isset($content['upa'])?$content['upa']: "0";
		$data['external_equity_links'] = isset($content['ueid'])?$content['ueid']: "0";
		$data['links'] = isset($content['uid'])?$content['uid']: "0";
		return $data;
	}
	public function check_dmoz($url){
		$url="http://www.dmoz.org/search?q={$url}";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		
		/**** Using proxy of public and private proxy both ****/
		// if($this->proxy_ip!='')
		// 	curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
		
		// if($this->proxy_auth_pass!='')	
		// 	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth_pass);
		
		$content = curl_exec($ch);



		$cat_string_exist   = strpos($content,"Categories");
		$site_string_exist  = strpos($content,"Sites");

		if($cat_string_exist!==FALSE && $site_string_exist!==FALSE){
			return "YES";
		}		
		else{
			return "NO";
		}

	}

	public function alex_rank($url){
		$doc = new \DOMDocument; 
		$url="http://data.alexa.com/data?cli=10&url={$url}";
		$doc->load($url);
		$thedocument = $doc->documentElement;
		$rankingInfo=$thedocument->getElementsByTagName('SD');

		$country="";
		$country_rank="";

		foreach($rankingInfo as $info){
			/****Get Reach Rank*****/
			$ranks=$info->getElementsByTagName('REACH');
			foreach($ranks as $rank){
				$reach_rank=$rank->getAttribute('RANK');
			}
			/****Get country Rank***/
			$countr_rank_info=$info->getElementsByTagName('COUNTRY');
			foreach($countr_rank_info as $c_info){
				$country=$c_info->getAttribute('NAME');
				$country_rank=$c_info->getAttribute('RANK');
			}
			/***** Get Traffic Rank *****/
			$ranks=$info->getElementsByTagName('POPULARITY');
			foreach($ranks as $rank){
				$traffic_rank=$rank->getAttribute('TEXT');
			}
		}
		$data['reach_rank']=isset($reach_rank)?$reach_rank:"no data";
		$data['country']=isset($country)?$country:"no data";
		$data['country_rank']=isset($country_rank)?$country_rank:"no data";
		$data['traffic_rank']=isset($traffic_rank)?$traffic_rank:"no data";
	    return $data;
	}
	public function alexa_data($url,$proxy=""){

		$data=array();
		$data["global_rank"]="";
		$data["traffic_rank_graph"]="";
		$data["country_rank"]="";
		$data["country"]="";
		$data["country_name"]=array();
		$data["country_percent_visitor"]=array();
		$data["country_in_rank"]=array();
		$data["bounce_rate"]="";
		$data["page_view_per_visitor"]="";
		$data["daily_time_on_the_site"]="";
		$data["visitor_percent_from_searchengine"]="";
		$data["search_engine_percentage_graph"]="";
		$data["keyword_name"]=array();
		$data["keyword_percent_of_search_traffic"]=array();
		$data["upstream_site_name"]=array();
		$data["upstream_percent_unique_visits"]=array();
		$data["total_site_linking_in"]="";
		$data["linking_in_site_name"]=array();
		$data["linking_in_site_address"]=array();
		$data["subdomain_name"]=array();
		$data["subdomain_percent_visitors"]=array();
		$data["status"]="";


	  	$alexa_url= "http://www.alexa.com/siteinfo/{$url}";
		$ch = curl_init(); // initialize curl handle
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/44.0 (compatible;)");
		curl_setopt($ch, CURLOPT_AUTOREFERER, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,7);
		curl_setopt($ch, CURLOPT_REFERER, 'http://'.$alexa_url);
		curl_setopt($ch, CURLOPT_URL,$alexa_url); // set url to post to
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 50); // times out after 50s
		curl_setopt($ch, CURLOPT_POST, 0); // set POST method
		
		/***** Proxy set for google . if lot of request gone, google will stop reponding. That's why it's should use some proxy *****/
		/**** Using proxy of public and private proxy both ****/
		// if($this->proxy_ip!='')
		// 	curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
		
		// if($this->proxy_auth_pass!='')	
		// 	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth_pass);
		
			
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies1.txt");  
		curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies1.txt");	 
	    $content = curl_exec($ch); // run the whole process
		
		$connect_info	= curl_getinfo($ch);
		$http_code=$connect_info['http_code'];
		curl_close($ch);
		
		
		preg_match('#<span.*?data-cat="globalRank".*?>.*?<img.*?title=\'Global.*?\' alt=\'Global.*?\'><strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
	 $global_rank=isset($matches[1])? $matches[1] : 'No Data';
	 $global_rank=preg_replace('#<!--.*?-->#',"",$global_rank);
	 $global_rank=trim($global_rank);
	 

		
	/**	Get Country Rank***/
	preg_match('#<span.*?data-cat="countryRank".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
	  $country_rank=isset($matches[1])? $matches[1] : 'No Data';
	  $country_rank=trim($country_rank);
	
	/***Get Country **/
	
	preg_match('#<span.*?data-cat="countryRank".*?>.*?<img.*?title=\'(.*?)Flag\'.*?><strong class="metrics-data align-vmiddle">.*?</strong>#si', $content, $matches);
	
	 $country=isset($matches[1])? $matches[1] : 'No Data';
	
	
	$traffic_rank_graph="http://traffic.alexa.com/graph?o=lt&y=t&b=ffffff&n=666666&f=999999&p=4e8cff&r=1y&t=2&z=30&c=1&h=150&w=340&u={$url}";
	
	
	
	/************************  Audience Geography  ***************************************/
	
	/***** Get all top country wise rank and visitor percentage *****/
		
		$html = new \simple_html_dom();
		$html->load($content);
		
		$country_info_table = $html->find('table#demographics_div_country_table tr');
		
		$i=0;
		foreach($country_info_table as $tr){
			
			if(isset($tr->find('td',0)->plaintext))
			{
				$country_name[$i] =$tr->find('td',0)->plaintext;
				$country_name[$i]=str_replace("&nbsp;","", $country_name[$i]);
				$country_name[$i]=str_replace("&nbsp","", $country_name[$i]);
			}
			if(isset($tr->find('td',1)->plaintext))
			{
				$country_percent_visitor[$i] =$tr->find('td',1)->plaintext;
				$country_percent_visitor[$i]=str_replace("&nbsp;","", $country_percent_visitor[$i]);
				$country_percent_visitor[$i]=str_replace("&nbsp","", $country_percent_visitor[$i]);
			}
			if(isset($tr->find('td',2)->plaintext))	
			{
				$country_in_rank[$i] =$tr->find('td',2)->plaintext;
				$country_in_rank[$i]=str_replace("&nbsp;","", $country_in_rank[$i]);
				$country_in_rank[$i]=str_replace("&nbsp","", $country_in_rank[$i]);
			}
			$i++;
		}
		
		
		/********** 	 How engaged are visitors to xeroneit.net? 	 ****************/
		
		/*****	Get Bounce Rate	******/
		
		preg_match('#<span.*?data-cat="bounce_percent".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
		$bounce_rate=isset($matches[1])? $matches[1] : 'No Data';
		$bounce_rate=trim($bounce_rate);
		
		
		
		/****  Get page views per visitor	***/
		
		preg_match('#<span.*?data-cat="pageviews_per_visitor".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
		 $page_view_per_visitor=isset($matches[1])? $matches[1] : 'No Data';
		$page_view_per_visitor=trim($page_view_per_visitor);
		
		/***Get Daily Time on the site****/
		
		preg_match('#<span.*?data-cat="time_on_site".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
		$daily_time_on_the_site=isset($matches[1])? $matches[1] : 'No Data';
		$daily_time_on_the_site=trim($daily_time_on_the_site);
		
		
		
		/************************ Where do codecanyon.net's visitors come from? *************************************/
		
		/***Search Engine  Traffic****/
		
		preg_match('#<span.*?data-cat="search_percent".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);
		
		$visitor_percent_from_searchengine	=	isset($matches[1])? $matches[1] : 'No Data';
		$visitor_percent_from_searchengine=trim($visitor_percent_from_searchengine);
		
		$search_engine_percentage_graph="http://traffic.alexa.com/graph?o=lt&y=q&b=ffffff&n=666666&f=999999&p=4e8cff&r=1y&t=2&z=0&c=1&h=150&w=340&u={$url}";
		
		
		/*******	Top Keyword from Search Engine   ***********/
		
		$top_keyword_table = $html->find('table#keywords_top_keywords_table tr');
		$i=0;
		foreach($top_keyword_table as $tr){
			if(isset($tr->find('td',0)->plaintext))
			{
				$keyword_name[$i] = $tr->find('td',0)->plaintext;				
				$keyword_name[$i]=str_replace("&nbsp;","", $keyword_name[$i]);
				$keyword_name[$i]=str_replace("&nbsp","", $keyword_name[$i]);
			}
			if(isset($tr->find('td',1)->plaintext))
			{
				$keyword_percent_of_search_traffic[$i] = $tr->find('td',1)->plaintext;				
				$keyword_percent_of_search_traffic[$i]=str_replace("&nbsp;","", $keyword_percent_of_search_traffic[$i]);
				$keyword_percent_of_search_traffic[$i]=str_replace("&nbsp","", $keyword_percent_of_search_traffic[$i]);
			}
			$i++;
		}
		
		
		
		
			/***********
						Upstream Sites
						
						Which sites did people visit immediately before this site?
						
			****************/


		
		/*******Get upstream site ***********/
		$upstream_site_table = $html->find('table#keywords_upstream_site_table tr');
		$i=0;
		foreach($upstream_site_table as $tr){
			if(isset($tr->find('td',0)->plaintext))
			{
				$upstream_site_name[$i] = $tr->find('td',0)->plaintext;
				$upstream_site_name[$i]=str_replace("&nbsp;","", $upstream_site_name[$i]);
				$upstream_site_name[$i]=str_replace("&nbsp","", $upstream_site_name[$i]);

			}
			if(isset($tr->find('td',1)->plaintext))
			{
				$upstream_percent_unique_visits[$i] = $tr->find('td',1)->plaintext;
				$upstream_percent_unique_visits[$i]=str_replace("&nbsp;","", $upstream_percent_unique_visits[$i]);
				$upstream_percent_unique_visits[$i]=str_replace("&nbsp","", $upstream_percent_unique_visits[$i]);

			}
			$i++;
		}
		
		
		
		/****************	What sites link to codecanyon.net?  ********************/
		
			/******Get Total Sites Linking In ***********/
		
		
		preg_match('#<section id="linksin-panel-content".*?<span class="font-4 box1-r">(.*?)</span>#is', $content, $matches);
		
		$total_site_linking_in	=	isset($matches[1])? $matches[1] : 'No Data';
		$total_site_linking_in=trim($total_site_linking_in);
		
	/****Get site address and page where the domain linking in ******/
	
	
	$site_linking_in_table = $html->find('table#linksin_table tr');
		$i=0;
		foreach($site_linking_in_table as $tr){
		
			if(isset($tr->find('td',1)->plaintext))
			{
				
				$linking_in_site_name[$i] = $tr->find('td',1)->plaintext;
				$linking_in_site_name[$i]=str_replace("&nbsp;","", $linking_in_site_name[$i]);
				$linking_in_site_name[$i]=str_replace("&nbsp","", $linking_in_site_name[$i]);
			}
			
			
			$td = $tr->find('td');
			
			/*****Get link of the 3rd td, at the last it take the last anchor's href******/
			
			foreach($td as $t)
			{
				if(isset($t->find('a',0)->href))
				{
					
					$linking_in_site_address[$i] = $t->find('a',0)->href;
					$linking_in_site_address[$i]=str_replace("&nbsp;","", $linking_in_site_address[$i]);
					$linking_in_site_address[$i]=str_replace("&nbsp","", $linking_in_site_address[$i]);
				}
			}		
				
			$i++;
		}
		
		
		
		/******************	Where do visitors go on codecanyon.net?  *************************/
		
		/***Get subdomain and percentage of visitor of the site the***/ 
		
		
		$subdomain_link_table = $html->find('table#subdomain_table tr');
		$i=0;
		foreach($subdomain_link_table as $tr){
			if(isset($tr->find('td',0)->plaintext))
			{
				$subdomain_name[$i] = $tr->find('td',0)->plaintext;
				$subdomain_name[$i]=str_replace("&nbsp;","", $subdomain_name[$i]);
				$subdomain_name[$i]=str_replace("&nbsp","", $subdomain_name[$i]);
			}
			if(isset($tr->find('td',1)->plaintext))
			{
				$subdomain_percent_visitors[$i] = $tr->find('td',1)->plaintext;
				$subdomain_percent_visitors[$i]=str_replace("&nbsp;","", $subdomain_percent_visitors[$i]);
				$subdomain_percent_visitors[$i]=str_replace("&nbsp","", $subdomain_percent_visitors[$i]);
			}
			$i++;
		}
			
	
		
		if($http_code=='200'){
			$data['status']="success";
		}
		else{
			$data['status']="error";
		}
		
		
		if(isset($global_rank))
		$data["global_rank"]=strip_tags($global_rank);
		if(isset($country_rank))
		$data["country_rank"]=strip_tags($country_rank);
		if(isset($country))
		$data["country"]=strip_tags($country);
		if(isset($traffic_rank_graph))
		$data["traffic_rank_graph"]=$traffic_rank_graph;
		if(isset($country_name))
		$data["country_name"]=$country_name;
		if(isset($country_percent_visitor))
		$data["country_percent_visitor"]=$country_percent_visitor;
		if(isset($country_in_rank))
		$data["country_in_rank"]=$country_in_rank;
		if(isset($bounce_rate))
		$data["bounce_rate"]=$bounce_rate;
		if(isset($page_view_per_visitor))
		$data["page_view_per_visitor"]=$page_view_per_visitor;
		if(isset($daily_time_on_the_site))
		$data["daily_time_on_the_site"]=$daily_time_on_the_site;
		if(isset($visitor_percent_from_searchengine))
		$data["visitor_percent_from_searchengine"]=$visitor_percent_from_searchengine;
		if(isset($search_engine_percentage_graph))
		$data["search_engine_percentage_graph"]=$search_engine_percentage_graph;
		if(isset($keyword_name))
		$data["keyword_name"]=$keyword_name;
		if(isset($keyword_percent_of_search_traffic))
		$data["keyword_percent_of_search_traffic"]=$keyword_percent_of_search_traffic;
		if(isset($upstream_site_name))
		$data["upstream_site_name"]=$upstream_site_name;
		if(isset($upstream_percent_unique_visits))
		$data["upstream_percent_unique_visits"]=$upstream_percent_unique_visits;
		if(isset($total_site_linking_in))
		$data["total_site_linking_in"]=$total_site_linking_in;
		if(isset($linking_in_site_name))
		$data["linking_in_site_name"]=$linking_in_site_name;
		if(isset($linking_in_site_address))
		$data["linking_in_site_address"]=$linking_in_site_address;
		if(isset($subdomain_name))
		$data["subdomain_name"]=$subdomain_name;
		if(isset($subdomain_percent_visitors))
		$data["subdomain_percent_visitors"]=$subdomain_percent_visitors;
		
		return $data;
		
	}
	
	public function addHttp( $url ){
	
	    if ( !preg_match("~^(?:f|ht)tps?://~i", $url) )
	    {
	        $url = "http://" . $url;
	    }
	
	    return $url;
	}

	public function get_general_content($url,$proxy=""){
			
			
			$ch = curl_init(); // initialize curl handle
           /* curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);*/
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
            curl_setopt($ch, CURLOPT_AUTOREFERER, false);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
            curl_setopt($ch, CURLOPT_REFERER, 'http://'.$url);
            curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
            curl_setopt($ch, CURLOPT_TIMEOUT, 120); // times out after 50s
            curl_setopt($ch, CURLOPT_POST, 0); // set POST method

           /**** Using proxy of public and private proxy both ****/
		// if($this->proxy_ip!='')
		// 	curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
		
		// if($this->proxy_auth_pass!='')	
		// 	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth_pass);
		 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
            curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");
            
            $content = curl_exec($ch); // run the whole process
			
            curl_close($ch);
			return $content;			
	}

}
