$(document).ready(function(){

    $("#registration-form").validate({  
       rules:{ 
        
            name:{
                required: true, 
                minlength: 1,
                maxlength: 16, 
            }

            email:{
                required: true,
                email: true,
            }
               
            password:{
                required: true, 
                minlength: 1,
                maxlength: 16,
            }
       },
      
       messages:{
        
            name:{
                required: " Это поле обязательно для заполнения", 
                minlength: " Имя должно быть минимум 1 символ", 
                maxlength: " Максимальное число символов для имени - 16",
            },

            email:{
                required: " Это поле обязательно для заполнения",
                email: " Введите корректный email", 

            },
            
            password:{
                required: " Это поле обязательно для заполнения", 
                minlength: " Пароль должен быть минимум 1 символ", 
                maxlength: " Максимальное число символов в пароле - 16",
            },
        
       }
        
    });
    $("#loginform").validate({   
       rules:{ 
        
            email:{
                required: true, 
                email: true, 
            },
               
            password:{
                required: true, 
                minlength: 1, 
                maxlength: 16,
                           },
       },
  
       messages:{
        
           

            email:{
                required: " Это поле обязательно для заполнения", 
                email: " Введите корректный email ", 

            },
            
            password:{
                required: " Это поле обязательно для заполнения", 
                minlength: " Пароль должен быть минимум 1 символ", 
                maxlength: "Максимальное число символов в пароле - 16", 
            },
       }  
    });
}); 







