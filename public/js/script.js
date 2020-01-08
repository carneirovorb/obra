(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
        $('.modal').modal();
    }); 
})(jQuery);


$(document).ready(function () {
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15,
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Ok',
        closeOnSelect: false 
    });
});



function unMask(){
    $('.cpf').unmask();
    $('.percent').unmask();
    $('.cnpj').unmask();
}

function mask(){
    $('.money').mask('000.000.000,00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.percent').mask('##0,00%', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true}); 
}

$(function () {
    mask();
})

function addPrefecture() {

   $('#prefectureSelect').hide();
   $('#newPrefecture').show();

}


$(function () {
    $(".prefeitura p").click(function () {
        $(".vinculo").show();
        $(".tipo").hide();
        $(".vinculo input:radio, .tipo input:radio").removeAttr("checked");

  });

  $(".vinculo p").click(function () {
    $(".tipo").show();
    $(".tipo input:radio").removeAttr("checked");
    

});

$(".tipo p").click(function () {
    document.getElementById('formFolder').submit();   

});

})

