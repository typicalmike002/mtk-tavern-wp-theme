<?php 
/**
 * For a detailed step by step guide, see: https://www.codeofaninja.com/2011/07/display-facebook-events-to-your-website.html
 *
 * This file has been modified from the above guide.  Now it's in class form, the necessary API calls are built into the 
 * constructor, and it contains a sorting function so events appear in order.  After invoking this class with new, you
 * can retrieve the data in array form by calling the public "event_data" function from outside this class. 
 *     
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
	private $events;

	public function __construct () {
		
		$this->events = array(); // Blank data array that is returned to the user.

	public function __construct () {

		$this->fb_page_id = "Secret FB Page ID Number Goes Here";
		$this->fb_app_id = "Secret FB App ID Number Goes Here";

		$this->year_range = 2;
		$this->since_date = date('Y-m-d');
		$this->until_date = date('Y-01-01', strtotime('+' . $this->year_range . ' years'));

		$this->since_unix_timestamp = strtotime( $this->since_date );
		$this->until_unix_timestamp = strtotime( $this->until_date );

		$this->access_token = "Secret Access Token Goes Here";

		$this->fields = "id,name,description,timezone,start_time,cover";
		$this->json_link = "https://graph.facebook.com/{$this->fb_page_id}/events/attending/?fields={$this->fields}&access_token={$this->access_token}&since={$this->since_unix_timestamp}&until={$this->until_unix_timestamp}";

		$this->json = file_get_contents( $this->json_link );
		$this->obj = json_decode( $this->json, true ); // 'true' returns an array.
	}

<<<<<<< HEAD
	// Return the data retrieved in the correct order.
	public function event_data(){
		$tmp = json_decode( $this->json, true );
		$this->obj = $tmp['data'];

		foreach ($this->obj as $key => $value){
			$this->events[$key] = array(
				'id' 			=> $value['id'],
				'name' 			=> $value['name'],
				'start_time' 	=> $value['start_time'],
				'timezone' 		=> $value['timezone'],
				'cover' 		=> $value['cover']['source'],
				'description' 	=> $value['description']
			);
		}

		usort($this->events, array($this, 'sort_timestamp_callback') );
		return $this->events;
	}

	// Local Sorting function that returns the data 
	private function sort_timestamp_callback($a, $b) {
		return ( strtotime($a['start_time']) - strtotime($b['start_time']) );
	}
}

?>
	// Reverses the events before returning the data.
	public function event_data(){
		$tmp = json_decode( $this->json, true );
		$this->obj['data'] = array_reverse($tmp['data']);
		return $this->obj;
	}
}

?>
