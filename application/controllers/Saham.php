<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saham extends Base_controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//die(strtotime(date("Y-m-d H:i:s"));
		$xxx = date("Y-m-d H:i:s", 1599681602);
		$yyy = date("Y-m-d H:i:s", 1619058386);
		//echo $xxx." - ".$yyy;
		$curl = curl_init();

		/*curl_setopt_array($curl, [
			//CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v8/finance/spark?symbols=DSSA.JK&range=5y&interval=1d",
			//CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v8/finance/chart/DSSA.JK?interval=15m&range=1y&region=HK&lang=en",
			//CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v6/finance/quote?symbols=DSSA.JK&lang=en&region=US",
			//CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v11/finance/quoteSummary/DSSA.JK?modules=summaryDetail,earningsTrend,earnings,indexTrend,price&region=HK&lang=en", //sharesOutstanding
			//CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v11/finance/quoteSummary/DSSA.JK?modules=summaryDetail&region=HK&lang=en", //Market Cap, 52 week high low, Day low high, volume, yield Div, open, prev close
			CURLOPT_URL => "https://stock-and-options-trading-data-provider.p.rapidapi.com/straddle/DSSA.JK",
			
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: stock-and-options-trading-data-provider.p.rapidapi.com",
				"x-rapidapi-key: e9a03cc5bdmsh3481c362d13a596p1df616jsn5562d4883f4c"
			],
		]);*/
		//149c0cfe44msh2d9dbd1fc1f56a9p12fefajsn24e45a79eb69
		curl_setopt_array($curl, [
	CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-summary?symbol=DSSA.JK&region=HK",
	//CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-historical-data?symbol=DSSA.JK&region=HK"
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
		"x-rapidapi-key: e9a03cc5bdmsh3481c362d13a596p1df616jsn5562d4883f4c"
	],
]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$xx = json_decode($response);
			/*echo "<pre>";
			print_r($xx);
			echo "</pre>";
			die();*/
			$data=array();
			foreach($xx->defaultKeyStatistics as $yek=> $y) {
				if($yek=="52WeekChange") {
					foreach($y as $key=> $z) {
						if($key=="raw") $data['change_year']=$z;
						break;
					}
				}
			}
			$data['tgl'] = date("Y-m-d H:i:s", $xx->price->regularMarketTime);
			$data['saham_now'] = $xx->price->regularMarketPrice->raw;
			$data['saham_prev'] = $xx->price->regularMarketPreviousClose->raw;
			$data['saham_open'] = $xx->price->regularMarketOpen->raw;
			$data['day_high'] = $xx->price->regularMarketDayHigh->raw;
			$data['day_low'] = $xx->price->regularMarketDayLow->raw;
			$data['volume'] = $xx->price->regularMarketVolume->raw;
			$data['change_val'] = $xx->price->regularMarketChange->raw;
			$data['change_pct'] = $xx->price->regularMarketChangePercent->raw;
			$data['market_cap'] = $xx->price->marketCap->raw;
			$data['market_cap_fmt'] = $xx->price->marketCap->fmt;
			$data['share_outstanding'] = $xx->defaultKeyStatistics->sharesOutstanding->raw;
			$data['share_outstanding_fmt'] = $xx->defaultKeyStatistics->sharesOutstanding->fmt;
			if(isset($xx->defaultKeyStatistics->yield->raw)) $data['yield_div'] = $xx->defaultKeyStatistics->yield->raw;
			else $data['yield_div'] = "";
			$data['52_week_high'] = $xx->summaryDetail->fiftyTwoWeekHigh->raw;
			$data['52_week_low'] = $xx->summaryDetail->fiftyTwoWeekLow->raw;
			$data['rasio_pe'] = $xx->defaultKeyStatistics->trailingEps->fmt;
			$data['created_on'] = date("Y-m-d H:i:s");
			//print_r($data);
			//die();
			$this->db->insert("saham", $data);
			//var_dump($xx);
			//die($xx->chart->result[0]->meta->previousClose);
			//die($xx->chart->result[0]);
			/*echo "<pre>";
			print_r(json_decode($response));
			echo "</pre>";*/
		}
	}
	
	public function history(){
		//die(strtotime(date("2018-12-31"))."S");
		/*$xxx = date("Y-m-d H:i:s", 1620716400);
		$yyy = date("Y-m-d H:i:s", 1620720000);
		echo $xxx." - ".$yyy;die();*/
		$curl = curl_init();
		//1d|5d|1mo|3mo|6mo|1y|2y|5y|10y|ytd|max
		curl_setopt_array($curl, [
			//CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-historical-data?symbol=DSSA.JK&region=HK",
			//CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-chart?interval=60m&symbol=DSSA.JK&period1=1546189200&period2=1577725200&region=HK",
			CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-chart?interval=60m&symbol=DSSA.JK&range=1mo&region=HK",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
				"x-rapidapi-key: e9a03cc5bdmsh3481c362d13a596p1df616jsn5562d4883f4c"
			],
		]);
				
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$xx = json_decode($response);
			$yy = $xx->chart->result[0];
			/*echo "<pre>";
			print_r($xx);
			echo "</pre>";
			die();*/
			$temp=array("saham_close"=> 0, "saham_high"=> 0, "saham_low"=> 0, "saham_open"=> 0, "saham_volume"=> 0);
			foreach($yy->timestamp as $key=> $val) {
				$data=array();
				$saham = $yy->indicators->quote[0];
				$data['tgl'] = date("Y-m-d H:i:s", $val);
				$data['saham_close'] = $saham->close[$key] != "" ? $saham->close[$key] : $temp['saham_close'];
				$data['saham_high'] = $saham->high[$key] != "" ? $saham->high[$key] : $temp['saham_high'];
				$data['saham_low'] = $saham->low[$key] != "" ? $saham->low[$key] : $temp['saham_low'];
				$data['saham_open'] = $saham->open[$key] != "" ? $saham->open[$key] : $temp['saham_open'];
				$data['saham_volume'] = $saham->volume[$key] != "" ? $saham->volume[$key] : $temp['saham_volume'];
				//$data['saham_adjclose'] = $yy->indicators->adjclose[0]->adjclose[$key];
				$data['created_on'] = date("Y-m-d H:i:s");
				$cek = $this->db->query("select tgl from saham_history where tgl='".$data['tgl']."'");
				if($cek->num_rows() == 0) {
					//print_r($data);
					//die();
					$this->db->insert("saham_history", $data);
				}
				$temp=$data;
			}
		}
	}
	
	public function detail(){
		$data=array();
		$Prefix="";
		$data['Menu_parents'] = $this->Site->Menu_parents($Prefix);
		$data['Menu_children'] = $this->Site->Menu_children(null, $Prefix);
		$data['Menu_hidden'] = $this->Site->Menu_hidden();
		
		if(!$this->input->post("start_date")) {
			$awal=strtotime(date("Y-m-d"))-(5011200/2);
			$now=strtotime(date("Y-m-d"));
		} else {
			$start = $this->input->post("start_date");
			$end = $this->input->post("end_date");
			$exp = explode("/",$start);
			$start = $exp[2]."-".$exp[1]."-".$exp[0];
			$exp = explode("/",$end);
			$end = $exp[2]."-".$exp[1]."-".$exp[0];
			
			$awal=strtotime($start);
			$now= !$end ? strtotime(date("Y-m-d")) : strtotime($end);
		}
		$selisih = ($now - $awal)/86400;
		if($selisih <= 31) $interval=1;
		else $interval=round($selisih/31);
		//die($interval."S");
		$this->db->where("tgl >=", date("Y-m-d", $awal));
		$this->db->where("tgl <=", date("Y-m-d", $now));
		$this->db->order_by("tgl", "desc");
		$history = db_entries('saham_history');
		$trend=array();
		foreach($history as $r) {
		    if(!isset($trend[strtotime(substr($r['tgl'],0,10))])) $trend[strtotime(substr($r['tgl'],0,10))] = $r['saham_close'];
		}
		//print_r($trend);
		//die($this->db->last_query());
		$k=0;
		for($i=$awal;$i<=$now;$i+=86400) {
			$dt = date("Y-m-d", $i);
			$x_line[] = "'".$this->FormatTanggalChart($dt)."'";
			if(!isset($trend[$i]) || $trend[$i]==0) {
				if(isset($trend[$i-86400])) $trend[$i] = $trend[$i-86400];
				else {
					$dt = date("Y-m-d", $i);
					$last = $this->db->query("select saham_open from saham_history where tgl < '".$dt."' AND saham_open > 0 order by tgl desc limit 1")->result_array()[0];
					$trend[$i] = $last['saham_open'];
				}
			}
			$line[] = $trend[$i];
		}
		$data['interval'] = $interval;
		$data['start_date'] = date("d/m/Y", $awal);
		$data['end_date'] = date("d/m/Y", $now);
		$data['x_line'] = join(",",$x_line);
		$data['line'] = join(",",$line);
		$this->load->view('frontend/saham', $data);
	}
	
	function FormatTanggalChart($tgl)
	{
		$exp = explode("-", $tgl);
		//$tgl = $exp[2]." ".GetMonth(intval($exp[1]))." ".substr($exp[0],2,2);
		$tgl = $exp[2]."/".$exp[1];
		return $tgl;
	}
	
	function kurs()
	{
		$xx = file_get_contents("https://usd.fxexchangerate.com/idr.xml");
		$yy = explode("<![CDATA[",$xx);
		$zz = explode(" ",$yy[1]);
		//print_r($zz);
		$kurs = round($zz[11]);
		$cek = $this->db->query("select id from kurs where tanggal='".date("Y-m-d")."'");
		if($cek->num_rows() == 0) {
			$this->db->insert("kurs", array("kurs"=> $kurs, "tanggal"=> date("Y-m-d")));
		}
	}
	
	function ses_rups($idx="")
	{
		if($idx) $this->session->set_userdata("ses_rups", $idx);
	}
	
	function ses_fin($idx="")
	{
		if($idx) $this->session->set_userdata("ses_fin", $idx);
	}
}
