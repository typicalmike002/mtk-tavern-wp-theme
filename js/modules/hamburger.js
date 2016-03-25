define(function(){

	// Adds an annimation to the hamburger inside header.php.

	var Hamburger = function(toggleID, closed, opened) {
		var toggleDiv = document.getElementById(toggleID),
			closeDiv = document.getElementsByClassName(closed)[0],
			openDiv = ' ' + opened;

		toggleDiv.onchange = function(){
			$(closeDiv).toggleClass(openDiv);
<<<<<<< HEAD
		};
	};
=======
		}
	}
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc

	return Hamburger;
});