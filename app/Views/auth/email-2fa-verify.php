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
                <?= lang('Auth.emailEnterCode') ?>
            </h1>

            <p class="text-gray-900 dark:text-white"><?= lang('Auth.emailConfirmCode') ?></p>

            <?php if (session('error') !== null) : ?>
                <?= view('components/error') ?>
            <?php elseif (session('errors') !== null) : ?>
                <?= view('components/errors', ['message'=>"Ensure that these requirements are met:"]) ?>
            <?php endif ?>
            
            <?php if (session('message') !== null) : ?>
                <?= view('components/success') ?>
            <?php endif ?>

              <form class="space-y-4 md:space-y-6" x-data="otpForm()" action="<?= url_to('auth-action-verify') ?>" method="post">
                <?= csrf_field() ?>
                  
          <div class="flex flex-col space-y-16">
            <div class="flex flex-row items-center justify-between w-full">
              <template x-for="i in length" :key="index">
                <div class="w-14 h-14">
                  <input 
                    class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700 placeholder:text-gray-100" 
                    type="text" 
                    :name="'pin'+i" 
                    maxlength="1"
                    @paste="paste(event)"
                    @keydown="type(event,i)"
                    :value="input[i-1]!=null?input[i-1]:0" 
                    :x-ref="'pin'+i" placeholder="0"
                    :disabled="input.length < i-1"
                    :autofocus="i==1"
                    />
                  </div>
                </template>
                <input type="hidden" name="token" x-model="value">
              </div>
            </div>
                <button type="submit" :disabled="!isValid" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?= lang('Auth.confirm') ?></button>
              </form>



          </div>
      </div>
  </div>
</section>


<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script>
function otpForm() {
    return {
        length: 6,
        value: "",
        input: [],
        isValid:false,

        type(event, index) {
          if (event.ctrlKey && event.key == 'v') {
            console.log('ctrl-v');
          } else if (event.keyCode == 8) {
            event.stopPropagation();
            event.preventDefault();
            this.input[index - 1] = 0;
          } else {
            // only allow numbers
            let key = event.key.replace(/\D/g, "");
            if (key != "") {
              console.log(key);
              this.input[index - 1] = key;
            }
          }
          this.value = this.input.join("");

          if(this.input.length === 6){
            this.isValid = true;
          }

          this.$nextTick(() => {
            this.goto(index + 1);
          });
        },

        paste(event) {
        // raw pasted input
        let pasted = event.clipboardData.getData("text");
        // only get numbers
        pasted = pasted.replace(/\D/g, "");
        // don't get more than the PIN length
        pasted = pasted.substring(0, this.length);
        // if after all that sanitazation the string is not empty
        if (pasted) {
          // split the pasted string into an array and load it
          this.input = pasted.split("");
          this.value = pasted;
          
          if(this.input.length === 6){
            this.isValid = true;
          }
          
        }
      },

        goto(n) {
          if (!n || n > this.length) {
            n = 1;
          }
          let el = document.querySelector(`input[name=pin${n}]`);
          el.focus();
        },

  };
}
</script>
<?= $this->endSection() ?>