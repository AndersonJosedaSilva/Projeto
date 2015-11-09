var ControleCadastro = {
    init:function(){
        ControleCadastro.setForm();
    },
    
    setForm:function(){
        var form = document.querySelector('form');
        form.addEventListener("submit",function(event){
            ControleCadastro.cadastro(form);
            ControleCadastro.limparCadastro(form);
            
            event.preventDefault();
        });
    },
    
    cadastro:function(form){
        var 
        nome = form.nome.value,
        sobrenome = form.sobrenome.value,
        email = form.email.value,
        data = form.data.value;
        
        ServicoCadastro.cadastrar(nome,sobrenome,email,data);
},
    
    limparCadastro: function(form){
        var vazio = " ";
        var limpar = document.querySelector('#nome');
		limpar.innerHTML = vazio;
        
    }
};

ControleCadastro.init();
