var actionTitle,editProfileCard,viewProfileCard,ChangePassCard;
actionTitle = byId('actionTitle');
editProfileCard = byId('editProfileCard');
viewProfileCard = byId('viewProfileCard');
ChangePassCard = byId('ChangePassCard');
function profSet(opt){
    if(opt == 'E'){
        actionTitle.innerText = 'Edit Profile';
        if(viewProfileCard.classList.contains('d-block')){
            viewProfileCard.classList.remove('d-block');
            viewProfileCard.classList.add('d-none');
        }
        if(ChangePassCard.classList.contains('d-block')){
            ChangePassCard.classList.remove('d-block');
            ChangePassCard.classList.add('d-none');
        }
        if(editProfileCard.classList.contains('d-none')){
            editProfileCard.classList.remove('d-none');
            editProfileCard.classList.add('d-block');
        }
    }
    if(opt == 'C'){
        actionTitle.innerText = 'Change Password';
        if(viewProfileCard.classList.contains('d-block')){
            viewProfileCard.classList.remove('d-block');
            viewProfileCard.classList.add('d-none');
        }
        if(editProfileCard.classList.contains('d-block')){
            editProfileCard.classList.remove('d-block');
            editProfileCard.classList.add('d-none');
        }
        if(ChangePassCard.classList.contains('d-none')){
            ChangePassCard.classList.remove('d-none');
            ChangePassCard.classList.add('d-block');
        }
    }
    if(opt == 'V'){
        actionTitle.innerText = 'View Profile';
        if(editProfileCard.classList.contains('d-block')){
            editProfileCard.classList.remove('d-block');
            editProfileCard.classList.add('d-none');
        }
        if(ChangePassCard.classList.contains('d-block')){
            ChangePassCard.classList.remove('d-block');
            ChangePassCard.classList.add('d-none');
        }
        if(viewProfileCard.classList.contains('d-none')){
            viewProfileCard.classList.remove('d-none');
            viewProfileCard.classList.add('d-block');
        }
    }
}