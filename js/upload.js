console.log('Upload : Version 1.0.0');

// Define processing URL and form element
const url = 'upload_to_minstagram.php';
const form = document.querySelector('form');
// Listen for form submit
form.addEventListener('submit', (e) => {
  e.preventDefault();

  const files = document.querySelector('[type=file]').files;
  const formData = new FormData();
  for (let i = 0; i < files.length; i++) {
    let file = files[i];
    formData.append('files[]', file);
  }
  //
  fetch ( url, {
    method: 'POST',
    body: formData
  }).then( response => {
    //console.log('response');
    //console.log(response);
    // JSON.stringify(
    //document.getElementById('id_result').innerHTML = 'Upload Success.';
    //console.log ( JSON.stringify( response ) );
    response.text().then( result => {
      //console.log('result');
      //console.log(result);
      document.getElementById('id_result').innerHTML = 'Upload Success.';
    }).catch(error2=>console.log(error2));
  } ).catch( error1 => console.log(error1) );
  //
  console.log('Submit : action button', new Date());
});

