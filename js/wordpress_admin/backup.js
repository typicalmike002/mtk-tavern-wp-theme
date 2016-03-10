// AddInput function():

// This file requires a 'menu_object' json object created by 'admin_templates/templates/create-food-menu.php'

var test_menu = JSON.stringify(menu_object.menu_items);

console.log(test_menu);



var food_menu = {

	wrapper:
		'<form method="POST" id="menu_object">'
		+	'<div id="food_menu_container" class="food_menu_container">'
		+ 		'<input type="button" value="Create New Category" id="add_category" onClick="addInput(this);">'
		+	'</div>'
	+	'</form>',		

	category: 
		'<div class="category">'
		+	'<label><h3>Category Title</h3></label>'
		+	'<input type="text" name="category[]" class="categoryDiv">'
		+	'<input type="button" value="Remove Category" onClick="removeInput(this);">'
		+	'<div class="sub_category">'
		+ 	'</div>'
	+	'</div>',

	sub_category: 
		'<label>Sub Category</label>'
	+	'<input type="text" size="50" class="subCategoryDiv">'
	+	'<input type="button" value="Add Sub Category" onClick="addInput(this);">'
	+ 	'<input type="button" value="Remove Sub category" onClick="removeInput(this);">'
	+ 	'<label>Price</label>'
	+	'<input type="text" class="subCategoryPriceDiv">'
	+ 	'<div class="food_items">'
	+ 	'</div>',

	food_items:
		'<h3>Food Items</h3>'
	+	'<label>Food Item</label>'
	+ 	'<input type="text" class="foodItemDiv">'
	+	'<label>Description</label>'
	+	'<textarea rows="4" cols="50" class="foodItemDescriptionDiv"></textarea><br />'
	+	'<label>Price</label>'
	+	'<input type="text" class="foodItemPriceDiv"><br/>'
	+	'<input type="button" value="Add Food Item" onClick="addInput(this);">'
	+	'<input type="button" value="Remove Food Item" onClick="removeInput(this);">'
};

window.onload = function() {
	
	// By default, hook the wrapper content into the outer container.
	var main_div = document.getElementById('food_menu_form');
	main_div.innerHTML = food_menu.wrapper;

	// Used to add more categories dynamically (see the below loops).
	var food_menu_div = document.getElementById('add_category');

	// If WordPress passes this script a JSON object, loop through it and
	// fill out the form as neccessary.  Please clean this section up...
	var categories_obj = menu_object.menu_items;
	if ( categories_obj ) {

		// Loops through each category, breaking it down by sub category and food items.
		for ( var key in categories_obj ) {
			
			if ( !categories_obj.hasOwnProperty(key) ) { continue; }

			if ( categories_obj[key].category ) {

				// Adds new category input elements automatically before setting it's value.
				addInput( food_menu_div );
				document.getElementsByClassName('categoryDiv')[key].value = categories_obj[key].category;

				var sub_categories_obj = categories_obj[key]['sub-categories'];
				if ( sub_categories_obj ) {

					// Loops through each sub category inside the current category.
					for ( var sub_key in sub_categories_obj ) {

						if ( !sub_categories_obj.hasOwnProperty(sub_key) ) { continue; }

						if ( sub_categories_obj[sub_key]['sub-category'] ) {

							var sub_category_div = document.getElementsByClassName('subCategoryDiv')[sub_key];
							var sub_category_price_div = document.getElementsByClassName('subCategoryPriceDiv')[sub_key];

							// Only adds a sub category input element if there is more than one sub category.
							if ( sub_key !== '0' ) { addInput( sub_category_div ); }
							
							sub_category_div.value = sub_categories_obj[sub_key]['sub-category'];
							sub_category_price_div.value = sub_categories_obj[sub_key]['price'];

							var food_items_obj = sub_categories_obj[sub_key]['food-items'];
							if ( food_items_obj ) {

								// Loops through each food item inside the current sub category.
								for ( var food_key in food_items_obj ) {

									if ( !food_items_obj.hasOwnProperty(food_key) ) { continue; }

									if ( food_items_obj[food_key]['food-item'] ) {
										
										var food_item_div = document.getElementsByClassName('foodItemDiv')[food_key];
										var food_item_description_div = document.getElementsByClassName('foodItemDescriptionDiv')[food_key]
										var food_item_price_div = document.getElementsByClassName('foodItemPriceDiv')[food_key];
										
										// Only adds a food-item input element if there is more than one food-item.
										if ( food_key !== '0' ) { addInput( food_item_div ); }

										food_item_div.value = food_items_obj[food_key]['food-item'];
										food_item_description_div.value = food_items_obj[food_key]['description'];
										food_item_price_div.value = food_item_obj[food_key]['food-price'];

									}
								}
							}
						}
					}
				}
			}
		}
	}
};

