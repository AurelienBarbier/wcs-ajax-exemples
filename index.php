<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Hello, jQuery !</title>
</head>
<body>
<div class="container">
    <h1>Hello, <strong id="target"><?= $_GET['msg'] ?? 'you'; ?></strong> !</h1>
    <form action="treatment.php" method="post">
        <div class="form-group">
            <label for="exampleInputFirstName">Your first name</label>
            <input type="firstName" name="firstName" class="form-control" id="exampleInputFirstName" aria-describedby="firstNameHelp" placeholder="Enter firstName">
            <small id="firstNameHelp" class="form-text text-muted">We'll never share your firstName with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputLastName">LastName address</label>
            <input type="lastName" name="lastName" class="form-control" id="exampleInputLastName" aria-describedby="lastNameHelp" placeholder="Enter lastName">
            <small id="lastNameHelp" class="form-text text-muted">We'll never share your lastName with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary jquery">Submit</button>
    </form>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>

        $('form').submit(function(event){
            event.preventDefault();

            /* JQuery Ajax Version :
            $.ajax({
                url: $(this).attr('action'),
                context: document.body,
                dataType: 'json',
                method : $(this).attr('method').toUpperCase(),
                data : {
                    'firstName' : $('#exampleInputFirstName').val(),
                    'lastName' : $('#exampleInputLastName').val(),
                }
            }).done(function(result) {
                $('#target').text(result.msg);
            }).fail(function(){
                alert('broken');
            });
            //END Jquery version */


            // Fetch version
            fetch($(this).attr('action'), {
                method : $(this).attr('method').toUpperCase(),
                body : new FormData(this)
                ,
            })
                .then(result => result.json())
                .then(json => $('#target').text(json.msg))
                .catch(() => alert('broken'));
            //END Fetch version
        })
    </script>
</body>
</html>