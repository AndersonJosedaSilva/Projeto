var ServicoCadastro = {
    
    cadastrar: function(nome,sobrenome,email,data){
    $.ajax({
    method: "post",
    url: "ControlePHP/ContCadas.php",
    data: {'nome': nome,'sobrenome': sobrenome,'email': email,'data': data},
  });
      
    }
};
