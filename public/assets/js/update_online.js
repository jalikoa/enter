    function updateOnline(){
        const uoxhr = checkXml();
        uoxhr.open("POST",route,true);
        setHeader(uoxhr);
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
               window.setTimeout(()=>{
                updateOnline()
               },2000);
        }
        const data = `updateonline=${encodeURIComponent('true')}&sessid=${encodeURIComponent(sessid)}`;
        uoxhr.send(data);
    }
updateOnline();