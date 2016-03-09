<?php 
/**
 * For a detailed step by step guide, see: https://www.codeofaninja.com/2011/07/display-facebook-events-to-your-website.html
 *
 * @return $json Contents of the MTK Calendar from Facebook.
 * @uses public event_data to return the events in reverse order so sooner events are displayed first.
 * @since MTK Tavern 1.0
*/
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
	private $json;

	private $obj;

	public function __construct () {

		$this->fb_page_id = "364219330272299";
		$this->fb_app_id = "1705291236407017";

		$this->year_range = 2;
		$this->since_date = date('Y-m-d');
		$this->until_date = date('Y-01-01', strtotime('+' . $this->year_range . ' years'));

		$this->since_unix_timestamp = strtotime( $this->since_date );
		$this->until_unix_timestamp = strtotime( $this->until_date );

		$this->access_token = "CAACEdEose0cBAOrOsx3Eyj86ZAqZCs6hY4wSZBhyggT1K9ZCyBs3O6r29tVZC58kS2ysRzk5eXp2ZBdx0txm7KdNWctpUOjwcJcVAHcfxKaCSZBcZCmHNG26nQfqJHWTsu7s6muvIbhrbMhZAiEbZAjSQHyBVoz8sZAfk0BBxcrDOA9eONg9jDUaVG0VCrKgnDMn7Bq6B5ADIpKjTFpPh97m5Xj5pZC82fKrsUUZD";

		$this->fields = "id,name,description,timezone,start_time,cover";
		$this->json_link = "https://graph.facebook.com/{$this->fb_page_id}/events/attending/?fields={$this->fields}&access_token={$this->access_token}&since={$this->since_unix_timestamp}&until={$this->until_unix_timestamp}";

		$this->json = file_get_contents( $this->json_link );
		$this->obj = json_decode( $this->json, true ); // 'true' returns an array.
	}

	public function event_data(){
		$tmp = json_decode( $this->json, true );
		$this->obj['data'] = array_reverse($tmp['data']);
		return $this->obj;
	}
}

?>