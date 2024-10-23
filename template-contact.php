<?php
/**
 * Template Name: Contact
 */

get_header(); 
?>







<section
      class="pt-0 bg-transparent relative overflow-hidden h-[20vh] max-md:h-[15vh]"
    >
      <div
        class="flex gap-5 max-md:flex-col justify-start items-start relative h-full"
      >
        <div
          class="flex flex-col w-[100%] max-md:ml-0 max-md:w-full text-center pt-10"
        >
          <div
            class="flex flex-col items-center w-full text-2xl font-semibold leading-tight max-md:mt-0 max-md:max-w-full"
          >
            <h1
              class="self-stretch text-7xl leading-[80px] text-cyan-900 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
            >
              We’d love to hear from you.
            </h1>
          </div>
        </div>
      </div>
    </section>


    <section class="flex flex-col leading-tight py-24 max-md:py-10">
      <div class="flex overflow-hidden flex-col w-full max-md:max-w-full">
        <div
          class="flex flex-col justify-center items-center px-16 py-24 w-full bg-white rounded-[45px] max-md:px-5 max-md:max-w-full"
        >
   <form class="flex flex-wrap gap-12 items-end w-full max-w-[1146px] max-md:max-w-full" method="post">
        <div class="flex flex-col grow shrink min-w-[240px] w-[517px] max-md:max-w-full">
            <label for="firstName" class="text-2xl font-semibold text-cyan-950">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="Type here..." class="overflow-hidden gap-2.5 self-stretch px-7 py-6 mt-4 max-w-full text-xl font-medium bg-zinc-100 min-h-[61px] rounded-[50px] text-neutral-400 w-[562px] max-md:px-5" autocomplete="off" required>
        </div>
        <div class="flex flex-col grow shrink min-w-[240px] w-[517px] max-md:max-w-full">
            <label for="lastName" class="text-2xl font-semibold text-cyan-950">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="Type here..." class="overflow-hidden gap-2.5 self-stretch px-7 py-6 mt-4 max-w-full text-xl font-medium bg-zinc-100 min-h-[61px] rounded-[50px] text-neutral-400 w-[562px] max-md:px-5" required>
        </div>
        <div class="flex flex-col grow shrink min-w-[240px] w-[517px] max-md:max-w-full">
            <label for="email" class="text-2xl font-semibold text-cyan-950">Your Email</label>
            <input id="email" name="email" type="email" placeholder="Type here..." class="overflow-hidden gap-2.5 self-stretch px-7 py-6 mt-4 max-w-full text-xl font-medium bg-zinc-100 min-h-[61px] rounded-[50px] text-neutral-400 w-[562px] max-md:px-5" required>
        </div>
        <div class="flex flex-col grow shrink min-w-[240px] w-[517px] max-md:max-w-full">
            <label for="phone" class="text-2xl font-semibold text-cyan-950">Your Phone Number</label>
            <input id="phone" name="phone" type="tel" placeholder="Type here..." class="overflow-hidden gap-2.5 self-stretch px-7 py-6 mt-4 max-w-full text-xl font-medium bg-zinc-100 min-h-[61px] rounded-[50px] text-neutral-400 w-[562px] max-md:px-5">
        </div>
        <div class="flex flex-col grow shrink min-w-[240px] w-[1101px] max-md:max-w-full">
            <label for="message" class="text-2xl font-semibold text-cyan-950">Message</label>
            <textarea id="message" name="message" placeholder="Type here..." class="overflow-hidden gap-2.5 px-7 pt-8 pb-36 mt-4 w-full text-xl font-medium bg-zinc-100 min-h-[183px] rounded-[50px] text-neutral-400 max-md:px-5 max-md:pb-24" required></textarea>
        </div>
        <button type="submit" class="flex overflow-hidden gap-4 justify-center items-center py-2 pr-1.5 pl-5 text-2xl font-semibold text-white bg-gradient-to-r from-[#00cd52] to-[#009d1d] min-h-[58px] rounded-[50px]">
            <span class="self-stretch my-auto">Send Message</span>
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce64ba6ec88ef90da9e1b4338ca12d5e73ffcf82f4e30a2b38178d878143395?placeholderIfAbsent=true&amp;apiKey=2372ca227ccb46eeb978f53bfef9667b" alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]">
        </button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $firstName = sanitize_text_field($_POST['firstName']);
    $lastName = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);

    // Prepare the email
    $to = 'rebelsoft111122@gmail.com'; // Change to your desired email address
    $subject = 'New Contact Form Submission';
    $body = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    // Send the email
    wp_mail($to, $subject, $body, $headers);

    // Confirmation message
    echo '<p class="text-green-600 mt-4">Thank you for your message! We will get back to you soon.</p>';
}
?>
        </div>
      </div>
    </section>


    <section
      class="flex flex-col mt-0 w-full text-2xl font-semibold max-md:mt-10 max-md:max-w-full pb-16"
    >
      <div
        class="flex flex-col px-11 py-20 w-full bg-white rounded-[45px] max-md:px-5 max-md:max-w-full"
      >
        <div
          class="flex flex-wrap gap-5 justify-between max-md:justify-center w-full max-w-[1056px] max-md:max-w-full"
        >
          <h2 class="text-neutral-400">Our Office</h2>
          <address
            class="flex flex-wrap gap-10 max-md:gap-5 items-start text-cyan-950 max-md:max-w-full not-italic max-md:items-center max-md:justify-center"
          >
            <span>Baridhara J Block</span>
            <a href="mailto:info@ishaankrishan.com">info@ishaan Krishan</a>
            <a href="tel:+88014567899">(+88014567899)</a>
          </address>
        </div>
        <iframe
        loading="lazy"
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6139.901922038428!2d90.3578209871453!3d23.78986737765104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1729163294295!5m2!1sen!2sbd"
        alt="Map of our office location"
        class="object-contain mt-12 w-full aspect-[3.26] rounded-[45px] max-md:mt-10 max-md:max-w-full"
        style="height: 400px;"
      ></iframe>
      
      </div>
    </section>

<?php
get_footer(); 
?>
