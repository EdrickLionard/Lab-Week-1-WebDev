<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Pyramid</title>
</head>
<body>

    <h2>Palindrome Pyramid</h2>
    
    <form method="POST">
        <label for="number">Masukkan angka apapun itu :</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Generate">
    </form>

    <br>

    <?php
    // Check if the form has been submitted using POST method
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input number from user
        $inputNumber = intval($_POST['number']);
        
        // Function to generate palindrome pyramid
        function generatePalindromePyramid($number) {
            echo "<pre>"; // Preserve formatting
            for ($i = 1; $i <= $number; $i++) {
                // Print spaces for pyramid shape
                for ($j = $number - $i; $j > 0; $j--) {
                    echo "  "; // Double spaces for formatting
                }

                // Print first half of the palindrome
                for ($j = 1; $j <= $i; $j++) {
                    echo $j . " ";
                }

                // Print second half of the palindrome
                for ($j = $i - 1; $j > 0; $j--) {
                    echo $j . " ";
                }

                echo "\n";
            }
            echo "</pre>";
        }

        // Generate the pyramid with the user's input
        generatePalindromePyramid($inputNumber);
    }
    ?>

</body>
</html>