var addInput = function(div) {
	var new_input = document.createElement('div'),
		parent_div = div.parentElement;

	switch (parent_div.className) {
		
		// Adds a new category.
		case "food_menu_container":


			// Create a new category.
			new_input.innerHTML = food_menu.category;

			// Create a single sub category.
			var sub_cats_div = new_input.getElementsByClassName('sub_category')[0];
			sub_cats_div.innerHTML = food_menu.sub_category;

			// Creates a single food item.
			var food_items_div = sub_cats_div.getElementsByClassName('food_items')[0];
			food_items_div.innerHTML = food_menu.food_items;

			// Appends the new Div to before the add-category button.
			var add_category_button = document.getElementById('add_category');
			parent_div.insertBefore(new_input, add_category_button);

			// Filters the results and adds an appropriate name value to 
			// all sub category elements.  'd' stands for div.
			var new_names = sub_cats_div.querySelectorAll('input[type=text]'),
				category_index = document.getElementsByClassName('category').length,
				sub_category_index = new_input.getElementsByClassName('sub_category').length;

				// The following effects all indexes and is needed so php's foreach loop starts at 0.
				category_index--; sub_category_index--;
				
				// Adds a category index number to each sub category inside this category.
				[].filter.call(new_names, function(d){
					return d.parentNode === sub_cats_div;
				}).forEach(function(d, i){

					var isPrice = i % 2 === 0 ? '' : '-price';
					d.setAttribute("name", 'sub-category-' + category_index + isPrice + '[]');
				});

				// Adds a sub category index number to each food item.
				[].filter.call(new_names, function(d){
					return d.parentNode === food_items_div;
				}).forEach(function(d, i){

					var isPrice = i % 2 === 0 ? '' : '-price';
					d.setAttribute("name", 'sub-category-' + category_index + '-food-item-'  + sub_category_index + isPrice + '[]');
				});

				// Adds a sub category index number to the descriptions.
				food_items_div.querySelector('textarea')
					.setAttribute("name", 'sub-category-' + category_index + '-food-item-' + sub_category_index + '-description' + '[]');

		break;

		// Adds a sub category to the current category.
		case "sub_category":

			// Creates the new sub category.
			new_input.innerHTML = food_menu.sub_category;

			// Creates a single food item.
			var food_items_div = new_input.getElementsByClassName('food_items')[0];
			food_items_div.innerHTML = food_menu.food_items;

			// Appends the new div to the sub-category class.
			new_input.className = "sub_category";
			parent_div.parentNode.appendChild(new_input);

			// Filters the results and adds the appropriate name value to all sub category elements.
			var new_names = food_items_div.parentNode.querySelectorAll('input[type=text]'),
				category_index = removeBrackets( parent_div.querySelector('input[type=text]').getAttribute('name') ),
				sub_category_index = parent_div.parentElement.getElementsByClassName('sub_category').length;

				// Uses the newly created div to filter for sub categories. 
				[].filter.call(new_names, function(d){
					return d.parentNode === new_input;
				}).forEach(function(d, i){

					var isPrice = i % 2 === 0 ? '' : '-price';
					d.setAttribute("name", category_index + isPrice + '[]');
				});

				// Adds a sub category index number to each food item.
				[].filter.call(new_names, function(d){
					return d.parentNode === food_items_div;
				}).forEach(function(d, i){

					var isPrice = i % 2 === 0 ? '' : '-price';
					d.setAttribute("name", category_index + '-food-item-' + sub_category_index + isPrice + '[]');
				});

				// Adds a sub category index number to the descriptions.
				food_items_div.querySelector('textarea')
					.setAttribute("name", category_index + '-food-item-' + sub_category_index + '-description' + '[]');

		break;

		// Adds a food item to the current sub category.
		case "food_items":

			// Creates the new food item section.
			new_input.innerHTML = food_menu.food_items;

			// Appends the food item to the list of food items.
			new_input.className = "food_items";
			parent_div.parentNode.appendChild(new_input);

			// Adds the sub category index from the first food items to all food items added after the fact.
			var new_names = new_input.querySelectorAll('input[type=text]'),
				sub_category_index = removeBrackets( new_input.previousSibling.querySelector('input[type=text]').getAttribute('name') );

				// Adds a sub category index number to each food item.
				[].forEach.call(new_names, function(d, i){

					var isPrice = i % 2 === 0 ? '' : '-price';
					d.setAttribute("name", sub_category_index + isPrice + '[]');
				});

				// Adds a sub category index number to the descriptions.
				new_input.querySelector('textarea')
					.setAttribute("name", sub_category_index + '[]');

		break;

		default:
			console.log('addInput(): ERROR.  parent_div does not match any case statements');
		break;
	}
};

var removeInput = function(div){
	div.parentNode.parentElement.removeChild(div.parentNode);
};

function removeBrackets(str){
	return str.replace( /\[\]/g, '');
}

