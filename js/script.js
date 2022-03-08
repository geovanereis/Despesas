
// campo data atual inserir despesas
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;

if (typeof today !== 'undefined') {
  
}
document.getElementById("datefield").setAttribute("max", today);

// campo valor formatada

String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
  };
  
  function mascaraMoeda(campo,evento){
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "###.###.###.##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = resultado.reverse();
  }


function Pesquisar(string) {
    tabela = document.getElementsByTagName("table")[0];
    linhas = tabela.getElementsByTagName("tr");
    for (let r = 1; r < linhas.length; r++) {
        dados = linhas[r].getElementsByTagName('td');
        let encontrei = false;
        for (let d = 0; d < dados.length; d++) {
            if (dados[d].innerText.indexOf(string) >= 0) {
                encontrei = true;
                break;
            }
        }
        if (encontrei) {
            linhas[r].style.display = "";
        } else {
            linhas[r].style.display = "none";
        }
    }

}

$('body').on("click", ".edit", function() {
    
  $('#nomeEditar').val($(this).parents('tr').find('td').eq(1).text());
  $('#emailEditar').val($(this).parents('tr').find('td').eq(2).text());
});