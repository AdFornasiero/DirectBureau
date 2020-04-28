<div class="w-full sm:w-5/6 md:w-3/4 lg:w-2/3 mx-auto max-h-screen">

	<h1 class="text-2xl mb-4">Tous les produits</h1>
	<div id="searchFields" class="w-full flex flex-wrap items-end justify-between shadow-lg rounded text-sm p-4 my-3">
		<div class="w-2/3 lg:w-1/3">
			<label class="block ml-2" for="productSearchInput">Rechercher</label>
			<input class="w-full shadow border border-gray-600 rounded px-1" type="text" id="productSearchInput" placeholder="ID, référence ou libellé" />
		</div>
		<div class="w-1/3 lg:w-1/3 pl-2">
			<label class="align-top" for="productAvailableInput">Afficher les produits indisponibles</label>
			<input name="available" id="productAvailableInput" class="w-4 h-4 shadow border rounded px-1" type="checkbox" checked/>
		</div>
		<div class="lg:w-1/3 text-right mt-2">
			<img id="loadingImg" class="hidden inline w-6" src="<?= base_url('assets/imgs/loading.gif') ?>">
			<input type="button" class="px-2 py-1 border rounded" id="search" value="Rechercher"/>
		</div>
	</div>

	<span id="productsNumber" class="text-xs italic"><?= count($products) ?> produits trouvés</span>
	<table id="productsTable" class="h-full overflow-y-scroll w-full border border-gray-600 shadow rounded text-sm">
		<thead class="w-full">
			<tr class="text-left w-full">
				<th class="px-1">ID</th>
				<th class="px-1">Image</th>
				<th class="px-1">Référence</th>
				<th class="px-1">Libellé</th>
				<th class="px-1">Prix</th>
				<th class="px-1">Disponible</th>
				<th class="px-1"></th>
			</tr>
		</thead>

		<tbody class="w-full">
			<?php foreach($products as $product){ ?>

				<tr class="border-t border-gray-400 hover:bg-gray-100 cursor-pointer">
					<td class="p-1"><?= $product->ID ?></td>
					<td class="p-1"><img class="h-12" src="<?= base_url('assets/imgs/noimg.jpg') ?>"/></td>
					<td class="p-1"><?= $product->reference ?></td>
					<td class="p-1"><?= $product->label ?></td>
					<td class="p-1"><?= $product->price ?></td>
					<td class="text-center p-1"><?= ($product->available) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' ?></td>
					<td class="p-1"><i id="<?= $product->ID ?>" class="fas fa-times text-red-800 delete"></i></td>
				</tr>

			<?php } ?>
		</tbody>
	</div>

</div>

<table>
<tr id="exampleRow" class="hidden border-t border-gray-400 hover:bg-gray-100 cursor-pointer">
	<td id="id" class="p-1"></td>
	<td id="img" class="p-1"><img class="h-12" src="<?= base_url('assets/imgs/noimg.jpg') ?>"/></td>
	<td id="reference" class="p-1"></td>
	<td id="label" class="p-1"></td>
	<td id="price" class="p-1"></td>
	<td id="available" class="text-center p-1"><i class="fas fa-check"></i><i class="fas fa-times"></i></td>
	<td class="text-center p-1"><i id="" class="fas fa-times text-red-800 delete"></i></td>
</tr>
</table>


<script src="<?= base_url('assets/js/tableManager.js') ?>"></script>