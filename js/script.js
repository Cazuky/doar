$(document).ready(function(){

$('.SlideSlick').slick({autoplay: true, dots: true, infinite: true, arrows: true, fade:true, cssEase: 'linear'});

    var formRegister = $('#formRegister');
    //REGISTO DO DOADOR
    formRegister.submit(function(){
      dados = $(this).serialize();
      $.ajax({
        url: 'controller/auth.php',
        type: 'POST',
        data: dados+"&action=register",
        beforeSend: function(){
          $('#resposta').empty().html('<img src="images/load.gif">').fadeIn("fast");
        },
        error: '',
        success: function(resposta){
       if(resposta==111){
            $('#resposta').empty().html("Seu pedido foi enviado com sucesso, aguarde a nossa notificação!").delay(2000).fadeOut();
            formRegister.trigger("reset");
            $('#id01').delay(1000).fadeOut('slow');
        }
        else {
          if (resposta==1062) {
            $('#resposta').empty().html("Conta já existente");
          }else {
            $('#resposta').empty().html("Erro ao registar-se");
          }

        }
        }
      })
      return false;
    })

    //LOGIN DO USUÁRIO

    var loginForm  = $("form[name='loginForm']");
    loginForm.submit(function(){
      dados = $(this).serialize();
      $.ajax({
        url: '../controller/auth.php',
        type: 'POST',
        data: dados+'&action=login',
        beforeSend:'',
        error: '',
        success: function(retorno){
          if (retorno==0) {
              $('#resposta').empty().html("<p>As credências de login não correspondem</p>").fadeIn().delay(2000).fadeOut('fast');
          }else {
            window.location.href="doador/";
          }
        }
      })
      return false;
    })

    //LOGIN DO ADMINISTRADOR

    var formAdminLogin  = $("form[name='AdminLogin']");
    formAdminLogin.submit(function(){
      dados = $(this).serialize();
      $.ajax({
        url: '../control/AdminControl.php',
        type: 'POST',
        data: dados,
        beforeSend:'',
        error: '',
        success: function(retorno){
          if (retorno==0) {
              $('#resposta').empty().html("<p>As credências de login não correspondem</p>").fadeIn().delay(2000).fadeOut('fast');
          }else {
            window.location.href="index.php";
          }
        }
      })
      return false;
    })
  $(document).on('click', '.modalregister', function(){
    titulodocampo = $(this).attr('id');
    if (titulodocampo=="turmas") {
      $('#turmasselect').fadeIn()
    }else {
      $('#turmasselect').fadeOut();
    }
    $('#camporegistro').attr('placeholder','Digite o/a '+titulodocampo);
    $('input[type="submit"]').attr('value', 'salvar '+titulodocampo);
    $('#page').attr('value', titulodocampo);
    $('#modalregister').css({'display':'block'});

  })

  //HIDE INFO PANEL IN FIRST PAGE
  $("#btn-continue").click(function(){
    $("#firstside").addClass("w3-hide-small").hide();
    $("#form-continue").removeClass("w3-hide-small").fadeIn();
  })

  // HIDE LOGIN FORM IN FIRST PAGE AND BACK TO INFO PANEL
  $("#btn-back").click(function(){
    $("#form-continue").hide();
    $("#firstside").removeClass("w3-hide-small").fadeIn();
  })
  $("#uploadForm").on('change',(function(e) {
  		e.preventDefault();
  		$.ajax({
        url: "../config/uploadAJAX.php",
  			type: "POST",
  			data:  new FormData(this),
  			contentType: false,
      	cache: false,
  			processData:false,
  			success: function(data)
  		    {
  					$('#uploadView').empty().html(data);
  		    },
  		  	error: function()
  	    	{
  	    	}
  	   });
  	}));
})
