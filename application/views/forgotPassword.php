<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Test de récupération de mot de passe :</h1><br>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <input type="text" name="mail" value="<?php echo set_value('mail'); ?>" size="50" placeholder="Adresse mail" /><br>
    <button type="submit">Récupérer</button>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</body>
</html>