<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <h1>search PAge</h1>

    <form class="row g-3" id="myForm" method="post" action="filter">
    <div class="col-auto">
            <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="Title">
    </div>
    <div class="col-auto">
            <input class="form-check-input" type="radio" name="Type[]" id="flexRadioDefault1" value="income">
            <label class="form-check-label" for="flexRadioDefault1"> Income</label>
    </div>
    <div class="col-auto">
        <input class="form-check-input" type="radio" name="Type[]" id="flexRadioDefault1" value="expense">
        <label class="form-check-label" for="flexRadioDefault1"> Expense</label>
    </div>

     <div class="col-auto">
                    <label for="exampleInputEmail1" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" name="start_date" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">End Date:</label>
        <input type="date" class="form-control" name="end_date" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Search</button>
    </div>
</form>

<div  id="display"></div>

<script>
    $(document).ready(function(){
    $('#myForm').submit(function(e){
        e.preventDefault();
        const formData = $(this).serialize();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
            },
            success: function(response){
                if (response.data && response.data.length > 0) {
                    console.log(response.data);

                    let searchdata=response['data'];

                    let display='<div>';
                        searchdata.forEach(function(userform){
    display += 'User ID: ' + userform.id + ', Title: ' + userform.Title + ', Type: ' + userform.Type + ', Start Date: ' + userform.created_at + ', End Date: ' + userform.end_date + '<br>';
});

                    display+='</div>';
                    $('#display').html(display);

                } else if (response.error) {
                    console.log(response.error); // Handle error message
                }
            },
            error: function(xhr, status, error) {
                console.log("Error occurred:", error); // Log any AJAX errors
            }
        });
    });
});


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
