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
