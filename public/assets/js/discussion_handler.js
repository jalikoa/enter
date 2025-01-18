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
// Here add the encryption to encrypt the use data as they leave the page and decrypt them on arrival end-to-end encryption
// Get new messages without reloading the page 
// Update that the user is typing on the other end
// Make the ui to more or quite professinall
var addDiscussionForm,disName,disImage,disAbout,disType,disWhoMess,messageBox,messagesHolder,messagesForm;
let sendTypeR,sendMessR,newMList,messLen;
sendTypeR = true;
sendMessR = true;
addDiscussionForm = byId('addDiscussionForm');
disName = byId('discName');
messagesForm = byId('messagesForm');
disImage = byId('discImage');
disAbout = byId('discAbout');
disType = byId('discType');
disWhoMess = byId('whoMess');
messageBox =byId('messageBox');
messagesHolder = byId('messagesHolder');
messageBox.addEventListener('input',()=>{
    if(sendTypeR){
        updateTyping();
    }
});
messagesForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(sendMessR){
        sendMessage(sessid,'1',messageBox.value,'0','0');
        const cont = `<p class="message-text-text mb-4">${messageBox.value}</p>
                        <span class="received-time text-small position-absolute start-0 m-1 bottom-0"> 00:34 AM</span>
                        <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0"></span>`;
        const sentDiv = document.createElement('div');
        sentDiv.classList.add('message-text');
        sentDiv.classList.add('message-sent');
        sentDiv.classList.add('position-relative');
        sentDiv.classList.add('mt-3');
        sentDiv.innerHTML = cont;
        messagesHolder.append(sentDiv);
        messageBox.value = "";
    }
})
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
function sendMessage(sessid,dissId,message,type,replyto){
    // The type of the message here is either edited original or more as time goes
    // I will add more here so that the message is validated before it is sent here like encryption but for the role of testing and h
    // having a prototype this should be just the way that it is 
    const sendXhr = checkXml();
    sendXhr.open('POST',route,true);
    setHeader(sendXhr);
    sendXhr.onload = ()=>{
        console.log(sendXhr.responseText);
    }
    const data = `sendmessage=${enc('true')}&sessid=${enc(sessid)}&discussionid=${enc(dissId)}&message=${enc(message)}&type=${enc(type)}&reply_to=${enc(replyto)}`;
    sendXhr.send(data);
}
function editMessage(messId,sessid){
    let newMess = edMessInp.value;
    const edXhr = checkXml();
    // Add logics to confirm that the data is text
    // Add more logics here to encrypt the user messages
    edXhr.open('POST',route,true);
    setHeader(edXhr);
    const data = `editMessage=${enc('true')}&sessid=${enc(sessid)}&messId=${enc(messId)}&newMess=${enc(newMess)}`;
    edXhr.onload = ()=>{
        if(edXhr.response.status == 200){
            try {
                const response = JSON.parse(edXhr.responseText);
                if(response.success){
                    // Update the dom
                } else {

                }
            } catch (error) {
                swal.fire(
                    'Sorry',
                    'An uncaught exeption occurred',
                    'error'
                );
            }
        } else {
            swal.fire({
                
            });
        }
    }
    edXhr.send(data);
}
function deleteMessage(messId){

}
function fetchMembers(){

}
function deleteMember(){

}
function checkAdmin(){

}
function updateTyping(){
    sendTypeR = !sendTypeR;
    const typingXhr = checkXml();
    typingXhr.open('POST',route,true);
    setHeader(typingXhr);
    typingXhr.onload = ()=>{
        sendTypeR = !sendTypeR;
        console.log(typingXhr.responseText);
    }
    const data = `updateTyping=${enc('true')}&sessid=${enc(sessid)}&dissid=${enc('1')}`;
    typingXhr.send(data);
}
function fetchMessages(){
    const fetchMessXhr = checkXml();
    fetchMessXhr.open('POST',route,true);
    setHeader(fetchMessXhr);
    fetchMessXhr.onload = ()=>{
        console.log(fetchMessXhr.responseText);
        let response;
        try{response = JSON.parse(fetchMessXhr.responseText)} catch(e){
            swal.fire('Sorry','An uncaught exception occured while trying to load chats from the database','error');
        }
        if(response){
            if(response.success){
                populateChats(response.messList);
            } else {
                swal.fire('Sorry',`${response.message}`,'error');
            }
        }
    }
    const data = `fetchmessages=${enc('true')}&sessid=${enc(sessid)}&discussionid=${enc('1')}`;
    fetchMessXhr.send(data);
}
window.onload = ()=>{
    fetchMessages();
}
function populateChats(list){
    messagesHolder.innerHTML = "";
    messLen = list.length;
    for(let i = 0;i < list.length;i++){
        if(list[i].you){
            const cont = `<span class="senderCred d-flex">
                <img src="../assets/img/messages-2.jpg" alt="">
                <span class="h-30 overflow-hidden fw-medium text-small">You</span>
                <span class="h-30 overflow-hidden">${list[i].country}</span>
            </span>
            <p class="message-text-text mb-4" style="font-size:14px;">${list[i].message}</p>
            <span class="received-time text-small position-absolute start-0 m-1 bottom-0"> 00:34 AM</span>
            <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0"></span>`;
        const sentDiv = document.createElement('div');
        sentDiv.classList.add('message-text');
        sentDiv.classList.add('message-sent');
        sentDiv.classList.add('position-relative');
        sentDiv.classList.add('mt-3');
        sentDiv.setAttribute('id',`${list[i].id}`);
        sentDiv.innerHTML = cont;
        messagesHolder.append(sentDiv);
        } else {
            if(!list[i].you){
                const cont = `<span class="senderCred d-flex">
                <img src="../assets/img/messages-3.jpg" alt="">
                <span class="h-30 overflow-hidden fw-medium">${list[i].username}</span>
                <span class="h-30 overflow-hidden">${list[i].country}</span>
            </span>
            <p class="message-text-text mb-4">${list[i].message}</p>
            <span class="received-time text-small position-absolute start-0 m-1 bottom-0"> 00:34 AM</span>`;
        const sentDiv = document.createElement('div');
        sentDiv.classList.add('message-text');
        sentDiv.classList.add('message-received');
        sentDiv.classList.add('position-relative');
        sentDiv.classList.add('mt-3');
        sentDiv.innerHTML = cont;
        messagesHolder.append(sentDiv);
            }
        }
        messagesHolder.scrollTop = messagesHolder.scrollHeight;
    }
    messagesHolder.scrollTo(messagesHolder.style.height.value);
    checkNewMessage();
}
function checkNewMessage(){
    const fetchNewMess = checkXml();
    fetchNewMess.open('POST',route,true);
    setHeader(fetchNewMess);
    fetchNewMess.onload = ()=>{
        // console.log(fetchNewMess.responseText);
        let response;
        try{response = JSON.parse(fetchNewMess.responseText)} catch(e){
            swal.fire('Sorry','An uncaught exception occured while trying to load chats from the database','error');
        }
        if(response){
            if(response.success){
                if(response.messList.length  > messLen){
                    populateChats(response.messList);
                } else {
                    checkNewMessage();
                }
            } else {
                swal.fire('Sorry',`${response.message}`,'error');
            }
        }
    }
    const data = `fetchmessages=${enc('true')}&sessid=${enc(sessid)}&discussionid=${enc('1')}`;
    fetchNewMess.send(data);
}