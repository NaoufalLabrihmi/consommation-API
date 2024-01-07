<?php require APPROOT . '\views\include\header.php'; ?>
<!-- component -->
<html x-data="data()" lang="en">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="flex h-screen bg-red-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-red-800 md:block">
        <div>
            <div class="text-black">
                <div class="flex p-2  bg-red-800">
                <div class="flex py-3 px-2 items-center">
    <?php if (isset($_SESSION['name'])): ?>
        <p class="text-2xl text-red-500 font-semibold uppercase"><?php echo substr($_SESSION['name'], 0, 2); ?></p>
        <p class="ml-2 font-semibold italic">DASHBOARD</p>
    <?php else: ?>
        <!-- Handle the case when 'name' is not set in the session -->
        <p class="ml-2 font-semibold italic">DASHBOARD</p>
    <?php endif; ?>
</div>
                </div>
                <div>
                    <ul class="mt-6 leading-10">
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-black transition-colors duration-150 cursor-pointer hover:text-red-500" href=" #">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-4">DASHBOARD</span>
                            </a>
                        </li>
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-black transition-colors duration-150 cursor-pointer hover:text-red-500" href=" #">

                                <!-- <button class="ml-4" id="generate-pdf">Generate PDF</button> -->
                                <button onclick="generatePDF()">Generate PDF</button>

                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-red bg-opacity-50 sm:items-center sm:justify-center"></div>

    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-red-900 dark:bg-red-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
        <div>
            <div class="text-black">
                <div class="flex p-2  bg-red-800">
                    <div class="flex py-3 px-2 items-center">
                        <p class="text-2xl text-red-500 font-semibold">SA</p>
                        <p class="ml-2 font-semibold italic">
                            DASHBOARD</p>
                    </div>
                </div>
                <div>
                    <ul class="mt-6 leading-10">
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-black transition-colors duration-150 cursor-pointer hover:text-red-500" href=" #">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-4">DASHBOARD</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <div class="flex flex-col flex-1 w-full overflow-y-auto">
        <header class="z-40 py-4  bg-red-800  ">
            <div class="flex items-center justify-between h-8 px-6 mx-auto">
                <!-- Mobile hamburger -->
                <div>
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <x-heroicon-o-menu class="w-6 h-6 text-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-between list-none ">
                    <ul class="flex   flex-shrink-0 space-x-6 ">
                        <!-- Notifications menu -->
                        <!--||||||||||||||||||||-->
                        <!--||||||||||||||||||||-->
                        <!-- ------------------ -->
                        

                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-red-400 align-middle rounded-full hover:text-black hover:bg-red-400 focus:outline-none " @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-red-400 border border-red-500 rounded-md shadow-md" aria-label="submenu">
                                    
                                    <li class="flex">
                                        <a class="text-black inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800" href="<?= URLROOT ?>/authentication/logout">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>


            </div>
        </header>
        <main id="main">
            <div class=" mb-4 pb-10 px-8 mx-4 rounded-3xl bg-red-100 border-4 border-red-400">

                <div class="grid grid-cols-12 gap-6">
                    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                        <div class="col-span-12 mt-8">
                            <div class="flex items-center h-10 intro-y">
                                <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>

                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>

                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div id='postsTotal' class="mt-3 text-3xl font-bold leading-8"></div>

                                                <div class="mt-1 text-base text-gray-600">Total Number of posts</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>

                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div id="usersTotal" class="mt-3 text-3xl font-bold leading-8"></div>

                                                <div class="mt-1 text-base text-gray-600">users</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                            </svg>

                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

                                                <div class="mt-1 text-base text-gray-600">Item Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>

                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

                                                <div class="mt-1 text-base text-gray-600">Item Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 mt-5">
                            <div class="grid  grid-cols-1 ">
                                <div class="bg-white shadow-lg p-4">
                                    <canvas id="canvasChart"></canvas>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-5">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class="bg-white p-4 shadow-lg rounded-lg">
                            <div class="flex justify-between">

                                <h1 class="font-bold text-2xl">Posts</h1>
                                <button id="openModalBtn" class="flex items-center bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900  border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <p class="text-black">add new posts</p>
                                </button>
                            </div>
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="py-2 align-middle inline-block min-w-full">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">id</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">title</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">body</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">ACTION</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="post-table" class="bg-white divide-y divide-gray-200">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-6 flex justify-between">

                                    <h1 class="font-bold  text-2xl">Users</h1>
                                    <button id="openuserModalBtn" class="flex items-center bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900  border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md transition-colors duration-300">
                                        <svg class="w-4 h-4 mr-2 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <p class="text-black">add new User</p>
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto">
                                            <div class="shadow overflow-hidden mt-3 border-b border-gray-200 sm:rounded-lg bg-white">
                                                <table class="min-w-full mt-3 divide-y-2 divide-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">id</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Name</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">username</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">email</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-red-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">ACTION</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="user-table" class="bg-white divide-y divide-gray-200">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</main>
