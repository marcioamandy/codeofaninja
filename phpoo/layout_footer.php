</div>
    <!-- /container -->
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- bootbox library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    
    <script>
    // JavaScript for deleting product
    // Identifica se o botão de delete da grade foi acionado.
    $(document).on('click', '.delete-object', ()=>{
    
        var id = $(this).attr('delete-id');
    
        bootbox.confirm({
            message: "<h4>Tem certeza que quer deletar o item?</h4>",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> No',
                    className: 'btn-primary'
                }
            },
            callback: (result)=> {
    
                if(result===true){
                    $.post('delete_product.php', {
                        object_id: id
                    }, (data)=>{
                        location.reload();
                    }).fail(()=> {
                        alert('Falha ao deletar.');
                    });
                }
            }
        });
    
        return false;
    });

    // habilita e desabilita todos os checkbox da grade
    $("#checkTodos").change(()=> {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    // Verifica se o botão de deletar todos os selecionados foi clicado
     $(document).on('click', '#removeall', ()=>{
    
        bootbox.confirm({
             message: "<h4>Tem certeza que deseja remover os itens selecionados?</h4>",
             buttons: {
                 confirm: {
                     label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                     className: 'btn-danger'
                 },
                 cancel: {
                     label: '<span class="glyphicon glyphicon-remove"></span> No',
                     className: 'btn-primary'
                 }
             },
             callback: (result)=> {

                 if(result===true){
                     $.post('delete_product.php?s=all', (data)=>{
                         location.reload();
                     }).fail(()=> {
                         alert('Falha ao deletar.');
                     });
                 }
             }
         });

         return false;
     });

    </script>
</body>
</html>