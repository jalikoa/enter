const loadInd = document.getElementById('loaderIndicator');
    window.addEventListener('load',()=>{
        setTimeout(rem,1000)
    });
    function rem(){
        loadInd.classList.remove('d-flex');
        loadInd.classList.add('d-none');
        AOSInit();
    }
  
    const route = 'http://localhost/fgi/public/index.php';
    function checkXml(){
        if(window.XMLHttpRequest){
          return new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            return new ActiveXObject();
        }
      }
      function setHeader(xhr){
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      }
      function enc(t){
        return encodeURIComponent(t);
      }
      function byId(id){
        return document.getElementById(id);
      }