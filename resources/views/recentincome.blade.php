<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-5">Expense Tracker HomePAge</h1>

<button type="button" class="btn btn-primary"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        <a class="text-dark" href="{{'/index'}}">Overall Income Page</a>

</button>


     <div class="container">
        <table class="table table-striped" id="dataTable">
           <thead>
            <tr>

                <th>Total Amount</th>

            </tr>
           </thead>
           <tbody>
                <!-- Table body will be filled dynamically -->
            </tbody>

        </table>
     </div>

    <script>
       $(document).ready(function() {
    $.ajax({
        url: 'last5income',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // Clear existing table body
            $('#dataTable tbody').empty();
            if (data.hasOwnProperty('income')) { // Checking if the 'sum' key exists in the response
                $.each(data.income, function(index, item) {
                    $('#dataTable tbody').append('<tr><td>' + item.Title +   '</td><td>' + item.Type + '</td><td>' + item.Amount + '</td></tr>');
                    // Add more cells as needed for additional data
                });
                // Add more cells as needed for additional data
            } else {
                console.error('No sum data found');
            }

        },
        error: function(xhr, status, error) {
            // If there's an error during the AJAX request, handle it here
            console.error(xhr.responseText); // Log the error message
        }
    });
});

    </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
