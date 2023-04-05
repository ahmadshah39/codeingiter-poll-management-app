<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.email2FATitle') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-9 h-9 mr-2" src="<?= base_url('/assets/images/poll.png')?>" alt="logo">
        Polls n Polls    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                <?= lang('Auth.email2FATitle') ?>
            </h1>
            <p class="text-white"><?= lang('Auth.confirmEmailAddress') ?></p>
            <?php if (session('error') !== null) : ?>
                <?= view('components/error') ?>
            <?php elseif (session('errors') !== null) : ?>
                <?= view('components/errors', ['message'=>"Ensure that these requirements are met:"]) ?>
            <?php endif ?>
            
            <?php if (session('message') !== null) : ?>
                <?= view('components/success') ?>
            <?php endif ?>

              <form class="space-y-4 md:space-y-6" action="<?= url_to('auth-action-handle') ?>" method="post">
              <?= csrf_field() ?>

                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email', $user->email) ?>" required>
                  </div>
                  <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?= lang('Auth.send') ?></button>
              </form>
          </div>
      </div>
  </div>
</section>

<?= $this->endSection() ?>
