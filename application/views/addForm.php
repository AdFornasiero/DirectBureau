<div class="w-full sm:w-5/6 md:w-3/4 lg:w-2/3 mx-auto">

	<h1 class="text-2xl mb-4">Ajouter un produit</h1>
	
	<?= form_open_multipart('', array('class'=>'w-full flex flex-wrap justify-center border shadow bg-gray-100 rounded py-4')) ?>
		<div class="w-3/4 mb-4">
			<label for="reference" class="ml-2">Référence</label>
			<input name="reference" id="reference" class="w-full shadow border rounded px-1" type="text" value="<?= set_value('reference') ?>"/>
			<?= form_error('reference', '<span id="labelError" class="text-sm italic text-red-700 ml-2">','</span>') ?>
		</div>
		<div class="w-3/4 mb-4">
			<label for="label" class="ml-2">Libellé</label>
			<input name="label" id="label" class="w-full shadow border rounded px-1" type="text" value="<?= set_value('label') ?>"/>
			<?= form_error('label', '<span id="labelError" class="text-sm italic text-red-700 ml-2">','</span>') ?>
		</div>
		<div class="flex flex-wrap items-end w-3/4 mb-4">
			<div class="w-full sm:w-1/2">
				<label for="price" class="ml-2">Prix <span class="italic text-xs text-gray-600 ml-1">H.T.</span></label>
				<input name="price" id="price" class="w-full shadow border rounded px-1" type="text" value="<?= set_value('price') ?>"/>
				<?= form_error('price', '<span id="labelError" class="text-sm italic text-red-700 ml-2">','</span>')?>
			</div>
			<div class="w-full sm:w-1/2 text-right mt-2">
				<label class="mr-2">En vente</label>
				<input name="available" class="w-4 h-4 shadow border rounded px-1" type="checkbox" <?= (!isset($_POST['available'])&&isset($_POST)) ? '' : 'checked' ?>/>
			</div>
		</div>
		<div class="w-3/4 mb-4">
			<label class="ml-2">Imprimantes compatibles</label>
			<input id="printerSelector" class="w-full shadow border rounded px-1 mb-2" id="printerInput" type="text" placeholder="Rechercher" />
			<div id="dynamicDropdown" class="overflow-y-scroll hidden bg-white border shadow h-auto">
			</div>
			<div id="selectedContainer" class="w-full">
					
			</div>
			<?= form_input(array('type'=>'hidden','name'=>'printers','value'=>'','id'=>'printersField')) ?>	
			<span id="modelsPreview" class="hidden text-sm text-red-700"></span>
		</div>
		<div class="w-3/4 mb-4">
			<label class="ml-2">Image<span class="italic text-xs text-gray-600 ml-2">.png .jpg .gif</span></label>
			<?= form_upload('image', 'image', array('id' => 'imageUploader', 'class' => 'hidden')) ?>
			<div id="uploadDropzone" class="w-wull h-32 cursor-pointer bg-white border rounded-sm">
				<img id="imagePreview" class="object-contain h-32 mx-auto p-1" src="<?= base_url('assets/imgs/uploadImage.png') ?>"/>
				<span id="imageName" class="hidden text-sm text-center pb-1"></span>
			</div>
		</div>
		<div class="w-3/4 text-right">
			<?= form_submit('', "Ajouter", array('class'=>'shadow border rounded px-2 bg-white')) ?>
		</div>
	<?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/printersPreview.js') ?>"></script>
<script src="<?= base_url('assets/js/imageUpload.js') ?>"></script>