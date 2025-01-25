const likeButtons = document.querySelectorAll("#like");
const dislikeButtons = document.querySelectorAll("#dislike");

document.querySelectorAll(".like").forEach(button => {
    button.addEventListener("click", function () {
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");
        console.log('like');

        fetch(`/like/${id}`)
            .then(function () {
                
                //likes.innerHTML = parseInt(likes.innerHTML) ;
                l_num = parseInt(document.querySelector('#likeNum').innerText)
                d_num = parseInt(document.querySelector('#dislikeNum').innerText)
                like = document.querySelector('#likeNum')
                dlike = document.querySelector('#dislikeNum')


                if(document.querySelector('#thumbdislike.pressed') != null){
                    document.querySelector('#thumbdislike').classList.remove('pressed');
                    d_num -= 1;
                    dlike.innerHTML=d_num;
                }



            
                if(document.querySelector('#thumblike.pressed') == null){
                    document.querySelector('#thumblike').classList.add('pressed');
                    l_num += 1;
                    like.innerHTML=l_num;
                } else {
                    document.querySelector('#thumblike').classList.remove('pressed');
                    l_num -= 1;
                    like.innerHTML=l_num;
                }
                document.querySelector('#thumbdislike').classList.remove('pressed');

                if(!document.querySelector('#thumbdislike.pressed') == null && document.querySelector('#thumblike.pressed') == null){
                    d_num -= 1;
                    dlike.innerHTML=d_num;
                }
            });
    });
});

document.querySelectorAll(".dislike").forEach(button => {
    button.addEventListener("click", function () {
        const container = this.closest(".post-icons-interactive").parentElement;
        const id = container.getAttribute("id");

        console.log('dislike');
        fetch(`/dislike/${id}`)
            .then(function () {

                l_num = parseInt(document.querySelector('#likeNum').innerText)
                d_num = parseInt(document.querySelector('#dislikeNum').innerText)
                like = document.querySelector('#likeNum')
                dlike = document.querySelector('#dislikeNum')

                if(document.querySelector('#thumblike.pressed') != null){
                    document.querySelector('#thumblike').classList.remove('pressed');
                    l_num -= 1;
                    like.innerHTML=l_num;
                }




                if(document.querySelector('#thumbdislike.pressed') == null){
                    document.querySelector('#thumbdislike').classList.add('pressed');
                    d_num += 1;
                    dlike.innerHTML=d_num;
                } else {
                    document.querySelector('#thumbdislike').classList.remove('pressed');
                    d_num -= 1;
                    dlike.innerHTML=d_num;
                }
                document.querySelector('#thumblike').classList.remove('pressed');
                
                if(!document.querySelector('#thumblike.pressed') == null && document.querySelector('#thumbdislike.pressed') == null){
                    l_num -= 1;
                    like.innerHTML=l_num;
                }
            });
    });
});

likeButtons.forEach(button => button.addEventListener("click", giveLike));
dislikeButtons.forEach(button => button.addEventListener("click", giveDislike));

