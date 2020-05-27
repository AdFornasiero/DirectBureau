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

	<div class="w-full sm:w-5/6 md:w-3/4 lg:w-2/3 mx-auto h-screen">
		<div class="marks-container">
			<div class="rounded-t-md text-xl p-3 border-l border-t border-r border-gray-600">
				Choisissez la marque
			</div>
			<div id="collapsible-marks" class="w-full h-full overflow-y-auto flex flex-wrap border-l border-r border-gray-600 justify-around" style="display: none;">
				<?php if(isset($marks)){
					foreach ($marks as $mark) { ?>
						<a class="w-1/3 sm:w-1/4 md:w-1/6 p-4 hover:text-indigo-700 hover:border-indigo-700 text-gray-800 font-medium rounded border-gray-400 text-center m-2 <?= (isset($selectedMark) && $selectedMark == $mark->mark) ? 'border-indigo-400 border-2' : 'border' ?>" href="<?= site_url('Products/searchPrinter/'.$mark->mark) ?>"><?= $mark->mark ?></a>
					<?php }
				} ?>
			</div>
			<div id="collapse-marks" class="w-full cursor-pointer rounded-b-md border-l border-b border-r border-gray-600 bg-gray-300 text-gray-600 text-center text-2xl">
				<i class="fas fa-chevron-down"></i>
				<i class="fas fa-chevron-up" style="display: none;"></i>
			</div>
		</div>

		<div class="models-container mt-4">
			<div class="rounded-t-md text-xl p-3 border-l border-t border-r border-gray-600">
				Choisissez la gamme
			</div>
			<div id="collapsible-models" class="w-full flex flex-wrap border-l border-r border-gray-600 justify-around" style="display: none;">
				<?php if(isset($models)){
					foreach ($models as $model) { ?>
						<a class="w-1/3 sm:w-1/4 md:w-1/6 p-4 hover:text-indigo-700 hover:border-indigo-700 text-gray-800 font-medium rounded border-gray-400 text-center m-2 <?= (isset($selectedModel) && $selectedModel == $model->model) ? 'border-indigo-400 border-2' : 'border' ?>" href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$model->model) ?>"><?= $model->model ?></a>
					<?php }
				} ?>
			</div>
			<div id="collapse-models" class="w-full cursor-pointer rounded-b-md border-l border-b border-r border-gray-600 bg-gray-300 text-gray-600 text-center text-2xl">
				<i class="fas fa-chevron-down"></i>
				<i class="fas fa-chevron-up" style="display: none;"></i>
			</div>
		</div>

		<div class="printers-container mt-4">
			<div class="rounded-t-md text-xl p-3 border-l border-t border-r border-gray-600">
				Choisissez le modèle
			</div>
			<div id="collapsible-printers" class="w-full flex flex-wrap border-l border-r border-gray-600 justify-around" style="display: none;">
				<?php if(isset($printers)){
					foreach ($printers as $printer) { ?>
						<a class="w-1/3 sm:w-1/4 md:w-1/6 p-4 hover:text-indigo-700 hover:border-indigo-700 text-gray-800 font-medium rounded border border-gray-400 text-center m-2" <?= (in_array($printer->printer, $emptyPrinters)) ? 'class="inactive" title="Aucune cartouche disponible"' : 'href="'.site_url('Products/searchPrinter/'.$selectedMark.'/'.$selectedModel.'/'.$printer->printer).'"' ?>><?= $printer->printer ?></a>
					<?php }
				} ?>
			</div>
			<div id="collapse-printers" class="w-full cursor-pointer rounded-b-md border-l border-b border-r border-gray-600 bg-gray-300 text-gray-600 text-center text-2xl">
				<i class="fas fa-chevron-down"></i>
				<i class="fas fa-chevron-up" style="display: none;"></i>
			</div>
		</div>
	</div>


</div>

<script type="text/javascript" src="<?= base_url('assets/js/collapsibleBrowser.js') ?>"></script>