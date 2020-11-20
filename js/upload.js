console.log('Upload : App');

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
  }).then((response) => {
    console.log(response);
  });
  //
  console.log('Submit : action button', new Date());
});


// Getting the images
const btnGet = document.getElementById('id_btn_getAll');
btnGet.addEventListener('click', (event)=>{
  event.preventDefault();

  console.log('Get', new Date());

  const url_photos = 'all_photos.php'
  fetch( url_photos, {
    method: 'GET'
  }).then((response)=>{
    //console.log( response );
    response.json().then( result=>{
      //console.log(result);
      //const img = '<img src="'+ +'">'
      let htmlStr = '';
      result.forEach(element => {
        htmlStr += '<img src="minstagram_uploads/'+ element +'"></img>';
      });
      //console.log(htmlStr);
      const divPhotosDisplayContainer = document.getElementById('div_view');
      divPhotosDisplayContainer.innerHTML = htmlStr;
    })
  });
});// Btn Click