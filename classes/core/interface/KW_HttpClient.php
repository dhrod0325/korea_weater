<?php
/**
 * Created by PhpStorm.
 * User: oks
 * Date: 15. 5. 10.
 * Time: 오후 10:33
 */
interface KW_HttpClient {
	public function setHost( $host );

	public function addHeader( $key, $value );

	public function addParameter( $key, $value );

	public function setRequestMethod( $requestMethod );

	public function getHeaders();

	public function getParameters();

	public function request();
}