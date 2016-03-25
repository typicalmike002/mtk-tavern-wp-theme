
// This file requires a 'menu_object' json object created by 'admin_templates/templates/stage-setup.php'

var test = JSON.stringify( stage_setup_object.stage_setup_items );
console.log(test);

var html = {
	
	form: 		
		'<form method="POST" id="stage_setup_object">'
		+	'<div id="stage_setup_container" class="stage_setup_container">'
		+ 		'<input type="button" value="Add Image" id="add_file" onClick="addInput(this);">'
		+	'</div>'
	+	'</form>',

	file:
		'<input type="file" name="files[]" class="fileInputDiv">'
}

window.onload = function() {

	// By default, hook the wrapper content into the outer container.
	var main_div = document.getElementById('stage_setup_form');
	main_div.innerHTML = html.form;

	var files_obj = stage_setup_object.stage_setup_items;

	// Below, output the currently loaded pdfs.
	if ( files_obj ) {
		
		var add_pdf = document.getElementById('add_file');

		for ( var key in files_obj ) {
			if ( !files_obj.hasOwnProperty(key) ) { continue; }

			addInput( add_pdf );
			document.getElementsByClassName('inputStageSetup')[key].innerHTML = '<p><label>Note: This image will be removed from the page if you use Add Image and then Update the page.</label>'
				+ '<a href="' + files_obj[key].url + '" target="_blank">' + files_obj[key].url + '</a></p>';

		}
	}

}

var addInput = function(div) {

	var new_input = document.createElement('div'),
		parent_div = div.parentElement;

	new_input.innerHTML = html.file;
	new_input.className += "inputStageSetup";

	// Appends the new Div to before the add-category button.
	var add_pdf = document.getElementById('add_file');
	parent_div.insertBefore(new_input, add_pdf);
}