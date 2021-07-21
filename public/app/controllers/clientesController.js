app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('clientesController', function ($scope, $http, API_URL) {

	//listar  clientes  
	$http({
		method: 'GET',
		url: API_URL + "clientes"
	}).then(function (response) {
		$scope.clientes = response.data.clientes;
		console.log(response);
	}, function (error) {
		console.log(error);
		alert('Ocorreu um erro!\n Por favor, contate o administrador da aplicação!');
	});


	$scope.searchDB = function(){

		if($scope.searchText.length >= 3){
			
			var parametro = API_URL + "clientes?search="+$scope.searchText;
			
		}else{
			var parametro = API_URL + "clientes";
		}

		$http({
			method: 'GET',
			url: parametro
		}).then(function (response) {
			$scope.clientes = response.data.clientes;
			console.log(response);
		}, function (error) {
			console.log(error);
			alert('Ocorreu um erro!\n Por favor, contate o administrador da aplicação!');
		});
	}



	//show modal form
	$scope.toggle = function (modalstate, id) {
		$scope.modalstate = modalstate;
		$scope.cliente = null;
		switch (modalstate) {
			case 'add':
				$scope.form_title = "Add Cliente";
				break;
			case 'edit':
				$scope.form_title = "Detalhes";
				$scope.id = id;
				$http.get(API_URL + 'clientes/' + id)
					.then(function (response) {
						console.log(response);
						$scope.cliente = response.data.cliente;
					});
				break;
			default:
				break;
		}
		console.log(id);
		$('#myModal').modal('show');
	}
	
	//salvar novo registro e atualizar registro existente
	$scope.salvar = function (modalstate, id) {
		var url = API_URL + "clientes";
		var method = "POST";
		//anexe o ID do cliente ao URL se o formulário estiver no modo de edição
		if (modalstate === 'edit') {
			url += "/" + id;
			method = "PUT";
		}
		$http({
			method: method,
			url: url,
			data: $.param($scope.cliente),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function (response) {
			console.log(response.data);
			if(response.data.error==true){
				alert(response.data.messages['email']);
			}else{
				location.reload();
			}
			//
		}), (function (error) {
			console.log(error);
			alert('Ocorreu um erro!\n Por favor, contate o administrador da aplicação!');
		});
	}
	//deletar registro
	$scope.confirmDelete = function (id) {
		var isConfirmDelete = confirm('Tem certeza que deseja deletar este registro?');
		if (isConfirmDelete) {
			$http({
				method: 'DELETE',
				url: API_URL + 'clientes/' + id
			}).then(function (response) {
				console.log(response);
				location.reload();
			}, function (error) {
				console.log(error);
				alert('Incapaz de deletar');
			});
		} else {
			return false;
		}
	}
});