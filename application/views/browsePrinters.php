<div id="printerBrowser" class="container mx-8">
	
	<div id="breadcrumb" class="w-full flex flex-wrap">
		<?php if(isset($selectedMark)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedMark) ?>"><?= $selectedMark ?></a>/
		<?php } 
		if(isset($selectedModel)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedModel) ?>"><?= $selectedModel ?></a>/
		<?php }
		if(isset($selectedPrinter)){ ?>
			<a class="mx-2 text-lg text-indigo-700 font-medium" href="<?= site_url('Products/searchPrinter/'.$selectedPrinter) ?>"><?= $selectedPrinter ?></a>
		<?php } ?>
	</div>
	<div class="flex m-4">
		<div class="mr-4">
			<h5 class="text-md pl-1 font-medium">Marque:</h5>
			<div class="flex flex-col flex-wrap text-sm">
			<?php if(isset($marks)){
				foreach ($marks as $mark) { ?>
					<div class="<?= (isset($selectedMark) && $selectedMark == $mark->mark) ? 'selected' : '' ?>"><a href="<?= site_url('Products/searchPrinter/'.$mark->mark) ?>"><?= $mark->mark ?></a></div>
				<?php
				}
			} ?>
			</div>
		</div>

		<div class="mr-4">
			<?php if(isset($models)){ ?>
				<h5 class="text-md pl-1 font-medium">Gamme:</h5>
				<div class="flex flex-col flex-wrap text-sm">
					<?php foreach ($models as $model) { ?>
						<div class="<?= (isset($selectedModel) && $selectedModel == $model->model) ? 'selected' : '' ?>"><a href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$model->model) ?>"><?= $model->model ?></a></div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<div class="">
			<?php if(isset($printers)){ ?>
				<h5 class="text-md pl-1 font-medium">Modèle:</h5>
				<div class="flex flex-col flex-wrap text-sm">
					<?php foreach ($printers as $printer) { ?>
						<div class=""><a href="<?= site_url('Products/searchPrinter/'.$selectedMark.'/'.$selectedModel.'/'.$printer->printer) ?>"><?= $printer->printer ?></a></div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>


</div>