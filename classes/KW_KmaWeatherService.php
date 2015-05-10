<?php

/**
 * Created by PhpStorm.
 * User: oks
 * Date: 15. 5. 10.
 * Time: 오후 10:34
 */
class KW_KmaWeatherService implements KW_WeatherService {
	const API_HOST = 'http://www.kma.go.kr/wid/queryDFSRSS.jsp';

	/**
	 * @var KW_HttpClient
	 */
	public $client;

	public $zone;

	public function prepareGetWeather() {
		$this->client->setHost( self::API_HOST );
		$this->client->setRequestMethod( KW_HttpRequestMethod::GET );
		$this->client->addParameter( 'zone', $this->zone );
	}

	/**
	 * @return \KW_Weather[]
	 */
	public function getWeather() {
		$this->prepareGetWeather();

		$response = $this->client->request();

		$xml = simplexml_load_string( $response );

		$results = array();

		foreach ( $xml->channel->item->description->body->data as $item ) {
			$weather          = new KW_Weather();
			$weather->temp    = $item->temp;
			$weather->maxTemp = $item->tmx;
			$weather->minTemp = $item->tmn;

			$results[] = $weather;
		}

		return $results;
	}

	public function setClient( KW_HttpClient $client ) {
		$this->client = $client;
	}
}