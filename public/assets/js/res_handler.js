/**
 * @author ceojalsoft;
 * like comment reply to comment downgrade add fav enable/disable commenting
 */

var resText,resType,resName,resFile,resForm,commentsDiv,likeBtn,dgrBtn,favBtn,vid,isLike,likeBtn;
isLike = true;
resText = byId('resText');
resType = byId('resType');
resName = byId('resName');
resFile = byId('resFile');
resForm = byId('resForm');
vid = document.querySelectorAll('video');
likeBtn = document.querySelectorAll('#likeBtn')
commentsDiv = byId('commentsDiv');
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
function showComments(resId){
    commentsDiv.classList.toggle('d-none');
    commentsDiv.innerHTML = "";
    const spn = document.createElement('span');
    spn.classList.add('spinner');
    spn.classList.add('spinner-border');
    spn.classList.add('text-info');
    const ctr = document.createElement('center');
    ctr.appendChild(spn);
    commentsDiv.appendChild(ctr);
    const content = `<div class="ms-2 input-group max-4">
                       <input type="text" class="form-control" required placeholder="Comment here">
                       <button class="btn btn-secondary"><i class="bi bi-send"></i></button>
                    </div><hr><h6 class="ms-3 text-primary">Comments</h6>`;
    commentsDiv.innerHTML = content;
    for(let i = 1;i < 210;i++){
        const cnt = document.createElement('div');
        cnt.classList.add('comment-holder');
        if(!(i%5) || !(i%3)){
            cnt.classList.add('comment-reply');
        }
        const content = `<span class="dsh position-absolute bottom-0 start-0"></span>
                            <div class="m-2 card border-0 shadow">
                                    <div class="comment-meta">
                                        <img src="../assets/img/messages-3.jpg" alt="">
                                        <span id="commentor" class="text-mute fw-medium ms-2">Calvince Owino</span>
                                    </div>
                                    <div class="comment-body">
                                        <p class="text-small fw-medium padding-10 comment-text text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis qui inventore magni, illo, facere vero magnam non odit cupiditate voluptatum, cumque veniam nobis velit animi dignissimos praesentium quam. Recusandae! </p>
                                    </div>
                                    <div class="res-reaction mb-1">
                                        <i class="bi bi-hand-thumbs-up ms-2"></i>
                                        <i class="bi bi-hand-thumbs-down ms-2"></i>
                                        <i class="bi bi-heart ms-2"></i>
                                        <i class="bi bi-reply-all-fill ms-4" onclick="replyComment('3')"></i>
                                    </div>
                            </div>`;
        cnt.innerHTML = content;
        commentsDiv.appendChild(cnt);
        
    }
}
// Add logics here to give user feedback when to unlike if not yet updated in the database
for (let i=0;i<likeBtn.length;i++){
    likeBtn[i].addEventListener('click',()=>{
        if(likeBtn[i].classList.contains('bi-hand-thumbs-up')){
            likeBtn[i].classList.remove('bi-hand-thumbs-up');
            likeBtn[i].classList.add('text-primary');
            likeBtn[i].classList.add('bi-hand-thumbs-up-fill');
        } else {
            likeBtn[i].classList.remove('bi-hand-thumbs-up-fill');
            likeBtn[i].classList.remove('text-primary');
            likeBtn[i].classList.add('bi-hand-thumbs-up');
        }
    })
}
function like(resId){
    if(isLike){
        isLike = !isLike;
        
    }
}
function dgrRes(resId){
 
}
function favRes(resId){

}
function delRes(resId){

}
function editRes(resId){

}
function searchRes(resId){

}
for(let i = 0;i < vid.length;i++){
        vid[i].addEventListener('mouseover',()=>{
            vid[i].play();
        });
        vid[i].addEventListener('mouseout',()=>{
            vid[i].pause();
        });
}
window.addEventListener('mousemove',(e)=>{
    byId('hey').style.top = e.pageY+'px';
    byId('hey').style.left = e.x+'px';
});