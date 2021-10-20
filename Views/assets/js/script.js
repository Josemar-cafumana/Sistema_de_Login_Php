$(".form-register").submit((e) => {
    e.preventDefault()
    var form = $(".form-register");
    var inputName = $(".input-name");
    var inputEmail = $(".input-email");
    var inputPassword = $(".input-password");
    var inputConfirm = $(".input-confpass");
    var url = $(".form-register").data("action");

  

    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
       success: function (values) {
           var data = JSON.parse(values);
           
           console.log(data);
            
    
        if (data.name) {
            if (data.name == "is-valid") {

                inputName.removeClass("is-invalid");
            } else {
                inputName.removeClass("is-valid");
            }
            inputName.addClass(data.name);
        }

        if (data.email) {


            if (data.email == "is-valid") {

                inputEmail.removeClass("is-invalid");
            } else {
                inputEmail.removeClass("is-valid");
            }

            inputEmail.addClass(data.email);
        }
        
        if (data.password) {
            if (data.password== "is-valid") {

                inputPassword.removeClass("is-invalid");
            } else {
                inputPassword.removeClass("is-valid");
            }

            inputPassword.addClass(data.password);
        }
        if (data.confpass) {

            if (data.confpass== "is-valid") {

                 inputConfirm.removeClass("is-invalid");
            } else {
                 inputConfirm.removeClass("is-valid");
            }
            inputConfirm.addClass(data.confpass);
        }

   

    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  

});


});



$(".form-login").submit((e) => {

    e.preventDefault();
    var form = $(".form-login");
    var inputEmail = $(".input-email");
    var inputPassword = $(".input-password");
    var url = $(".form-login").data("action");

    $.post(url, form.serialize(), function(value) {

        

        console.log(value);
     
       
    });
  

});