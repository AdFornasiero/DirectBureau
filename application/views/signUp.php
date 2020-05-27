<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">

<body class="bg-white font-family-karla h-screen">
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
                <p class="text-center text-3xl mb-10">Bienvenue</p>
                <?= form_open_multipart('', array('id' => 'form_signUp', 'class' => 'flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32')) ?>
                <!-- SECTION FIRSTNAME/LASTNAME -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastname">
                            Nom
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="lastname" type="text" placeholder="Nom" name="lastname" value="<?php echo set_value('lastname'); ?>">
                        <span class="text-red-700" id="error_lastname"><?= form_error('lastname') ?></span>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstname">
                            Prénom
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="firstname" type="text" placeholder="Prénom" name="firstname" value="<?php echo set_value('firstname'); ?>">
                        <span class="text-red-700" id="error_firstname"><?= form_error('firstname') ?></span>
                    </div>
                </div>
                <!-- SECTION INFORMATION : MAIL/GENDER/COMPANY/ -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="mail">
                            Adresse mail
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="mail" type="text" placeholder="votreAdresse@mail.com" name="mail" value="<?php echo set_value('mail'); ?>">
                        <span class="text-red-700" id="error_mail"><?= form_error('mail') ?></span>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mt-5 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
                            Civilité
                        </label>
                        <div class="relative">
                            <select class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="gender" name="gender">
                                <option value="Homme" <?php if (isset($_POST['gender'])) {
                                                            ($_POST['gender'] == 'Mr');
                                                            echo 'selected="selected"';
                                                        } ?>>Homme</option>
                                <option value="Femme" <?php if (isset($_POST['gender'])) {
                                                            ($_POST['gender'] == 'Mme');
                                                            echo 'selected="selected"';
                                                        } ?>>Femme</option>
                                <option value="Autre" <?php if (isset($_POST['gender'])) {
                                                            ($_POST['gender'] == 'Autre');
                                                            echo 'selected="selected"';
                                                        } ?>>Autre</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mt-5 mb-2" for="company">
                            Société
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="company" type="text" placeholder="Société" name="company" value="<?php echo set_value('company'); ?>">
                        <span class="text-red-700" id="error_company"><?= form_error('company') ?></span>
                    </div>
                </div>
                <!-- SECTION PHONE/FAX -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                            Téléphone
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="phone" type="text" placeholder="Téléphone" name="phone" value="<?php echo set_value('phone'); ?>">
                        <span class="text-red-700" id="error_phone"><?= form_error('phone') ?></span>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fax">
                            FAX
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="fax" type="text" placeholder="Fax" name="fax" value="<?php echo set_value('fax'); ?>">
                        <span class="text-red-700" id="error_fax"><?= form_error('fax') ?></span>
                    </div>
                </div>
                <!-- SECTION PASSWORD/CONFIRM PASSWORD -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                            Mot de passe
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="password" type="password" placeholder="******************" name="password" value="<?php echo set_value('password'); ?>">
                        <span class="text-red-700" id="error_password"><?= form_error('password') ?></span>
                    </div>
                    <div class="w-full px-3 mt-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="passwordConfirm">
                            Confirmation du mot de passe
                        </label>
                        <input class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500" id="passwordConfirm" type="password" placeholder="******************" name="passwordConfirm">
                        <span class="text-red-700" id="error_passwordConfirm"><?= form_error('passwordConfirm') ?></span>
                    </div>
                </div>

                <input id="submit" name="submit" type="submit" value="S'INSCRIRE" class="rounded-full bg-black text-white font-bold text-lg hover:bg-red-700 p-2 mt-8" />
                <span id="success_message" class="text-success"></span>
                <span id="error_message" class="text-success"></span>

                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Déja un inscrit ? <a href="<?= site_url(); ?>/Customers/logIn" class="underline font-semibold">Par ici.</a></p>
                </div>
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


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {

        $('#firstname').on('input', function() {
            var input = $(this);
            var firstname = input.val();
            if (firstname) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

        $('#lastname').on('input', function() {
            var input = $(this);
            var lastname = input.val();
            if (lastname) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

        $('#mail').on('input', function() {
            var input = $(this);
            var mail = input.val();
            if (mail) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

        $('#phone').on('input', function() {
            var input = $(this);
            var phone = input.val();
            if (phone) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

        $('#password').on('input', function() {
            var input = $(this);
            var password = input.val();
            if (password) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

        $('#passwordConfirm').on('input', function() {
            var input = $(this);
            var passwordConfirm = input.val();
            if (passwordConfirm) {
                input.removeClass("invalid").addClass("valid");
            } else {
                input.removeClass("valid").addClass("invalid");
            }
        });

    });
</script>