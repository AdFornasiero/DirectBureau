<div id="breadcrumb" class="w-full mb-2">
	<a href="<?= site_url('Products/searchPrinter/') ?>" class="mx-2 text-md text-indigo-700 font-medium">Toutes les marques</a>>
	<?php if(isset($mark)){ ?>
		<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$mark) ?>"><?= $mark ?></a>>
	<?php } 
	if(isset($model)){ ?>
		<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$mark.'/'.$model) ?>"><?= $model ?></a>>
	<?php }
	if(isset($printer)){ ?>
		<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/showProducts/'.$products[0]->printerID) ?>"><?= $printer ?></a>
	<?php } ?>
</div>

<div class="w-full sm:w-11/12 md:w-4/5 lg:w-3/4 mx-auto">

	<h1 class="text-2xl mb-4">Cartouches pour <?= $mark.' '.$printer ?></h1>

	<?php foreach($products as $product){ ?>
		<div class="flex flex-wrap items-center w-full border border-gray-500 bg-gray-100 rounded mb-2 p-2">

			<div class="w-full sm:w-1/3">
				<img src="<?= base_url("assets/imgs/noimg.jpg") ?>" class="mx-auto h-40 object-cover rounded-sm"/>
			</div>
			<div class="relative w-full sm:w-2/3 pl-2">
				<h2 class="block font-semibold"><?= $product->label ?></h2>
				<span class="block text-sm mt-2">Réf. constructeur: <?= $product->reference ?></span>
				<div class="block text-right">
					<span class="text-xl font-medium"><?= round($product->price*1.25, 2) ?> €
						<span class="text-xs align-top font-light"> TTC</span>
					</span>
					<span class="text-xs font-light"> <?= $product->price ?>€ HT</span>
				</div>
				<div class="flex justify-between">
					<div class="w-auto">
						<div id="addToCart" type="button" class="rounded border bg-orange-200 font-medium p-1"><i class="fas fa-cart-plus mr-2"></i><span class="overflow-hidden text-sm">Ajouter au panier</span></div>
					</div>
					<div class="w-auto">
						<?php if(!empty($product->colors)){ ?>
							<div class="flex-initial border border-gray-400 rounded pl-1">
								<h3 class="inline-block align-middle text-sm mr-2">Couleurs: </h3>
								<?php foreach ($product->colors as $color) { ?>
									<div class="inline-block w-8 h-8 rounded-lg border border-gray-400 align-middle <?= $color ?>"></div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>