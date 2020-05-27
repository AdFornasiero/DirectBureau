var path = window.location.pathname.split('/');
var baseurl = window.location.protocol + '//' + window.location.host + '/' + path[1] + '/' + path[2] + '/';


	// Search for products
$("#searchFields #search").click(function(){

	if($.active == 0){
		text = $('#productSearchInput').val();
		available = $('#productAvailableInput').prop('checked');
		sort = $('#sortingInput option:selected').val();

		$('#loadingImg').removeClass('hidden');
		$.post({
			url: baseurl + "Products/productSearchQuery",
			data: {text:text, available:available, sort:sort},
			datatype: 'json',
			success: function(data){
				var products = JSON.parse(data);
				showResults(products);
				$('#loadingImg').addClass('hidden');
			},
			error: function(){
				console.log('error');
			}
		});
	}

});

	// Trigger a click on search button while 'Enter' pressed
$("#productSearchInput").keypress(function(e){
	if(e.originalEvent.key == "Enter")
		$("#searchFields #search").trigger('click');
});

	// Display products in table
function showResults(products){
	$('#productsTable tbody').empty();
	products.forEach(function(product){
		$('#exampleRow #id').text(product['ID']);
		$('#exampleRow #reference').text(product['reference']);
		$('#exampleRow #label').text(product['label']);
		$('#exampleRow #price').text(product['price']);
		$('#exampleRow .delete').attr('id', product['ID']);
		$('#exampleRow img').attr('src', product['image']);

		added = new Date(product['added']);
		updated = new Date(product['updated']);
		if (product['added'] === null)
			strAdded = '-';
		else
			strAdded = String(added.getDate()).padStart(2,'0') + '/' + String(added.getMonth()+1).padStart(2,'0') + '/' + added.getFullYear();
		if (product['updated'] === null)
			strUpdated = '-';
		else
			strUpdated = String(updated.getDate()).padStart(2,'0') + '/' + String(updated.getMonth()+1).padStart(2,'0') + '/' + updated.getFullYear();
		$('#exampleRow #added').text(strAdded);
		$('#exampleRow #updated').text(strUpdated);

		if(product['available'] == 1){
			$('#exampleRow #available i:last-child').addClass("hidden");
			$('#exampleRow #available i:first-child').removeClass("hidden");
		}
		else{
			$('#exampleRow #available i:first-child').addClass("hidden");
			$('#exampleRow #available i:last-child').removeClass("hidden");
		}

		$('#productsTable tbody').append($('#exampleRow').clone());

		$('#productsTable tbody tr').last().attr('id', product['ID']);
	});

	$('#productsTable tbody tr').removeClass('hidden');

	if(products.length != 0){
		$('#productsNumber').text(products.length + ' produits trouvés');
	}
	else{
		$('#productsNumber').text('Aucun produit trouvé');
	}
}

	//Delete a product
$('#productsTable').on('click', '.delete', function(e){
	if(window.confirm('Supprimer l\'article n°' + e.target.id + ' ?')){

		$.post({
			url: baseurl + "Products/deleteProduct",
			data: {id:e.target.id},
			success: function(data){
				if(data == 1)
					e.target.parentNode.parentNode.remove();
			},
			error: function(){
				console.log('error');
			}
		})

	}
});


	// Select a product to update him
$('#productsTable').on('click', 'tbody tr', function(e){
	if(!e.target.className.includes('delete')){
		if(e.target.nodeName == "IMG" || e.target.nodeName == "I")	
			id = e.target.parentNode.parentNode.firstElementChild.innerText;
		else
			id = e.target.parentNode.firstElementChild.innerText;
		window.location.href = baseurl + 'Products/updateForm/' + id;
	}
});