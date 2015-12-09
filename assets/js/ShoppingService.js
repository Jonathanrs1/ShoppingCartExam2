var ShoppingService = {

	list: [],
	
	//Adicionar
	add: function(item, callback) {
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			url: 'api/shopping/',
			data: JSON.stringify(item),
			success: function(addedItem) {
				console.log('Item criado!');
				callback(addedItem);
			},
			error: function() {
				console.log('Erro ao adicionar item ' + item.name);
			}
		});
	},
	//Listar	
	getList: function(callback) {
		$.ajax({
			type: 'GET',
			url: 'api/shopping/',
			dataType: 'json',
			success: function(list) {
				callback(list);
			}
		});
	}
	
	//Remover
	remove: function(id, callback) {
		$.ajax({
			type: 'DELETE',
			url: 'api/shopping/' + id,
			success: function(response) {
				console.log('Item Deletado!');
				callback(true);
			},
			error: function(jqXHR) {
				console.log('Erro ao deletar item com o id ' + id);
				callback(false);
			}
		});
	},
}