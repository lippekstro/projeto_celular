document.getElementById('form_cadastro').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var password = document.getElementById('senha').value;
    var confirmPassword = document.getElementById('confirma_senha').value;
  
    if (password !== confirmPassword) {
      document.getElementById('erro_senha').textContent = 'As senhas não são iguais.';
    } else {
      document.getElementById('erro_senha').textContent = '';
      this.submit();
    }
  });
  