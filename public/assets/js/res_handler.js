var resText,resType,resName,resFile,resForm;
resText = byId('resText');
resType = byId('resType');
resName = byId('resName');
resFile = byId('resFile');
resForm = byId('resForm');
resForm.addEventListener('submit',(e)=>{
e.preventDefault();
})
resType.onchange = ()=>{
    if(resType.value == 'text'){
        resText.classList.remove('d-none');
        resText.classList.add('d-block');
        resText.classList.remove('d-block');
        byId('resourceText').setAttribute('required',true);
        resFile.classList.add('d-none');
        byId('resourceFile').removeAttribute('required');
    } else {
        resFile.classList.remove('d-none');
        resFile.classList.add('d-block');
        resFile.classList.remove('d-block');
        byId('resourceFile').setAttribute('required',true);
        resText.classList.add('d-none');
        byId('resourceText').removeAttribute('required');
    }

}