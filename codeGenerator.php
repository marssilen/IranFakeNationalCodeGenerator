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

 private function checkNationalCode($code)
    {
        if (!preg_match('/^[0-9]{10}$/', $code))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($code, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

echo nationalCodeGenerator();
