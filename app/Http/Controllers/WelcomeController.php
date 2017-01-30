<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
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
		$objectURL = "www.techgig.com";
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
		echo "DMOZ API Info";
		echo "<pre>";
		print_r($content);
		echo "</pre>";
	    echo "=======================================================";
		$url="http://www.dmoz.org/search?q='www.mobisoftinfotech.com'";
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
			echo "yes";
		}		
		else{
			echo "no";
		}

		echo "=======================================================";

		$google_url= "www.google.com/search?q=link:www.totalchecker.com";
		
		$ch = curl_init(); // initialize curl handle
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		curl_setopt($ch, CURLOPT_AUTOREFERER, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,7);
		curl_setopt($ch, CURLOPT_REFERER, 'http://'.$google_url);
		curl_setopt($ch, CURLOPT_URL,$google_url); // set url to post to
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 50); // times out after 50s
		curl_setopt($ch, CURLOPT_POST, 0); // set POST method
	
		/***** Proxy set for google . if lot of request gone, google will stop reponding. That's why it's should use some proxy *****/
		/**** Using proxy of public and private proxy both ****/
		// if($this->proxy_ip!=''){
		// 	curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
		// }
			
			
		// if($this->proxy_auth_pass!='')	
		// 	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth_pass);
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		// curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
		// curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");	
		$content = curl_exec($ch); // run the whole process
		
		preg_match('#<font size="-1">About.*?([\d,]+).*?</font>#si', $content, $google_index); 
		
		echo "backlink Count";
		
		echo "===========================================";
		echo "<pre>";
		print_r($google_index[1]);
		echo "</pre>";
		echo "===========================================";
		$domain = "http://www.kvcodes.com";
		$tags = get_meta_tags($domain);
		echo "MetaData";
		echo "<pre>";
		print_r($tags);
		echo "</pre>";
		echo "===========================================";

		
		echo "Alexa RANK Info";
		$doc = new \DOMDocument; 
		$url="http://data.alexa.com/data?cli=10&url={$domain}";
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

		$response['reach_rank']=isset($reach_rank)?$reach_rank:"no data";
		$response['country']=isset($country)?$country:"no data";
		$response['country_rank']=isset($country_rank)?$country_rank:"no data";
		$response['traffic_rank']=isset($traffic_rank)?$traffic_rank:"no data";
		echo "<pre>";
		print_r($response);
		echo "</pre>";
		echo "===========================================";
		echo "Facebook";

		/*** 		Social Network      ***/

	/*********Get Facebook Like share Comment Count*********/
        $url = "http://mycodingtricks.com/html5/html5-inline-edit-with-mysql-php-jquery-and-ajax/";
		$url="http://graph.facebook.com/?id=".$url;

		$data = json_decode(file_get_contents($url),true);
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		// $shares = $data[0]['share_count'];
		// $comments = $data[0]['comment_count'];
		// $likes  = $data[0]['like_count'];
		// echo "Total Shares: ".$shares;
		// echo "Total Likes: ".$likes;
		// echo "Total Comments: ".$comments;

		/*****Retrun google plus Share (plus one )*******/	
	    echo "===========================================";
		echo "Ping";
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
        
		echo "<pre>";
		print_r($ping);
		echo "</pre>";

		
		die();
		return view('welcome');
	}

	public function addHttp( $url ){
	
	    if ( !preg_match("~^(?:f|ht)tps?://~i", $url) )
	    {
	        $url = "http://" . $url;
	    }
	
	    return $url;
	}

}
