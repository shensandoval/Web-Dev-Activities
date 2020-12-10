<?php

    if(isset($_GET['submit'])){
        
        $height = $_GET['hg'];
        $weight = $_GET['wg'];

        function calc_bmi($height, $weight)
        {

            $total_bmi = @($weight / ($height / 100) ** 2);
            return $total_bmi;
        }
        $total_bmi = calc_bmi($height, $weight);

        if ($total_bmi < 18.5) {
            $category = "Underweight";
        } elseif ($total_bmi >= 18.5 and $total_bmi <= 24.9) {
            $category = "Normal weight";
        } elseif ($total_bmi >= 25 and $total_bmi <= 29.9) {
            $category = "Overweight";
        } elseif ($total_bmi >= 30) {
            $category = "Obese";
        }

        $format_decimal = number_format($total_bmi, 1, '.', '');

        echo "<p style='color: red;font-size: 20px; padding: 2%; border: 2px solid black; width: 15%;'>" . "BMI: " . $format_decimal ."<br>";
        echo "<br>" . "You are " . $category . "</p>" . "";
    }else {
        echo "You have entered nothing, please try again.";
  }
    ?>
