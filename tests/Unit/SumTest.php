<?php

function sum(...$values)
{
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }

    return $sum;
}

it('performs sums', function () {
    $result = sum(1, 2);

    expect($result)->toBe(3);
});
