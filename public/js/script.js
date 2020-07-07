var filter_new = document.getElementById('filter-new');
if(filter_new)
	filter_new.addEventListener('submit', function () {
		var allInputs = filter_new.getElementsByTagName('input');
		
		for (var i = 0; i < allInputs.length; i++) {
			var input = allInputs[i];

			if (input.name && !input.value) {
				input.name = '';
			}
		}
		var selects = filter_new.getElementsByTagName('select');
		
		for (var i = 0; i < selects.length; i++) {
			var e = selects[i];
			if (!e.selectedIndex) {
				e.name = '';
			}
		}
		return false;
	});
	var filter_used = document.getElementById('filter-used');
if(filter_used)
	filter_new.addEventListener('submit', function () {
		var allInputs = filter_new.getElementsByTagName('input');
		
		for (var i = 0; i < allInputs.length; i++) {
			var input = allInputs[i];

			if (input.name && !input.value) {
				input.name = '';
			}
		}
		var selects = filter_new.getElementsByTagName('select');
		
		for (var i = 0; i < selects.length; i++) {
			var e = selects[i];
			if (!e.selectedIndex) {
				e.name = '';
			}
		}
		return false;
	});
	var filter_recondition = document.getElementById('filter-recondition');
if(filter_recondition)
	filter_new.addEventListener('submit', function () {
		var allInputs = filter_new.getElementsByTagName('input');
		
		for (var i = 0; i < allInputs.length; i++) {
			var input = allInputs[i];

			if (input.name && !input.value) {
				input.name = '';
			}
		}
		var selects = filter_new.getElementsByTagName('select');
		
		for (var i = 0; i < selects.length; i++) {
			var e = selects[i];
			if (!e.selectedIndex) {
				e.name = '';
			}
		}
		return false;
	});
function setDropdown(e, id) {
	document.getElementById(id).selectedIndex = e.selectedIndex;
}