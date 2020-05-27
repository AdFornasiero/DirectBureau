<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<div class="w-full flex flex-wrap">
    <!-- SignUp SECTION -->
    <div class="w-full md:w-1/2 flex flex-col">
        <div class="mt-4 ml-2 flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" /></svg>
            <a href="<?= site_url('Home/index') ?>" class="ml-2 leading-tight font-semibold">ACCUEIL</a>
        </div>
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">N'hésiter pas à nous contacter en cas de besoin.</p>
            <p class="text-center text-1xl">Via notre formulaire ou : adresse@gmail.com</p>
            <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill">
                <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2570.059607240453!2d2.2852461158811597!3d49.89768423491964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e784140d751f75%3A0xd2fea262f4d81b2!2sDirect%20Bureau!5e0!3m2!1sfr!2sfr!4v1589633755755!5m2!1sfr!2sfr" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <?php echo validation_errors(); ?>
            <?= form_open_multipart('', array('class' => 'flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32')) ?>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">Prénom</label>
                    <input id="firstname" name="firstname" value="<?= set_value('firstname'); ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">Nom</label>
                    <input id="lastname" name="lastname" value="<?= set_value('lastname'); ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Adresse mail</label>
                    <input id="mail" name="mail" value="<?= set_value('mail'); ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
            </div>
            <select class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" name="subject" value="<?php if (isset($_POST['subject'])) {
                                                                                                                                                                        echo $_POST['subject'];
                                                                                                                                                                    } ?>">
                <option value="" disabled="" selected="">--Merci de faire votre choix :--</option>
                <option value="Information pratique" <?php if (isset($_POST['subject'])) {
                                                            ($_POST['subject'] == 'Information pratique');
                                                            echo 'selected="selected"';
                                                        } ?>>Information pratique</option>
                <option value="Livraison" <?php if (isset($_POST['subject'])) {
                                                ($_POST['subject'] == 'Livraison');
                                                echo 'selected="selected"';
                                            } ?>>Livraison</option>
                <option value="Remboursement" <?php if (isset($_POST['subject'])) {
                                                    ($_POST['subject'] == 'Remboursement');
                                                    echo 'selected="selected"';
                                                } ?>>Remboursement</option>
                <option value="Autre" <?php if (isset($_POST['subject'])) {
                                            ($_POST['subject'] == 'Autre');
                                            echo 'selected="selected"';
                                        } ?>>Autre</option>
            </select>
            <div class="flex flex-wrap -mx-3 mt-5 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Message</label>
                    <textarea id="message" name="message" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500"></textarea>
                </div>
            </div>
            <input type="submit" value="ENVOYER" class="rounded-full bg-black text-white font-bold text-lg hover:bg-red-700 p-2">

        </div>
        <?= form_close() ?>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen md:block" src="<?= base_url('assets/imgs/background/background-login.jpg') ?>" alt="" />
    </div>
</div>
</body>