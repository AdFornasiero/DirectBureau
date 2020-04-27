<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=z, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>

<h1>Test formulaire de contact</h1>

<?php echo validation_errors(); ?>
    <?php echo $this->session->flashdata('verify_msg'); ?>
    <?php echo form_open(); ?>
        <div>
            <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" size="50" placeholder="Prénom" /><br>
            <input type="text" name="lastname" value="<?= set_value('lastname'); ?>" size="50" placeholder="Nom" /><br>
            <input type="text" name="phone" value="<?= set_value('phone'); ?>" size="50" placeholder="Téléphone" /><br>
            <input type="text" name="mail" value="<?= set_value('mail'); ?>" size="50" placeholder="Adresse mail" /><br>                                          
            <select name="subject" value="<?php if(isset($_POST['subject'])) { echo $_POST['subject'];} ?>">
                <option value="" disabled="" selected="">--Merci de faire votre choix :--</option>
                <option value="Information pratique" <?php if(isset($_POST['subject'])){ ($_POST['subject'] == 'Information pratique'); echo 'selected="selected"';}?>>Information pratique</option>
                <option value="Livraison" <?php if(isset($_POST['subject'])){ ($_POST['subject'] == 'Livraison'); echo 'selected="selected"';}?>>Livraison</option>
                <option value="Remboursement" <?php if(isset($_POST['subject'])){ ($_POST['subject'] == 'Remboursement'); echo 'selected="selected"';}?>>Remboursement</option>
                <option value="Autre" <?php if(isset($_POST['subject'])){ ($_POST['subject'] == 'Autre'); echo 'selected="selected"';}?>>Autre</option>
            </select><br>
            <textarea type="text" rows="4" name="message" placeholder="Message" value="<?php if (isset($_POST['message'])) { echo $_POST['message'];} ?>"></textarea><br>
        <button type="submit">Envoyer</button>
    </form>
<?php echo $this->session->flashdata('msg'); ?>
    
</body>
</html>

