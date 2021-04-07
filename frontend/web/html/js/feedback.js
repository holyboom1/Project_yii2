window.onload = function (){
    document.getElementById("feedbackBtn").addEventListener('click',
            (e) =>{
                console.log(document.getElementsByClassName('modal_1')[0])
                document.getElementsByClassName('modal_1')[0].classList.toggle("_active_1")
            } )
    }

