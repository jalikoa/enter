window.onload = updateOnline();
    function updateOnline(){
        const uoxhr = checkXml();
        uoxhr.open("POST",route,true);
        uoxhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        uoxhr.onload = ()=>{
            console.log(uoxhr.responseText);
            const response = JSON.parse(uoxhr.responseText);
            if(!response.success){
                swal.fire(
                    'Sorry',
                    `${response.message}`,
                    'error'
                );
            }
                updateOnline();
        }
        const data = `updateonline=${encodeURIComponent('true')}&sessid=${encodeURIComponent(sessid)}`;
        uoxhr.send(data);
    }