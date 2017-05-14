window.onload = function(){
    
    var chat = document.getElementById("mostrarChat");
    var user = document.getElementById("user");
    var msg = document.getElementById("mensagem");
    
    msg.onkeypress = function(){
        var e = window.event;
        var tecla;
        if(e.keyCode){
            tecla = e.keyCode;
            if(tecla == 13){
                var mensagem = msg.value;
                chat.appendChild(document.createTextNode(user.value + ": " + msg.value));
                chat.appendChild(document.createElement("br"));
                msg.value = "";
                chat.scrollTop = chat.scrollHeight;
                
            }
        }
        
        
    };

    
    
    
    
};

