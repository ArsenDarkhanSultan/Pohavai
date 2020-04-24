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

