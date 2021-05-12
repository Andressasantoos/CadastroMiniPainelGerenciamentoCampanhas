$(document).ready( function () {
       
    

       //Função para confirmar antes de apagar registro participante
       $(document).on("click", ".btn-apagar-registro", function(){
        
        if (confirm("Deseja apagar esse participante?")) {
            return true;
        } else{
            return false;
        }

    });

    
       //Função para confirmar antes de apagar registro empresa
       $(document).on("click", ".btn-apagar-empresa", function(){
        
        if (confirm("Deseja apagar essa empresa? a empresa perderá todos os participantes vinculados a ela!")) {
            return true;
        } else{
            return false;
        }

    });

  


    /* Mascara Inputs */
    $('.input_data').mask('00/00/0000');
    $('.input_cep').mask('00000-000');
    $('.input_telefone').mask('(00) 0000-0000');
    $('.input_celular').mask('(00) 00000-0000');
    $('.input_cpf').mask('000.000.000-00');
    $('.input_moeda').mask('#.##0,00', {reverse: true});
   
   
     /* Plugin Data-Table */
    $('.table_listar_data-table').DataTable({
    	"language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ Resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Buscar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    },
    "select": {
        "rows": {
            "_": "Selecionado %d linhas",
            "0": "Nenhuma linha selecionada",
            "1": "Selecionado 1 linha"
        }
    }
}
    });

    document.getElementById('cnpj').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
      });

    $('.sidebar-menu').tree()
} );