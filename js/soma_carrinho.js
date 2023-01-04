var lista = document.getElementsByClassName('preco');
var exibe_total = document.getElementById('exibe_total');
var soma = 0;

for (const item of lista) {
    soma += Number(item.innerHTML);
}

exibe_total.innerHTML = "Total: " + soma + " R$";