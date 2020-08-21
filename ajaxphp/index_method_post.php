<html>
    <head>
        <title>jQuery post form data using .post() method by codeofaninja.com</title>
         
    </head>
<body>
 
<h1>jQuery post form data using .post() method</h1>
<div>Fill out and submit the form below to get response.</div>
 
<!-- our form -->  
<form id='userForm'>
    <div><input type='text' name='firstname' placeholder='Firstname' /></div>
    <div><input type='text' name='lastname' placeholder='Lastname' /></div>
    <div><input type='text' name='email' placeholder='Email' /></div>
    <div><input type='submit' value='Submit' /></div>
</form>
 
<!-- where the response will be displayed -->
<div id='response'></div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
    $('#userForm').submit(function(){
     
        // show that something is loading
        $('#response').html("<b>Loading response...</b>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.post('post_receiver.php', $(this).serialize(), (data)=>{
             
            // show the response
            $('#response').html(data);
             
        }).fail(()=> {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
 
</body>
</html>