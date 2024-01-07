<?php require APPROOT . '\views\include\header.php'; ?>

<!-- component -->
<section class="flex flex-col md:flex-row h-screen items-center">



    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

        <div class="w-full text-center h-100">


            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

            <form id="registrationForm" action="<?php echo URLROOT; ?>authentication/signup" method="post" class="mt-6">
                <div>
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none " value="<?php echo $data['name'] ?>" autofocus autocomplete>

                    <span id="name_err" class="text-red-500 text-sm"></span>


                </div>
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none " value="" autofocus autocomplete required>
                    <span id="email_err" class="text-red-500 text-sm"></span>


                </div>

                <div class="mt-4 text">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none " value="" required>

                    <span id="password_err" class="text-red-500 text-sm"></span>


                </div>
                <div class="mt-4 text">
                    <label class="block text-gray-700">confirm password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none " value="" required>

                    <span id="confirm_password_err" class="text-red-500 text-sm"></span>


                </div>



                <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
              px-4 py-3 mt-6">Sign up</button>
            </form>
            <div class="mt-7">
                <div class="flex justify-center items-center">
                    <label class="mr-2">
                        Do you already have an account?</label>
                    <a href="<?php echo URLROOT ?>authentication/login" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                        Sign in
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
    </div>
</section>

<script src="<?php echo URLROOT ?>public/js/signup.js"></script>