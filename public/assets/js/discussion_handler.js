/**
 * @author Calvince Owino
 * @company Jalsoft
 * @position CEO
 * @see jalikoa.github.io/jalsoft
 */
// Add new discussion
// Load all discussions name about members ---- members username country image role-in-discussion online typing
// Load messages selected discussions members --- members username country image role-in-discussion online typing
// Load notifications new messages 
var addDiscussionForm,disName,disImage,disAbout,disType,disWhoMess;
addDiscussionForm = byId('addDiscussionForm');
disName = byId('discName');
disImage = byId('discImage');
disAbout = byId('discAbout');
disType = byId('discType');
disWhoMess = byId('whoMess');
addDiscussionForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(isEmpty(disName.value) || isEmpty(disAbout.value) || isEmpty(disType.value) || isEmpty(disWhoMess.value)){
        swal.fire('Sorry','Action not completed please ensure all the fields are filled','error');
    } else {
        const adDiXhr = checkXml();
        adDiXhr.open('POST',route,true);
        setHeader(adDiXhr);
        adDiXhr.onload =()=>{
            console.log(adDiXhr.responseText);
        }
        const data = new FormData();
        data.append('adnewdiscussion','true');
        data.append('discussionname',disName.value);
        data.append('discussionimage',disImage.files[0]);
        data.append('discussionabout',disAbout.value);
        data.append('discussiontype',disType.value);
        data.append('whomess',disWhoMess.value);
        adDiXhr.send(data);
    }
});
function sendMessage(senderId,dissId,message,type,replyto){
    // The type of the message here is either edited original or more as time goes
    const sendXhr = checkXml();
    sendXhr.open('POST',route,true);
    setHeader(sendXhr);
    sendXhr.onload = ()=>{
        console.log(sendXhr.responseText);
    }
    const data = ``;
    sendXhr.send(data);
}
function editMessage(){

}
function deleteMessage(){

}
function fetchMembers(){

}
function deleteMember(){

}
function checkAdmin(){

}