<?php
/**
 * Created by PhpStorm.
 * User: oks
 * Date: 15. 5. 10.
 * Time: 오후 10:34
 */
class KW_WpHttpClient implements KW_HttpClient {
	public $host;
	public $requestMethod;
	public $headers = array();
	public $params = array();

	public function request() {
		$response = null;

		switch ( $this->requestMethod ) {
			case 'GET' :
				$host     = $this->host . '?' . http_build_query( $this->params );
				$response = wp_remote_get( $host, array(
					'headers' => $this->headers
				) );
				break;
			case 'POST' :
				$response = wp_remote_post( $this->host, array( 'body' => $this->params ) );
				break;
			case 'HEAD' :
				break;
		}

		$this->headers = array();
		$this->params  = array();

		return $response['body'];
	}

	public function setRequestMethod( $requestMethod ) {
		$this->requestMethod = $requestMethod;

		return $this;
	}

	public function addParameter( $key, $value ) {
		$this->params[ $key ] = $value;
	}

	public function addHeader( $key, $value ) {
		$this->headers[ $key ] = $value;
	}

	public function setHost( $host ) {
		$this->host = $host;
	}

	public function getHeaders() {
		return $this->headers;
	}

	public function getParameters() {
		return $this->params;
	}
}