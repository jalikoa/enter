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
function isEmpty(str){
  if(str == ''){
    return true
  }
  const emptyRegExp = /^[\t]+$/;
  return (emptyRegExp.test(str))?true:false;
}
function isEmail(str){
const emailRegExp = /^[a-zA-Z0-9$|\.&#]+@[a-zA-Z0-9$|\.&#]+\.[a-zA-Z0-9$|\.&#]{2,10}$/;
return (emailRegExp.test(str))?true:false;
}
function isPhone(str){
const phoneRegExp = /^(\+)?([0-9]{1,3})?([0-9]{0,3})[0-9]{6,8}]$/;
return (phoneRegExp.test(str))?true:false;
}