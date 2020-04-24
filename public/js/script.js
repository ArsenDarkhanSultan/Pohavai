$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked")){
            let label_ = document.getElementById(this.className);
            label_.style.backgroundColor = 'rgba(134,197,218,0.49)';
        }
        else if($(this).prop("checked") == false){
            let label_ = document.getElementById(this.className);
            label_.style.backgroundColor = '#fff';
        }
    });
    $('#more_reviews').on('click', function(){
        let reviews = document.getElementById('reviews');
        let button = this;
        reviews.style.height = '56%';
        reviews.style.transition = '0.7s';
        button.style.outline = 'none';
        button.style.display = 'none';
        let other_reviews = document.getElementsByClassName('review_passive');
        let i;
        setTimeout(function() {
            for (i = 0; i < other_reviews.length; i++) {
                other_reviews[i].style.display = 'block';
            }
        }, 400);


    })


});


var s= $("#hdnSession").data('value');
if (s !== '/' && s === 1) {
    swal({
        title: 'Успех!',
        text: 'Стол был успешно зарезервирован',
        icon: 'success'
    });
}
else if(s !== '/' && s === 0){
    swal({
        title: 'Ошибка!',
        text: 'Что то пошло не так',
        icon: 'error'
    });
}

