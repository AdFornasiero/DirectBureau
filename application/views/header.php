<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title><?= 'Navigation' ?></title>

		<!-- NORMALIZE CDN -->
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
		<!-- TAILWIND CDN -->
		<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
		<!-- FONT AWESOME CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- CUSTOM CDN -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
		
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	</head>

	<body>
		<header>
			<nav class="flex justify-between w-full bg-teal-100 p-4 mb-4">
		        <div class="">DirectBureau v0.1</div>
		        <div class="flex">
	                <div class="mx-1"><a href="<?= site_url('Products/addForm') ?>" class="">addForm</a></div>
	                <div class="mx-1"><a href="<?= site_url('Products/showProducts') ?>" class="">showProducts</a></div>
	                <div class="mx-1"><a href="<?= site_url('Products/updateForm') ?>" class="">updateForm</a></div>
	                <div class="mx-1"><a href="<?= site_url('Products/searchPrinter') ?>" class="">searchPrinter</a></div>
	            </div>
			</nav>
		</header>