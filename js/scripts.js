$("#contact-form").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});

function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#contact-name").val();
    var email = $("#contact-email").val();
    var timeline = $("#contact-timeline").val();
    var budget = $("#contact-budget").val();
    var company = $("#contact-company").val();
    var website = $("#contact-website").val();
    var message = $("#contact-message").val();
 
    // $.ajax({
    //     type: "POST",
    //     url: "php/process.php",
    //     data: "name=" + name + "&email=" + email + "&timeline=" + timeline  + "&budget=" + budget + "&company=" + company + "&website=" + website + "&message=" + message,
    //     success : function(text){
    //         if (text == "success"){
    //             formSuccess();
    //         }
    //     }
    // });

    $.ajax({
      type: "POST",
      url: "php/process.php",
      data: "name=" + name + "&email=" + email + "&timeline=" + timeline  + "&budget=" + budget + "&company=" + company + "&website=" + website + "&message=" + message,
      success : function(text){
          if (text == "success"){
              formSuccess();
          } else {
              submitMSG(false,text);
          }
      }
  });
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}
