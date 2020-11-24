//
console.log('App : version 0.1.0');

// Self-Executing Function
(()=>{

  console.log('App : Entry');

  // Getting the images
  const getDataFromServer = ()=>{
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
          htmlStr += '<img src="minstagram_uploads/'+ element +'" width="100%;"></img>';
        });
        //console.log(htmlStr);
        const divPhotosDisplayContainer = document.getElementById('div_view');
        divPhotosDisplayContainer.innerHTML = htmlStr;
      })
    });
  }; // getDataFromServer

  const btnGet = document.getElementById('id_btn_getAll');
  btnGet.addEventListener('click', (event)=>{
    event.preventDefault();
    getDataFromServer();
  });// Btn Click
  
  // Auto load the data when the page has been loaded.
  getDataFromServer()

})();// Self-Executing Function