<?php
function nationalCodeGenerator()
{
    $nationalCode = "";
    $sum = 0;
    for ($i = 10; $i >= 2; $i--) {
        $j = random_int(0, 9);
        $nationalCode .= $j;
        $sum += $j * $i;
    }
    $m = $sum % 11;
    if ($m < 2) {
        $nationalCode .= $m;
    } elseif ($m >= 2) {
        $nationalCode .= 11 - $m;
    }
    return $nationalCode;
}
echo nationalCodeGenerator();
