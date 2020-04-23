<div class="w-full mx-4">
	<div id="breadcrumb" class="w-full mb-4">
		<a href="<?= site_url('Products/searchPrinter/') ?>" class="mx-2 text-md text-indigo-700 font-medium">Toutes les marques</a>>
		<?php if(isset($selectedMark)){ ?>
			<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedMark) ?>"><?= $selectedMark ?></a>>
		<?php } 
		if(isset($selectedModel)){ ?>
			<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$selectedModel) ?>"><?= $selectedModel ?></a>>
		<?php }
		if(isset($selectedPrinter)){ ?>
			<a class="mx-2 text-md text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$selectedModel) ?>"><?= $selectedPrinter ?></a>
		<?php } ?>
	</div>
	<h1 class="text-2xl mb-4"><?= $header ?></h1>


	<div class="flex flex-wrap w-full sm:w-11/12 md:w-4/5 lg:w-3/4 mx-auto">
		<div class="flex w-full md:w-2/4 md:ml-auto flex-col flex-wrap max-h-screen text-sm">
			<?php if(isset($marks)){
				foreach ($marks as $mark) { ?>
					<a class="<?= (isset($selectedMark) && $selectedMark == $mark->mark) ? 'selected' : '' ?> hover:underline hover:text-indigo-700 font-sans text-gray-800 font-medium" href="<?= site_url('Products/searchPrinter/'.$mark->mark) ?>"><?= $mark->mark ?></a>
				<?php }
			} ?>
		</div>

		<div class="w-1/2 md:w-1/4 ml-auto flex flex-col flex-wrap text-sm">
			<?php if(isset($models)){ ?>
					<?php foreach ($models as $model) { ?>
						<div class="<?= (isset($selectedModel) && $selectedModel == $model->model) ? 'selected' : '' ?>"><a href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$model->model) ?>"><?= $model->model ?></a></div>
					<?php } ?>
			<?php } ?>
		</div>

		<div class="w-1/2 md:w-1/4 mr-auto flex flex-col flex-wrap text-sm">
			<?php if(isset($printers)){ ?>
				<?php foreach ($printers as $printer) { ?>
					<a <?= (in_array($printer->printer, $emptyPrinters)) ? 'class="inactive" title="Aucune cartouche disponible"' : 'href="'.site_url('Products/searchPrinter/'.$selectedMark.'/'.$selectedModel.'/'.$printer->printer).'"' ?>><?= $printer->printer ?></a>
				<?php }
			}?>
		</div>
	</div>


</div>