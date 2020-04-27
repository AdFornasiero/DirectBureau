<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<div class="w-full max-w-xs">
    
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mail">
                Adresse mail
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mail" type="text" placeholder="votreAdresse@gmail" name="mail" value="<?php echo set_value('mail'); ?>">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="***************" name="password" value="<?php echo set_value('password'); ?>">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Connexion
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="<?= site_url(); ?>/Customers/forgotPassword">
                Mot de passe oublier ?
            </a>
        </div>
    </form>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</div>

<div>
    <h1>Test récupération données utilisateur :</h1>
    <span>Prénom : <?= $this->session->userdata('firstname') ?></span><br>
    <span>Nom : <?= $this->session->userdata('lastname') ?> </span><br>
    <span>Civilité : <?= $this->session->userdata('gender') ?> </span><br>
    <span>Adresse mail : <?= $this->session->userdata('email') ?> </span><br>
    <span>Téléphone : <?= $this->session->userdata('phone') ?> </span><br>
    <span>Fax : <?= $this->session->userdata('fax') ?> </span><br>
    <a href="<?= site_url(); ?>/Customers/logOut">Déconnexion</a>
</div>

<?php var_dump($_SESSION) ?>


</body>

</html>