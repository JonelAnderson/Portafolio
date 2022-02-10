/* ============================== typing animation ============================ */
var typed = new Typed(".typing",{
    strings:["","Web Designer","Web Developer","Graphic Designer"],
    typeSpeed:100,
    BackSpeed:60,
    loop:true
})

/*====================Menu Navegacion========================== */
$(".nav").find("a").click(function(){
  $(".nav li a").removeClass('active')
  $(this).addClass('active')
})
