<div class="container mx-16">
	<h1 class="text-2xl">Cartouches disponibles pour <?= $mark.' '.$printer ?></h1>

	<div id="breadcrumb" class="w-full flex flex-wrap ml-4">
		<?php if(isset($mark)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$mark) ?>"><?= $mark ?></a>/
		<?php } 
		if(isset($model)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$model) ?>"><?= $model ?></a>/
		<?php }
		if(isset($printer)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$printer) ?>"><?= $printer ?></a>
		<?php } ?>
	</div>

	<?= var_dump($products) ?>
</div>