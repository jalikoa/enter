const addMemberForm = byId('addMemberForm');
const closeMemberModalBtn = byId('closeFormModal');
var memberName,memberEmail,memberPhone,memberCountry,memberRole,searchTab,limit,start,membersListTable;
memberName = byId('memberName');
memberEmail = byId('memberEmail');
memberPhone = byId('memberPhone');
memberCountry = byId('memberCountry');
memberRole = byId('memberRole');
searchTab = byId('searchTab');
membersListTable = byId('membersListTable');
limit = byId('entriesPerPage');
start = '0';

addMemberForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    const addxhr = checkXml();
    addxhr.open('POST',route,true);
    setHeader(addxhr);
    addxhr.onload = ()=>{
        console.log(addxhr.responseText);
        closeMemberModalBtn.click();
        var response;
        try {response = JSON.parse(addxhr.responseText)} catch (e){
            Swal.fire(
              'Error',
              `Sorry an Uknown exeption occurred`,
              'error'
            )
        }
        if(JSON.parse(addxhr.responseText)){
            if(response.success){
                swal.fire(
                    'Added',
                    `${response.message}`,
                    'success'
                )
            } else {
                swal.fire(
                'Sorry',
                `${response.message}`,
                'error')}
        }
    }
    const data = `addnewmember=${enc('true')}&username=${enc(memberName.value)}&useremail=${enc(memberEmail.value)}&userphone=${enc(memberPhone.value)}&usercountry=${enc(memberCountry.value)}&userrole=${enc(memberRole.value)}&sessid=${enc(sessid)}`;
    addxhr.send(data);
});

searchTab.addEventListener('input',()=>{
    searchMember(`${searchTab.value}`)
});

function searchMember(char){
    const searchXhr = checkXml();
    searchXhr.open('POST',route,true);
    setHeader(searchXhr);
    searchXhr.onload = ()=>{
        console.log(searchXhr.responseText);
        var response;
        try{response = JSON.parse(searchXhr.responseText)}catch(e){
            // Add code to show unable to load the lists from the db
            membersListTable.innerText = "Sorry members list could not be loaded";
        }
        if(response.success){
            populateTable(response.list);
        }
        else if (!response.success){
            const content = `<center><p class="text-danger fw-medium">${response.message}</p></center>`;
            membersListTable.innerHTML = content;
        }
    }
    const data = `searchmember=${enc('true')}&searchitem=${enc(char)}&sessid=${sessid}`;
    searchXhr.send(data);
}
limit.addEventListener('change',()=>{
    fetchMembers(start,limit);
})
function fetchMembers(start,limit){
    const fetchxhr = checkXml();
    fetchxhr.open('POST',route,true);
    setHeader(fetchxhr);
    fetchxhr.onload = ()=>{
        console.log(fetchxhr.responseText);
        var response;
        try{response = JSON.parse(fetchxhr.responseText)}catch(e){
            // Add code to show unable to load the lists from the db
            membersListTable.innerText = "Sorry members list could not be loaded";
        }
        if(response.success){
            populateTable(response.list);
        }
    }
    const data = `fetchmebers=${enc(true)}&sessid=${enc(sessid)}&start=${enc(start)}&limit=${enc(limit.value)}`;
    fetchxhr.send(data);
}
function populateTable(list){
    membersListTable.innerHTML = "";
    for(i=0;i<list.length;i++){
        const row = document.createElement('tr');
        $cont = `
                    <td>${i+1}</td>
                    <td>${list[i].name}</td>
                    <td>${list[i].email}</td>
                    <td>${list[i].phone}</td>
                    <td>${list[i].country}</td>
                    <td>${list[i].role}</td>
                    <td>
                        <div class="m-0 p-0">
                            <button class="btn btn-primary m-1"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger m-1"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>`;
        row.innerHTML=$cont;
        membersListTable.appendChild(row);
    }
}
function deleteMember(){
    
}
window.addEventListener('DOMContentLoaded',()=>{
    fetchMembers(start,limit);
})