</div>
</div>
<div id="editModal" class="  float-left hidden fixed inset-0 z-10 overflow-hidden backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
    <div class="modal-container p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
        <h2 class="text-2xl font-semibold mb-6">update Project</h2>
        <form action="" class="project-form">
            <input type="hidden" name='userId' value="<?php echo $_SESSION["user_id"]; ?>">
            <div class="flex items-center justify-center p-12">
                <div id="newinp" class="mx-auto w-full max-w-[550px]">
                    <div class="mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Title
                                </label>
                                <input type="text" name="title" id="titleupdate" placeholder="Title" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="body" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Body
                                </label>
                                <textarea name="body" placeholder="Body" id="bodyupdate" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="editeid">
        </form>


        <div class="flex justify-end">
            <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md mr-2" onclick="edite()">Create</button>
            <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeediteModal()">Cancel</button>
        </div>
    </div>
</div>
<!-- -----------edit user------------- -->
<div id="editUserModal" class="  float-left hidden fixed inset-0 z-10 overflow-hidden backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
    <div class="modal-container p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
        <h2 class="text-2xl font-semibold mb-6">update user</h2>
        <form action="" class="project-form">
            <div class="flex items-center justify-center p-12">
                <div id="newinp" class="mx-auto w-full max-w-[550px]">
                    <div class="mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                    name
                                </label>
                                <input type="text" name="name" id="nameupdate" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                                username
                                </label>
                                <textarea name="username" placeholder="username" id="usernameupdate" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="editeUserid">
        </form>


        <div class="flex justify-end">
            <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md mr-2" onclick="editeUser()">Create</button>
            <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeUserEditeModal()">Cancel</button>
        </div>
    </div>
</div>
<!-- --------------------------- add post----------------------------------------------------------------- -->
<div id="myModal" class="hidden fixed inset-0 z-10 overflow-hidden backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
    <div class="modal-container p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
        <h2 class="text-2xl font-semibold mb-6">Create New Project</h2>
        <form action="" class="project-form">
            <input type="hidden" name='userId' value="<?php echo $_SESSION["user_id"]; ?>">
            <div class="flex items-center justify-center p-12">
                <div id="newinp" class="mx-auto w-full max-w-[550px]">
                    <div class="mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Title
                                </label>
                                <input type="text" name="title[]" placeholder="Title" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="body" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Body
                                </label>
                                <textarea name="body[]" placeholder="Body" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="flex justify-end">
            <button id="addNewPostBtn" class="bg-gradient-to-r from-blue-300 to-cyan-300 hover:from-blue-900 hover:to-cyan-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md ml-2">Add New Post</button>
            <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md mr-2" onclick="createProject()">Create</button>
            <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeModal()">Cancel</button>
        </div>
      </div>
     </div>
