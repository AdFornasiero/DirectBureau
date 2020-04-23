zone = document.getElementById('uploadDropzone');
fileInput = document.getElementById('imageUploader');


$('#uploadDropzone').click(function(e){
	if(e.target.nodeName == 'I'){
		$('#imagePreview').attr('src', '');
		$('#imageName').text('');
		$('#imageName').addClass('hidden');
		fileInput.value = "";
	}
	else{
		$('#imageUploader').trigger('click');
	}
})

$('#imageUploader').change(function(e){
	if(fileInput.files.length > 0){
		image = fileInput.files[0];
		if(image.type == 'image/jpeg' || image.type == 'image/gif' || image.type == 'image/png'){
			imageURL = window.URL.createObjectURL(image);
			$('#imagePreview').attr('src', imageURL);
			$('#imageName').removeClass('hidden');
			$('#imageName').append(image.name + '<i class="fas fa-times ml-2 text-gray-500"></i>');
		}
		else{
			alert('Format incorrect (autorisés: .png, .jpg, .gif)');
		}
	}
});


zone.ondragover = function(e){
	e.preventDefault();
	e.stopPropagation();
}

zone.ondragenter = function(e){
	e.preventDefault();
	e.stopPropagation();
}

zone.ondragleave = function(e){
	e.preventDefault();
	e.stopPropagation();
}

zone.ondrop = function(e){
	e.preventDefault();
	e.stopPropagation();
	
	if(e.dataTransfer.files.lenght != 0){
		file = e.dataTransfer.files[0];
		if(file.type == 'image/jpeg' || file.type == 'image/gif' || file.type == 'image/png'){
			fileInput.files = e.dataTransfer.files;
			imageURL = window.URL.createObjectURL(fileInput.files[0]);
			$('#imagePreview').attr('src', imageURL);
			$('#imageName').removeClass('hidden');
			$('#imageName').append(fileInput.files[0].name + '<i class="fas fa-times ml-2 text-gray-500"></i>');
		}
		else{
			alert('Format incorrect (autorisés: .png, .jpg, .gif)');
		}
	}
}