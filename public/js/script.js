var form = document.getElementById('formreg');
var message = 'Le mot de passe doit contenir au moins 6 caractères et un chiffre.';  
document.getElementById("infoMdp").textContent = message;


function validateForm() {


    var mdp1 = form.elements.passreg.value;
    var mdp2 = form.elements.passreg2.value;
    
    if (mdp1 === mdp2) {


        if (mdp1.length >= 6) {
            var regexMdp = /\d+/;
            if (!regexMdp.test(mdp1)) {
               
                return false;
            } 

        } else {
       
          return false;
        }


    } else {
    
        return false;
    }


};


function validateComm(){
  
    document.getElementById('comment').value.trim();
  
    if(document.getElementById('comment').value== 0){
      
        return false;
    }

}


