// AddInput function():

// This file requires a 'menu_object' json object created by 'admin_templates/templates/create-food-menu.php'

var json = JSON.stringify(menu_object);

var food_menu = {

	wrapper:
		'<form method="POST" id="menu_object">'
		+	'<div id="food_menu_container" class="food_menu_container">'
		+ 		'<input type="button" value="Create New Catagory" id="add_catagory" onClick="addInput(this);">'
		+	'</div>'
	+	'</form>',		

	catagory: 
		'<div class="catagory">'
		+	'<label><h3>Catagory Title</h3></label>'
		+	'<input type="text">'
		+	'<input type="button" value="Remove Catagory" onClick="removeInput(this);">'
		+	'<div class="sub_catagory">'
		+ 	'</div>'
	+	'</div>',

	sub_catagory: 
		'<label>Sub Catagory</label>'
	+	'<input type="text">'
	+	'<input type="button" value="Add Sub Catagory" onClick="addInput(this);">'
	+ 	'<input type="button" value="Remove Catagory" onClick="removeInput(this);">'
	+ 	'<label>Price</label>'
	+	'<input type="text">'
	+ 	'<div class="food_items">'
	+ 	'</div>',

	food_items:
		'<h3>Food Items</h3>'
	+	'<label>Food Item</label>'
	+ 	'<input type="text">'
	+	'<label>Price</label>'
	+	'<input type="text">'
	+	'<label>Description</label>'
	+	'<textarea rows="4" cols="50"></textarea><br />'
	+	'<input type="button" value="Add Food Item" onClick="addInput(this);">'
	+	'<input type="button" value="Remove Food Item" onClick="removeInput(this);">'
};

window.onload = function() {
	var main_div = document.getElementById('food_menu_form');
	main_div.innerHTML = food_menu.wrapper;
};

var addInput = function(div) {
	var new_input = document.createElement('div'),
		parent_div = div.parentElement;

	switch (parent_div.className) {

		
		// Adds a new Catagory.
		case "food_menu_container":


			// Create a new catagory.
			new_input.innerHTML = food_menu.catagory;

			// Create a single sub catagory.
			var sub_cats_div = new_input.getElementsByClassName('sub_catagory')[0];
			sub_cats_div.innerHTML = food_menu.sub_catagory;

			// Creates a single food item.
			var food_items_div = sub_cats_div.getElementsByClassName('food_items')[0];
			food_items_div.innerHTML = food_menu.food_items;

			// Appends the new Div to before the add-catagory button.
			var add_catagory_button = document.getElementById('add_catagory');
			parent_div.insertBefore(new_input, add_catagory_button);

			// Filters the results and adds an appropriate name value to 
			// all sub catagory elements.  'd' stands for div.
			var new_names = sub_cats_div.querySelectorAll('input[type=text]'),
				catagory_index = document.getElementsByClassName('catagory').length,
				sub_catagory_index = new_input.getElementsByClassName('sub_catagory').length;
				
				// Adds a catagory index number to each sub catagory inside this catagory.
				[].filter.call(new_names, function(d){
					return d.parentNode === sub_cats_div;
				}).forEach(function(d){
					d.setAttribute("name", 'sub-catagory-' + catagory_index);
				});

				// Adds a sub catagory index number to each food item.
				[].filter.call(new_names, function(d){
					return d.parentNode === food_items_div;
				}).forEach(function(d){
					d.setAttribute("name", 'sub-catagory-' + catagory_index + '-food-item-' + sub_catagory_index);
				});

				// Adds a sub catagory index number to the descriptions.
				food_items_div.querySelector('textarea')
					.setAttribute("name", 'sub-catagory-' + catagory_index + '-food-item-' + sub_catagory_index);

		break;

		// Adds a sub catagory to the current catagory.
		case "sub_catagory":

			// Creates the new sub catagory.
			new_input.innerHTML = food_menu.sub_catagory;

			// Creates a single food item.
			var food_items_div = new_input.getElementsByClassName('food_items')[0];
			food_items_div.innerHTML = food_menu.food_items;

			// Appends the new div to the sub-catagory class.
			new_input.className = "sub_catagory";
			parent_div.parentNode.appendChild(new_input);

			// Filters the results and adds the appropriate name value to all sub catagory elements.
			var new_names = food_items_div.parentNode.querySelectorAll('input[type=text]'),
				catagory_index = parent_div.querySelector('input[type=text]').getAttribute('name'),
				sub_catagory_index = parent_div.parentElement.getElementsByClassName('sub_catagory').length;

				// Uses the newly created div to filter for sub catagories. 
				[].filter.call(new_names, function(d){
					return d.parentNode === new_input;
				}).forEach(function(d){
					d.setAttribute("name", catagory_index);
				});

				// Adds a sub catagory index number to each food item.
				[].filter.call(new_names, function(d){
					return d.parentNode === food_items_div;
				}).forEach(function(d){
					d.setAttribute("name", catagory_index + '-food-item-' + sub_catagory_index);
				});

				// Adds a sub catagory index number to the descriptions.
				food_items_div.querySelector('textarea')
					.setAttribute("name", catagory_index + '-food-item-' + sub_catagory_index);

		break;

		// Adds a food item to the current sub catagory.
		case "food_items":

			// Creates the new food item section.
			new_input.innerHTML = food_menu.food_items;

			// Appends the food item to the list of food items.
			new_input.className = "food_items";
			parent_div.parentNode.appendChild(new_input);

			// Adds the sub catagory index from the first food items to all food items added after the fact.
			var new_names = new_input.querySelectorAll('input[type=text]'),
				sub_catagory_index = new_input.previousSibling.querySelector('input[type=text]').getAttribute('name');

				// Adds a sub catagory index number to each food item.
				[].forEach.call(new_names, function(d){
					d.setAttribute("name", sub_catagory_index);
				});

				// Adds a sub catagory index number to the descriptions.
				new_input.querySelector('textarea')
					.setAttribute("name", sub_catagory_index);

		break;

		default:
			console.log('addInput(): ERROR.  parent_div does not match any case statements');
		break;
	}
};

var removeInput = function(div){
	div.parentNode.parentElement.removeChild(div.parentNode);
};

