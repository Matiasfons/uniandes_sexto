<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mb-3">
                    <label for="number" class="form-label">Ingresa el número para generar el factorial</label>
                    <input type="number" class="form-control" id="number">
                </div>
                <button class="btn btn-primary">Generar</button>
                <h2 class="mt-4">Resultado:</h2>
                <div id="result"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('button').addEventListener('click', async function() {
            let number = document.querySelector('#number').value;
            const data = {
                initialNumber: number
            };
            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };

            const response = await fetch(`function.php?numero=${number}`, requestOptions);
            let finalResult = await response.text();
            document.querySelector('#result').innerHTML = finalResult;
        })
    </script>
</body>

</html>
