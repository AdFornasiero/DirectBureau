<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Changement de mot de passe :</h1><br>
<?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" placeholder="Mot de passe" /><br>
    <input type="text" name="passwordConfirm" size="50" placeholder="Confirmation de mot de passe" /><br>
    <button type="submit">Modifier</button>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</body>
</html>