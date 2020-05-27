<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<div class="w-full flex flex-wrap">
    <!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col mb-20">
    <div class="mt-4 ml-2 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" /></svg>
                <a href="<?= site_url('Home/index') ?>" class="ml-2 leading-tight font-semibold">ACCUEIL</a>
            </div>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo $this->session->flashdata('verify_msg'); ?>
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">Récupération de mot de passe.</p>
            <?php echo validation_errors(); ?>
            <?= form_open_multipart('', array('class' => 'flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32')) ?>
            <div class="flex flex-col pt-4">
                <label for="email" class="text-lg">Adresse mail</label>
                <input type="email" id="mail" name="mail" placeholder="mail@gmail.com" value="<?php echo set_value('mail'); ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
            </div>
            <input type="submit" value="Récupérer" class="rounded-full bg-black text-white font-bold text-lg hover:bg-red-700 p-2 mt-8">
            <?php form_close() ?>
        </div>
    </div>
    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen md:block" src="<?= base_url('assets/imgs/background/background-login.jpg') ?>" alt="" />
    </div>
</div>