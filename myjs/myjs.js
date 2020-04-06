/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#signupForm").submit(function(event){
    event.preventDefault();
    var dataToPost = $(this).serializeArray();
    console.log(dataToPost);
    
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: dataToPost,
        success: function(data){
            if(data){
            $("#signupMessage").html(data);
        }
        },
        error: function(){
            $("#signupMessage").html("<div class = 'alert alert-danger alert-dismissible'>There was an error with the ajax call, please try again later.</div>");
        }
        
    });
});


$("#loginForm").submit(function(event){
    event.preventDefault();
    var dataToPost = $(this).serializeArray();
    console.log(dataToPost);
    
    $.ajax({
        url: "login.php",
        type: "POST",
        data: dataToPost,
        success: function(data){
            if(data === 'success'){
            //$("#loginMessage").html(data);
            window.location = "mainpageloggedin.php";
        }else{
              $("#loginMessage").html(data); 
        }
        },
        error: function(){
            $("#loginMessage").html("<div class = 'alert alert-danger alert-dismissible'>There was an error with the ajax call, please try again later.</div>");
        }
        
    });
});

$("#forgotPassword").submit(function(event){
    event.preventDefault();
    var dataToPost = $(this).serializeArray();
    //console.log(dataToPost);
    
   $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: dataToPost,
        success: function(data){
            
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    });
});



