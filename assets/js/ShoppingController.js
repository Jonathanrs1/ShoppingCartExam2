var ShoppingController = {
	
	init: function () {
		ShoppingController.setForm();
		ShoppingController.showList();
	},
	
	setForm: function () {
		var form = document.querySelector('form');
		form.addEventListener('submit', function(event) {
			ShoppingController.addItem(form);
	
			event.preventDefault();
		});
		ShoppingController.setFocus();
	},
	
	setFocus: function() {
		var inputDescription = document.getElementById('description');
		inputDescription.focus();
	},
	
	clearForm: function() {
		var form = document.querySelector('form');
		form.reset();
		ShoppingController.setFocus();
	},
	
	addItem: function(form) {
		var item = {
			description: form.description.value,
			qty: form.qty.value,
			price: form.price.value
		};
		ShoppingService.add(item, function(addedItem) {
			ShoppingController.addToHTML(addedItem);
			ShoppingController.clearForm();
		});
	},
	
	showList: function () {
		ShoppingService.getList(function(list) {
			list.forEach(function(item) {
				ShoppingController.addToHTML(item);
			});	
		});
	},
};


//init
ShoppingController.init();
