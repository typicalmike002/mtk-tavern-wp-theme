// Script used by facebook for using its share button on the calendar sections.

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if ( d.getElementById(id) ) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1705291236407017";
	fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));