</div>
<script>
    function openModal() {
        $("#myModal").removeClass("hidden");
    }

    function closeModal() {
        $("#myModal").addClass("hidden");
    }

    function createProject() {
        var formData = $(".project-form").serializeArray();

        if (formData.length === 0) {
            alert("Please fill in at least one project.");
            return;
        }

        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(data) {
                alert('Projects created successfully. Response: ' + JSON.stringify(data));
                closeModal(); // Optionally close the modal after successful submission
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error creating projects: ' + errorThrown);
            }
        });
    }

    function addNewPost() {
        var newPostHtml = `
            <div class="mx-3">
                <div class="w-full px-3">
                    <div class="mb-5">
                        <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                            Title
                        </label>
                        <input type="text" name="title[]" placeholder="Title" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3">
                    <div class="mb-5">
                        <label for="body" class="mb-3 block text-base font-medium text-[#07074D]">
                            Body
                        </label>
                        <textarea name="body[]" placeholder="Body" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                    </div>
                </div>
            </div>
        `;

        $("#newinp").append(newPostHtml);
    }

    $("#openModalBtn").on("click", openModal);

    $("#addNewPostBtn").on("click", addNewPost);
</script>
<!-- ----------add new user----------- -->
<div id="userModal" class="hidden  fixed inset-0 z-10 overflow-hidden backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
    <div class="modal-container   p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
        <h2 class="text-2xl font-semibold mb-6">Create New user</h2>
        <form action="" class="user-form">
            <input type="hidden" name='userId' value="<?php echo $_SESSION["user_id"]; ?>">
            <div class="flex items-center justify-center p-12">
                <div id="newuserinp" class="mx-auto w-full max-w-[550px]">
                    <div class="mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                    name
                                </label>
                                <input type="text" name="name[]" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                                    username
                                </label>
                                <input type="text" username="username[]" placeholder="username" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                    email
                                </label>
                                <textarea name="email[]" placeholder="email" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="flex justify-end">
            <button id="addNewuserBtn" class="bg-gradient-to-r from-blue-300 to-cyan-300 hover:from-blue-900 hover:to-cyan-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md ml-2">Add New Post</button>
            <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-black font-semibold py-2 px-4 rounded-md mr-2" onclick="createUser()">Create</button>
            <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeuserModal()">Cancel</button>
        </div>
      </div>
     </div>
</div>
<script>
    function openuserModal() {
        $("#userModal").removeClass("hidden");
    }

    function closeuserModal() {
        $("#userModal").addClass("hidden");
    }

    function createUser() {
        var formData = $(".user-form").serializeArray();

        if (formData.length === 0) {
            alert("Please fill in at least one project.");
            return;
        }

        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/users',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(data) {
                alert('Projects created successfully. Response: ' + JSON.stringify(data));
                closeuserModal(); // Optionally close the modal after successful submission
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error creating projects: ' + errorThrown);
            }
        });
    }

    function addNewuser() {
        var newUserHtml = `
        <div class="mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                    name
                                </label>
                                <input type="text" name="name[]" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                                    username
                                </label>
                                <input type="text" username="username[]" placeholder="username" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                    email
                                </label>
                                <textarea name="email[]" placeholder="email" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
        `;

        $("#newuserinp").append(newUserHtml);
    }

    $("#openuserModalBtn").on("click", openuserModal);

    $("#addNewuserBtn").on("click", addNewuser);
</script>

<!-- -------------------------------------------------------------------------------------------- -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script src="<?php echo URLROOT ?>public/js/index.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            method: 'GET',
            data: {
                _limit: 5,
                _sort: 'id',
                _order: 'desc'
            },
            dataType: 'json',
            success: function(data) {
                // Handle the received data and populate the table
                $.each(data, function(index, post) {
                    var row = '<tr>' +
                        '<td>' + post.id + '</td>' +
                        '<td>' + post.title + '</td>' +
                        '<td>' + post.body + '</td>' +
                        `<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                            <div class="flex space-x-4">
                                <button class="text-blue-500 hover:text-blue-600" onclick="openEditModal('https://jsonplaceholder.typicode.com/posts/${post.id}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <p>Edit</p>
                                </button>
                                <button class="delete-link text-red-500 hover:text-red-600">
                                    <input type='hidden' value='https://jsonplaceholder.typicode.com/posts/${post.id}' class='inputDelete'>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 mr-1 ml-3"
                                        fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <p>Delete</p>
                                </button>
                            </div>
                        </td>` +
                        '</tr>';
                    $('#post-table').append(row);
                });
            },
            error: function(error) {
                console.log('Error fetching data: ', error);
            }
        });
    });

    function closeediteModal() {
        $("#editModal").addClass('hidden');
        console.log('Modal closed');
    }


    function openEditModal(editUrl) {
        // Open the modal

        $.ajax({
            url: editUrl,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#titleupdate').val(data.title);
                $('#bodyupdate').val(data.body);
                $('#editeid').val(data.id);

            },
            error: function(error) {
                console.log('Error fetching data: ', error);
            }
        })
        $('#editModal').removeClass('hidden');
    }

    function edite() {
        var id = $('#editeid').val();
        console.log(id);

        $.ajax({
            url: `https://jsonplaceholder.typicode.com/posts/${id}`,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                alert(' updated successfully');
                $('#editModal').addClass('hidden');
            },
            error: function(error) {
                alert(error);
            }
        })

    }
