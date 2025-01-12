var activityName,activityDescription,activityFile,activityForm;
activityName = byId('activityName');
activityDescription = byId('activityDes');
activityFile = byId('activityImage');
activityForm= byId('activityForm');
function deleteActivity(){
    Swal.fire({
        title: 'Please confirm!',
        text: `Are you sure you want to delete this record ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed){
            Swal.fire('Deleted','Delete successful','success');
        }
    });
}
activityForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    // Validate the lengths of the input
    if(isShort(5,activityName)){
          
    }
    AddActivity();
})
function AddActivity(){
    const addXhr = checkXml();
    addXhr.open('POST',route,true);
    setHeader(addXhr);
    addXhr.onload = ()=>{

    }
    addXhr.onerror = ()=>{

    }
    const data = new FormData();
    // append the necesary here 
    addXhr.send(data);
}
function fetchActivities(){

}
function searchActivity(){

}
function fetchRecentActivity(){

}
function isShort(len,str){
    return (str.length <= len)?true:false;
}
function isLong(len,str){
    return(str.length >= len)?true:false;
}
function isText(text){
    let textRegExp = /^[A-Za-zÀ-ÿ\s]+(?:['’][A-Za-zÀ-ÿ]+)*$/;
    return (textRegExp.test(text))?true:false;
}
function toast(icon,message){
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true, 
      });
}