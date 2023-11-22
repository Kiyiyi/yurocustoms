// yurocustoms.com/book js
// Inject from BB plugin on /book page
// 11202023 Kiyiyi

// This function is for hiding the calendar host div on load
document.addEventListener('DOMContentLoaded', function() {
    var parentDiv = document.querySelector('.wpbc_calendar_wraper');
    var divsWithStyle = parentDiv.querySelectorAll('div[style]');
  
    divsWithStyle.forEach(function (divElement) {
      if (!divElement.classList.length && !divElement.id) {
        divElement.style.display = 'none'; // hiding calendar host div
      }
    });
  });
  
// This function is for injecting placeholder text for bookings
  document.addEventListener('DOMContentLoaded', function() {
    // Function to inject placeholder text
    function injectPlaceholders() {
      // Inject placeholder text for the name field with ID 'name1'
      var nameField = document.getElementById('name1');
      if (nameField) {
        nameField.placeholder = 'Enter your full name';
      }
  
      // Inject placeholder text for the email field with ID 'email1'
      var emailField = document.getElementById('email1');
      if (emailField) {
        emailField.placeholder = 'Enter your email address';
      }
  
      // Inject placeholder text for the phone field with ID 'phone1'
      var phoneField = document.getElementById('phone1');
      if (phoneField) {
        phoneField.placeholder = 'Enter your phone number';
      }

      // Inject placeholder text for the phone field with ID 'phone1'
      var captchaInput = document.getElementById('captcha_input1');
      if (captchaInput) {
        captchaInput.placeholder = 'Enter Captcha Code';
      }
    }
  
    // Call the injectPlaceholders function
    injectPlaceholders();
  });
  
// Add the captcha group control
var captchaInput = document.getElementById('captcha_input1');

if (captchaInput) {
  var parentDiv = captchaInput.parentElement;
  if (parentDiv) {
    parentDiv.classList.add('captcha-form-group');
  }
} 