</script>

<Script>
    $(document).on('click', '.delete-link', function(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        var deleteUrl = $('.inputDelete', $(this).parent()).val();

        // Confirm with the user before sending the delete request
        if (confirm('Are you sure you want to delete this post?')) {
            $.ajax({
                url: deleteUrl,
                method: 'DELETE', // Adjust the HTTP method based on your API requirements
                success: function() {
                    $(event.target).closest('tr').remove();

                    // Show a success alert
                    alert('Post deleted successfully!');
                },
                error: function(error) {
                    console.log('Error deleting post: ', error);
                }
            });
        }
    });
</script>
<!-- user  -->
<script>
       $(document).ready(function() {

$.ajax({
    url: 'https://jsonplaceholder.typicode.com/users',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        // Handle the received data and populate the table
        $.each(data, function(index, user) {
            
            var row = '<tr>' +
                '<td>' + user.id + '</td>' +
                '<td>' + user.name + '</td>' +
                '<td>' + user.username + '</td>' +
                '<td>' + user.email + '</td>' +
                `<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                    <div class="flex space-x-4">
                        <button class="text-blue-500 hover:text-blue-600" onclick="openUserEditModal('https://jsonplaceholder.typicode.com/users/${user.id}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <p>Edit</p>
                        </button>
                        <button class="deleteuser-link text-red-500 hover:text-red-600">
                            <input type='hidden' value='https://jsonplaceholder.typicode.com/users/${user.id}' class='inputuserDelete'>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 mr-1 ml-3"
                                fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <p>Delete</p>
                        </button>
                    </div>
                </td>` +
                '</tr>';
            $('#user-table').append(row);
        });
    },
    error: function(error) {
        console.log('Error fetching users: ', error);
    }
});
});
function closeUserEditeModal() {
        $("#editUserModal").addClass('hidden');
        console.log('Modal closed');
    }


    function openUserEditModal(editUrl) {
        // Open the modal

        $.ajax({
            url: editUrl,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#nameupdate').val(data.name);
                $('#usernameupdate').val(data.username);
                $('#editeUserid').val(data.id);

            },
            error: function(error) {
                console.log('Error fetching data: ', error);
            }
        })
        $('#editUserModal').removeClass('hidden');
    }
    function editeUser() {
        var id = $('#editeUserid').val();
        console.log(id);

        $.ajax({
            url: `https://jsonplaceholder.typicode.com/users/${id}`,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                alert(' updated user successfully');
                $('#editUserModal').addClass('hidden');
            },
            error: function(error) {
                alert(error);
            }
        })

    }
    $(document).on('click', '.deleteuser-link', function(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        var deleteUrl = $('.inputuserDelete', $(this).parent()).val();

        // Confirm with the user before sending the delete request
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: deleteUrl,
                method: 'DELETE', // Adjust the HTTP method based on your API requirements
                success: function() {
                    $(event.target).closest('tr').remove();

                    // Show a success alert
                    alert('user deleted successfully!');
                },
                error: function(error) {
                    console.log('Error deleting user: ', error);
                }
            });
        }
    });
</script>