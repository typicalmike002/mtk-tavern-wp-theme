define(function(){

	// Adds an annimation to the hamburger inside header.php.

	var Hamburger = function(toggleID, closed, opened) {
		var toggleDiv = document.getElementById(toggleID),
			closeDiv = document.getElementsByClassName(closed)[0],
			openDiv = ' ' + opened;

		toggleDiv.onchange = function(){
			$(closeDiv).toggleClass(openDiv);
		}
	}

	return Hamburger;
});