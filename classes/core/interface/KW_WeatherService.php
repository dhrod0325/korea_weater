<?php
/**
 * Created by PhpStorm.
 * User: oks
 * Date: 15. 5. 10.
 * Time: 오후 10:34
 */
interface KW_WeatherService {
	/**
	 * @param KW_HttpClient $client
	 */
	public function setClient( KW_HttpClient $client );

	public function getWeather();
}