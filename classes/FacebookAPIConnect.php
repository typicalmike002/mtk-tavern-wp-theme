<?php 
/* Facebook API Intergration */

class FacebookAPIConnect {

	private $fb_page_id;
	private $fb_app_id;

	private $year_range;
	private $since_date;
	private $until_date;

	private $since_unix_timestamp;
	private $until_unix_timestamp;

	private $access_token;

	private $fields;
	private $json_link;

	public $json;

	public function __construct () {

		$this->fb_page_id = "364219330272299";
		$this->fb_app_id = "1705291236407017";

		$this->year_range = 1;
		$this->since_date = date('Y-m-d');
		$this->until_date = date('Y-01-01', strtotime('+' . $this->year_range . ' years'));

		$this->since_unix_timestamp = strtotime( $this->since_date );
		$this->until_unix_timestamp = strtotime( $this->until_date );

		$this->access_token = "CAACEdEose0cBAPvVPnpOxRrqmbVepPh4Qdsl0dB57wtyQaKwJmWqkCxOkDddZA9fUVvjWrCVgGiejSZCZATZAXKaUlxZBlpZA5skUpMruuaF5jNkLniIXeUEOirCpPo8izyxVqxWkyUKrQW7WsvO8IKhBGKdFxniEEtBUEmOzdkaM8Pn86RJ60715J1N6H1Wm1ULPSj6U0UHtojgNOmUp0CpjpEv6zpsgZD";

		$this->fields = "id,name,description,timezone,start_time,cover";
		$this->json_link = "https://graph.facebook.com/{$this->fb_page_id}/events/attending/?fields={$this->fields}&access_token={$this->access_token}&since={$this->since_unix_timestamp}&until={$this->until_unix_timestamp}";

		$this->json = file_get_contents( $this->json_link );
	}
}

?>