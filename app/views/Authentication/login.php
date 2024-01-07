<?php require APPROOT . '\views\include\header.php'; ?>


<!-- component -->
<section class="flex flex-col md:flex-row h-screen items-center">

  <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
    <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
  </div>

  <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

    <div class="w-full text-center h-100">


      <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

      <form id="loginForm" action="<?php echo URLROOT; ?>authentication/login"  class="mt-6">

        <div>
          <label class="block text-gray-700">Email Address</label>
          <input type="email" name="email" id="email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"  autofocus autocomplete >
                       
                            <span id="email_err" class="text-red-500 text-sm"></span>
                        
          
        </div>

        <div class="mt-4 text">
          <label class="block text-gray-700">Password</label>
          <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none " value=""required>
                            <span id="password_err" class="text-red-500 text-sm"></span>
             
        </div>

       

        <button class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
              px-4 py-3 mt-6">Log In</button>
      </form>
      <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">
                            Not a member yet?</label>
                            <a href="<?php echo URLROOT ?>authentication/signup" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Sign up
                            </a>
                        </div>
                    </div>

    </div>
  </div>

</section>
<script>
    $(document).ready(function () {
        // Handle form submission
        $("#loginForm").submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Perform an AJAX request
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    // Handle the success response
                    console.log(response);
                    window.location.href = "http://localhost/MokhlisBelhaj_Alpha/";

                    // You can redirect or perform other actions based on the response
                },
                error: function (error) {
                    // Handle the error response
                    // console.log(error);
                    data = error.responseJSON;

                    $("#email_err").text(data.email_err);
                if (data.email_err) {
                    $("#email").addClass('border-red-500');
                } else {
                    $("#email").removeClass('border-red-500');
                }

                $("#password_err").text(data.password_err);
                if (data.password_err !== "") {
                    $("#password").addClass('border-red-500');
                } else {
                    $("#password").removeClass('border-red-500');
                }
                }
            });
        });
    });
</script>

