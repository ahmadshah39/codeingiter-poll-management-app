<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.useMagicLink') ?> <?= $this->endSection() ?>

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
                <?= lang('Auth.useMagicLink') ?>
            </h1>
            <p class="text-white"><b><?= lang('Auth.checkYourEmail') ?></b></p>
            <p class="text-white"><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
            
          </div>
      </div>
  </div>
</section>

<?= $this->endSection() ?>
