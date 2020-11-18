console.log('Upload : App');

// Define processing URL and form element
const url = 'process.php';
const form = document.querySelector('form');
// Listen for form submit
form.addEventListener('submit', (e) => {
  e.preventDefault();

  console.log('Submit : action button', new Date());
})