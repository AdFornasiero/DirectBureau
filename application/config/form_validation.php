<?php

$referencePattern = '/^[\w \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]*$/'; // Lettres, chiffres, tirets ou underscore

$labelPattern = '/^[0-9A-Za-z.-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~² ]*$/'; // 2 à 24 chiffres ou lettres (+accents)(+tirets/underscores/espaces/points)

$globalPattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/'; // Lettres, mots, chiffres (max 1030)

$pricePattern = '/^[0-9]{0,6}((,|\.)[0-9]{1,2})?$/'; // Chiffres, éventuellement suivis de d'un point ou d'une virgule et 2 chiffres

$stockPattern = '/^[0-9]{1,9}$/'; // 0 à 10 chiffres uniquement

$loginPattern = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';

$namePattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ -_\']{1,64}$/';


$config = array(

	'Products/addForm' => array(

		// LABEL
		array(
				'field' => 'label',
				'label' => 'Libellé',
				'rules' => array('required',
								'max_length[256]',
								'regex_match['.$labelPattern.']'),
				'errors' => array('required' => 'Entrez le libellé',
								'max_length' => 'Le libellé et trop long (max. 256 caractères)',
								'regex_match' => 'Caractères non valides')
		),

		// REFERENCE
		array(
				'field' => 'reference',
				'label' => 'Référence',
				'rules' => array('required',
								'min_length[2]',
								'max_length[64]',
								'regex_match['.$referencePattern.']',
								'is_unique[products.reference]'),
				'errors' => array('required' => 'Entrez la référence',
								'min_length' => 'La référence doit faire au moins 2 caractères',
								'max_length' => 'La référence doit faire plus de 64 caractères',
								'regex_match' => 'Caractères non valides',
								'is_unique' => 'La référence saisie est déjà attribuée à un produit')
		),

	
		
		// PRICE
		array(
				'field' => 'price',
				'label' => 'Prix',
				'rules' => array('required',
								'regex_match['.$pricePattern.']'),
				'errors' => array('required' => 'Entrez le prix hors-taxes du produit',
								'regex_match' => 'Le prix n\'est pas correct')

		)

	)
);

?>