<div class="container mx-auto px-4 mt-10">
    <!-- START : STATS -->
    <div id="wrapper" class="max-w-xl px-4 py-4 mb-10 mx-auto">
        <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                <div>
                    <div>
                        <p class="flex items-center justify-end text-green-500 text-md">
                            <span class="font-bold">6%</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path class="heroicon-ui" d="M20 15a1 1 0 002 0V7a1 1 0 00-1-1h-8a1 1 0 000 2h5.59L13 13.59l-3.3-3.3a1 1 0 00-1.4 0l-6 6a1 1 0 001.4 1.42L9 12.4l3.3 3.3a1 1 0 001.4 0L20 9.4V15z" /></svg>
                        </p>
                    </div>
                    <p class="text-3xl font-semibold text-center text-gray-800"><?= $numberCustomers ?></p>
                    <p class="text-lg text-center text-gray-500">Nombre de client</p>
                </div>
            </div>

            <div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                <div>
                    <div>
                        <p class="flex items-center justify-end text-red-500 text-md">
                            <span class="font-bold">6%</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path class="heroicon-ui" d="M20 9a1 1 0 012 0v8a1 1 0 01-1 1h-8a1 1 0 010-2h5.59L13 10.41l-3.3 3.3a1 1 0 01-1.4 0l-6-6a1 1 0 011.4-1.42L9 11.6l3.3-3.3a1 1 0 011.4 0l6.3 6.3V9z" /></svg>
                        </p>
                    </div>
                    <p class="text-3xl font-semibold text-center text-gray-800">43</p>
                    <p class="text-lg text-center text-gray-500">Nombre commande</p>
                </div>
            </div>

            <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                <div>
                    <div>
                        <p class="flex items-center justify-end text-gray-500 text-md">
                            <span class="font-bold">0%</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path class="heroicon-ui" d="M17 11a1 1 0 010 2H7a1 1 0 010-2h10z" /></svg>
                        </p>
                    </div>
                    <p class="text-3xl font-semibold text-center text-gray-800">43</p>
                    <p class="text-lg text-center text-gray-500">eaze</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END : STATS -->

    <!-- START : TABLE_CUSTOMERS -->
    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                List Customers
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table id="customersTable" class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">ID</th>
                        <th class="text-left p-3 px-5">Nom</th>
                        <th class="text-left p-3 px-5">Prénom</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Date d'inscription</th>
                        <th class="text-left p-3 px-5">Dernière connexion</th>
                        <th></th>
                    </tr>

                    <?php foreach ($listCustomers as $dataCustomers) { ?>
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5"><span><?= $dataCustomers->id ?></span></td>
                            <td class="p-3 px-5"><span><?= $dataCustomers->firstname ?></td>
                            <td class="p-3 px-5"><span><?= $dataCustomers->lastname ?></td>
                            <td class="p-3 px-5"><span><?= $dataCustomers->email ?></td>
                            <td class="p-3 px-5"><span><?= $dataCustomers->signupdate ?></td>
                            <td class="p-3 px-5"><span><?= $dataCustomers->lastlog ?></td>
                            <td class="p-3 px-5 flex justify-end">
                                <button data-target="#<?= $dataCustomers->id ?>" class="mr-5 btn-edit modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Information</button>
                                <?php echo anchor("Customers/deleteCustomers/{$dataCustomers->id}", "Supprimer", ['class' => 'bg-transparent border border-gray-500 hover:border-red-500 text-gray-500 hover:text-red-500 font-bold py-2 px-4 rounded-full']); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END : TABLE_CUSTOMERS -->


    <!-- START : Modal-->
    <div id="#<?= $dataCustomers->id ?>" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Utilisateur n°<?= $dataCustomers->id ?></p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="flex flex-col pt-4">
                    <label for="fname" class="text-lg ml-2">Prénom</label>
                    <input disabled="disabled" type="text" id="fname" name="fname" value="<?= $dataCustomers->firstname ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="lname" class="text-lg ml-2">Nom</label>
                    <input disabled="disabled" type="text" id="lname" name="lname" value="<?= $dataCustomers->lastname ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="mail" class="text-lg ml-2">Adresse mail</label>
                    <input disabled="disabled" type="text" id="mail" name="mail" value="<?= $dataCustomers->email ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="phone" class="text-lg ml-2">Téléphone</label>
                    <input disabled="disabled" type="text" id="phone" name="phone" value="<?= $dataCustomers->phone ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="fax" class="text-lg ml-2">Fax</label>
                    <input disabled="disabled" type="text" id="fax" name="fax" value="<?= $dataCustomers->fax ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="signUp" class="text-lg ml-2">Inscription</label>
                    <input disabled="disabled" type="text" id="signUp" name="signUp" value="<?= $dataCustomers->signupdate ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col pt-4">
                    <label for="lastlog" class="text-lg ml-2">Dernière connexion</label>
                    <input disabled="disabled" type="text" id="fname" name="lastlog" value="<?= $dataCustomers->lastlog ?>" class="border rounded-full w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:border-blue-500">
                </div>
                <!--Footer-->
                <div class="flex justify-end mt-5 pt-2">
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Fermer</button>
                </div>
            </div>

        </div>
    </div>
    <!-- END : Modal-->
</div>

<script src="<?= base_url('assets/js/customers.js') ?>"></script>