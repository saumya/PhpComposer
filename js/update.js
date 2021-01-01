//
// version: 1.0.0
//
// self executing function
(function(info){
    
    const btnUpdate = document.getElementById('id_btn_update');
    btnUpdate.addEventListener('click', (event)=>{
      event.preventDefault();
      //getDataFromServer();
      console.log('btnUpdate : click');
    });// Btn Click
    
    console.log('update.js :' + info);
})('nice');
// self executing function/
