<?php

$referencePattern = '/^[\w \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]*$/'; // Lettres, chiffres, tirets ou underscore

$labelPattern = '/^[0-9A-Za-z.-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~² ]*$/'; // 2 à 24 chiffres ou lettres (+accents)(+tirets/underscores/espaces/points)

$globalPattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/'; // Lettres, mots, chiffres (max 1030)

$pricePattern = '/^[0-9]{0,6}((,|\.)[0-9]{1,2})?$/'; // Chiffres, éventuellement suivis de d'un point ou d'une virgule et 2 chiffres

$stockPattern = '/^[0-9]{1,9}$/'; // 0 à 10 chiffres uniquement

$everythingPattern = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';

$phonePattern = '/^[(0|\+33)[1-9]([-. ]?[0-9]{3}){3}$/';

$mailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';

$config = array(

	'Products/addForm' => array(

		// LABEL
		array(
			'field' => 'label',
			'label' => 'Libellé',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $labelPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrez le libellé',
				'max_length' => 'Le libellé et trop long (max. 256 caractères)',
				'regex_match' => 'Caractères non valides'
			)
		),

		// REFERENCE
		array(
			'field' => 'reference',
			'label' => 'Référence',
			'rules' => array(
				'required',
				'min_length[2]',
				'max_length[64]',
				'regex_match[' . $referencePattern . ']',
				'is_unique[products.reference]'
			),
			'errors' => array(
				'required' => 'Entrez la référence',
				'min_length' => 'La référence doit faire au moins 2 caractères',
				'max_length' => 'La référence doit faire plus de 64 caractères',
				'regex_match' => 'Caractères non valides',
				'is_unique' => 'La référence saisie est déjà attribuée à un produit'
			)
		),

		// PRICE
		array(
			'field' => 'price',
			'label' => 'Prix',
			'rules' => array(
				'required',
				'regex_match[' . $pricePattern . ']'
			),
			'errors' => array(
				'required' => 'Entrez le prix hors-taxes du produit',
				'regex_match' => 'Le prix n\'est pas correct'
			)

		)

	),

	//|-------------------------------------|//
    //|  CUSTOMERS FORM_VALIDATION SECTION  |//
	//|-------------------------------------|//

		'Customers/signUp' => array(
		// FIRSTNAME
		array(
			'field' => 'firstname',
			'label' => 'Prénom',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $everythingPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre prénom.',
				'regex_match' => 'Votre prénom comporte des erreurs'
			)
		),

		// LASTNAME
		array(
			'field' => 'lastname',
			'label' => 'Nom',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $everythingPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre nom.',
				'regex_match' => 'Votre nom comporte des erreurs'
			)
		),

		// COMPANY
		array(
			'field' => 'company',
			'label' => 'Société',
			'rules' => array(
				'max_length[256]',
				'regex_match[' . $everythingPattern . ']'
			),
			'errors' => array('regex_match' => 'Votre nom de société comporte des erreurs')
		),

		// PHONE
		array(
			'field' => 'phone',
			'label' => 'Téléphone',
			'rules' => array(
				'required',
				'max_length[15]',
				'regex_match[' . $phonePattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre numéro de téléphone.',
				'regex_match' => 'Votre numéro de téléphone comporte des erreurs'
			)
		),

		// FAX
		array(
			'field' => 'fax',
			'label' => 'Fax',
			'rules' => array(
				'max_length[30]',
				'regex_match[' . $phonePattern . ']'
			),
			'errors' => array('regex_match' => 'Votre numéro de fax comporte des erreurs')
		),

		// MAIL
		array(
			'field' => 'mail',
			'label' => 'Adresse mail',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $mailPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre adresse mail',
				'regex_match' => 'Votre adresse mail comporte des erreurs'
			)
		),

		// PASSWORD
		array(
			'field' => 'password',
			'label' => 'Mot de passe',
			'rules' => array(
				'required',
			),
			'errors' => array(
				'required' => 'Entrer votre mot de passe',
			)
		),

		// PASSWORD CONFIRM
		array(
			'field' => 'passwordConfirm',
			'label' => 'Confirmation du mot de passe',
			'rules' => array(
				'required',
				'matches[password]'
			),
			'errors' => array(
				'required' => 'Merci de confirmer votre mot de passe',
				'matches' => 'Votre mot de passe n\'est pas identique'
			)
		)
	),

	'Customers/logIn' => array(
		// MAIL
		array(
			'field' => 'mail',
			'label' => 'Adresse mail',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $mailPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre adresse mail',
				'regex_match' => 'Votre adresse mail comporte des erreurs'
			)
		),

		// PASSWORD
		array(
			'field' => 'password',
			'label' => 'Mot de passe',
			'rules' => array(
				'required',
			),
		),

	),

	'Customers/forgotPassword' => array(
		// MAIL
		array(
			'field' => 'mail',
			'label' => 'Adresse mail',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $mailPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre adresse mail',
				'regex_match' => 'Votre adresse mail comporte des erreurs'
			)
		),
	),

	'Customers/changePassword' => array(
		// PASSWORD
		array(
			'field' => 'password',
			'label' => 'Mot de passe',
			'rules' => array(
				'required',
			),
		),

		// PASSWORD CONFIRM
		array(
			'field' => 'passwordConfirm',
			'label' => 'Confirmation du mot de passe',
			'rules' => array(
				'required',
				'matches[password]'
			),
			'errors' => array(
				'required' => 'Merci de confirmer votre mot de passe',
				'matches' => 'Votre mot de passe n\'est pas identique'
			)
		)
	),

	'Customers/help' => array(
		// MAIL
		array(
			'field' => 'mail',
			'label' => 'Adresse mail',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $mailPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre adresse mail',
				'regex_match' => 'Votre adresse mail comporte des erreurs'
			)
		),

		// FIRSTNAME
		array(
			'field' => 'firstname',
			'label' => 'Prénom',
			'rules' => array(
				'required',
				'max_length[256]',
				'regex_match[' . $globalPattern . ']'
			),
			'errors' => array(
				'required' => 'Entrer votre prénom.',
				'regex_match' => 'Votre prénom comporte des erreurs'
			)
		),
	),










);
