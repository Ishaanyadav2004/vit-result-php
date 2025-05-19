// script.js

// You can add JavaScript for client-side interactivity here.
// For this basic result display, you might not need much,
// but here are examples of what you could include:

document.addEventListener('DOMContentLoaded', function() {
  // Example 1:  Basic Form Validation (Alternative to HTML5 validation)
  const resultForm = document.getElementById('resultForm');
  const prnInput = document.getElementById('prn');

  if (resultForm && prnInput) {
    resultForm.addEventListener('submit', function(event) {
      if (prnInput.value.trim() === '') {
        alert('Please enter your PRN.');
        event.preventDefault(); // Stop form submission
      }
      // You could add more complex validation here (e.g., PRN format)
    });
  }


  // Example 2:  (If you change to AJAX -  Fetching with JavaScript instead of direct form submit)
  //   If you wanted to fetch the result using JavaScript and update the page without a full reload,
  //   you'd use fetch() or XMLHttpRequest.  This is more advanced.
  // const resultForm = document.getElementById('resultForm');
  // const prnInput = document.getElementById('prn');
  // const resultDiv = document.getElementById('result');

  // if (resultForm && prnInput && resultDiv) {
  //   resultForm.addEventListener('submit', function(event) {
  //     event.preventDefault(); // Prevent the default form submission

  //     const prn = prnInput.value.trim();
  //     if (prn === '') {
  //       alert('Please enter your PRN.');
  //       return;
  //     }

  //     fetch(`get_result.php?prn=${prn}`)  // Create get_result.php (see below)
  //       .then(response => response.text())
  //       .then(data => {
  //         resultDiv.innerHTML = data;  // Display the result
  //       })
  //       .catch(error => {
  //         resultDiv.innerHTML = '<p class="error-message">Error fetching result.</p>';
  //         console.error('Fetch error:', error);
  //       });
  //   });
  // }

});


//  **IF you use AJAX (Example 2 above), you'll need this PHP file:**
//  get_result.php  (AJAX version)
//  This is a simplified version of result.php, designed to return only the result HTML.
//  It's used if you want the page to update dynamically without reloading.
