<html>
    <head>
        <title>Check and Uncheck All</title>
    </head>
<body>
 
<div style='margin: 10px'><input type='checkbox' id='checker' />Check/Uncheck All</div>
 
    <form action='index.php' method='post'>
        <div style='margin: 10px'>
            <input type='checkbox' name='emotions[]' class='checkboxes' value='Happy' />Happy
            <input type='checkbox' name='emotions[]' class='checkboxes' value='Sad' />Sad
            <input type='checkbox' name='emotions[]' class='checkboxes' value='Excited' />Excited
            <input type='checkbox' name='emotions[]' class='checkboxes' value='Scared' />Scared
        </div>
        <div style='margin: 10px'>
            <input type='hidden' name='action' value='get_values' />
            <input type='submit' value='Submit Selected' />
        </div>
        <div style='margin: 10px'>
        <?php
            //Defining indexes
            empty($_POST['action']) ? $action = '' : $action = $_POST['action'];
            empty($_POST['emotions']) ? $emotions = '' : $emotions = $_POST['emotions'];
            
            if( $action == 'get_values'){
                if(!empty($emotions)){ //check if user ticked any checkbox
                    foreach($emotions as $keys => $values){
                        echo "<div>$values</div>";
                    }
                }else{
                    echo "Please select emotions.";
                }
            }
        ?>
        </div>
    </form>
 
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
    <script type='text/javascript'>
        $("#checker").change(()=> {
            console.log('aqui');
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });

        
        // $(document).ready(()=> {
        //     console.log('Entrou no primeiro if do documento');
        //     $( '#checker' ).click(()=>{
        //         console.log('identificou o checker como id e o click nele');
        //         $( '.checkboxes' ).attr( 'checked', $( this ).is( ':checked' ) );
        //     });
        // });
    </script>
 
</body>
</html>