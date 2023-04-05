<nav class=" shadow dark:border  dark:bg-gray-800 dark:border-gray-700" x-data="{ openMobileMenu:false}">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8" src="<?= base_url('/assets/images/poll.png')?>" alt="Polls n polls">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <?php foreach($menus as $menu): ?>
                            <a
                                href="<?= base_url($menu['path'])?>"
                                class=" <?= current_url() == base_url($menu['path']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'?> rounded-md px-3 py-2 text-sm font-medium"
                                <?= current_url() == base_url($menu['path']) ? "aria-current='page'" : '' ?>
                            >
                                <?= $menu['name']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ openProfile:false}">
                        <div>
                            <button @click="openProfile = ! openProfile" type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-300 hover:bg-gray-700 hover:text-white rounded-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </button>
                        </div>
                        <div
                                x-show="openProfile"
                                @click.outside="openProfile = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="<?= base_url('/logout')?>" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="openMobileMenu = !openMobileMenu" type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg x-show="!openMobileMenu" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg x-show="openMobileMenu" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div
    x-show="openMobileMenu"
    class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <?php foreach($menus as $menu): ?>
                <a
                        href="<?= base_url($menu['path'])?>"
                        class=" <?= current_url() == base_url($menu['path']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'?> block rounded-md px-3 py-2 text-base font-medium"
                        <?= current_url() == base_url($menu['path']) ? "aria-current='page'" : '' ?>
                >
                    <?= $menu['name']; ?>
                </a>
            <?php endforeach; ?>
           </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="mt-3 space-y-1 px-2">
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
                <a href="<?= base_url('/logout')?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            </div>
        </div>
    </div>
</nav>
