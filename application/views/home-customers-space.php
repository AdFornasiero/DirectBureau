<div class="container mx-auto px-4">
  <section class="my-8 font-sans container m-auto max-w-xl ">
    <div class="text-center">
      <h1 class="my-4 font-medium">Bienvenu <?= $this->session->userdata('gender') ?>, <?= $this->session->userdata('firstname') ?> </h1>
      <p class="leading-normal mb-4 max-w-sm m-auto">Voici votre tableau de bord en tant que client, vous pouvez depuis celui ci modifier votre compte, voir vos commandes ou demander de l'aide.</p>
    </div>

    <div class="flex flex-col sm:flex-row flex-wrap my-8">

      <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child">
        <div class="w-12 h-12 rounded-full" alt=""><svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#31af91" />
            <path d="M77.4 75.3c-2-.3-3.4-1.9-3.4-3.9v-5.8c2.1-2.3 3.5-5.3 3.8-8.7l.2-3.2c1.1-.6 2.2-2 2.7-3.8.7-2.5.1-4.7-1.5-4.9h-.7l.4-5.9c.7-8.2-5.6-15.1-13.6-15.1h-2.5c-8 0-14.3 6.9-13.8 15.1l.4 6c-.2-.1-.4-.1-.6-.1-1.6.2-2.2 2.4-1.5 4.9.5 1.9 1.7 3.3 2.8 3.9l.2 3.1c.2 3.4 1.6 6.4 3.7 8.7v5.8c0 2-1.4 3.6-3.4 3.9C41.8 76.8 27 83.2 27 90v14h74V90c0-6.8-14.8-13.2-23.6-14.7z" fill="#fff" /></svg></div>
        <a href="" class="mt-4 mb-1">Compte</a>
        <p class="mt-4 text-center text-gray-700 leading-normal hidden hover:block">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child">
        <div class="w-12 h-12 rounded-full" alt=""><svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#31af91" />
            <path d="M77.4 75.3c-2-.3-3.4-1.9-3.4-3.9v-5.8c2.1-2.3 3.5-5.3 3.8-8.7l.2-3.2c1.1-.6 2.2-2 2.7-3.8.7-2.5.1-4.7-1.5-4.9h-.7l.4-5.9c.7-8.2-5.6-15.1-13.6-15.1h-2.5c-8 0-14.3 6.9-13.8 15.1l.4 6c-.2-.1-.4-.1-.6-.1-1.6.2-2.2 2.4-1.5 4.9.5 1.9 1.7 3.3 2.8 3.9l.2 3.1c.2 3.4 1.6 6.4 3.7 8.7v5.8c0 2-1.4 3.6-3.4 3.9C41.8 76.8 27 83.2 27 90v14h74V90c0-6.8-14.8-13.2-23.6-14.7z" fill="#fff" /></svg></div>
        <a href="" class="mt-4 mb-1">Commandes</a>
        <p class="mt-4 text-center text-gray-700 leading-normal hidden hover:block">aeze ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child">
        <div class="w-12 h-12 rounded-full" alt=""><svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#31af91" />
            <path d="M77.4 75.3c-2-.3-3.4-1.9-3.4-3.9v-5.8c2.1-2.3 3.5-5.3 3.8-8.7l.2-3.2c1.1-.6 2.2-2 2.7-3.8.7-2.5.1-4.7-1.5-4.9h-.7l.4-5.9c.7-8.2-5.6-15.1-13.6-15.1h-2.5c-8 0-14.3 6.9-13.8 15.1l.4 6c-.2-.1-.4-.1-.6-.1-1.6.2-2.2 2.4-1.5 4.9.5 1.9 1.7 3.3 2.8 3.9l.2 3.1c.2 3.4 1.6 6.4 3.7 8.7v5.8c0 2-1.4 3.6-3.4 3.9C41.8 76.8 27 83.2 27 90v14h74V90c0-6.8-14.8-13.2-23.6-14.7z" fill="#fff" /></svg></div>
        <a href="<?= site_url('Customers/help') ?>" class="mt-4 mb-1">Aide</a>
        <p class="mt-4 text-center text-gray-700 leading-normal hidden hover:block">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>
      </div>


    </div>
  </section>