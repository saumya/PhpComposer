//
// version: 1.0.0
//
// self executing function
(function(message){
    
    const btnUpdate = document.getElementById('id_btn_update');
    const txtUpdate = document.getElementById('id_txt_update');
    
    // 
    const updateDataForTheImage = function(){
        //console.log('updateDataForTheImage');
        //console.log( txtUpdate.value );
        const url = 'update_info_in_db.php';
        const pData = {
            'name' : 'Saumya',
            'title' : txtUpdate.value
        };
        //
        fetch( url,{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: ( JSON.stringify(pData) )
        }).then( response=>{
            //console.log( 'status=', response.statusText );
            //console.log( response );
           
            response.text().then(result=>{
               //console.log('RESULT : txt : ', result);
               console.log('=========================');
               console.log( 'result=', result );
               /*
               const aa = JSON.parse( result );
               console.log( aa.name );
               console.log( aa.title );
               */
               console.log('=========================');
               
            }).catch( error1=>console.log(error1) );
            
        }).catch( error1=>console.log(error1) );
        //
    } // updateDataForTheImage/

    // Btn Click    
    //const btnUpdate = document.getElementById('id_btn_update');
    btnUpdate.addEventListener('click', (event)=>{
      event.preventDefault();
      //console.log('btnUpdate : click');
      updateDataForTheImage()
    });// Btn Click/
    
    console.log('update.js :' + message);
})('nice');
// self executing function/
