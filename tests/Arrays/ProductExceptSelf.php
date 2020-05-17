<?php declare(strict_types = 1);

namespace Tests\Arrays;

class ProductExceptSelf
{
    public function productExceptSelf(array $nums): array
    {
        $product = null;
        $zeroes = 0;
        foreach ($nums as $i => $num) {
            if ($num !== 0) {
                $product = ($product ?? 1) * $num;
            } else {
                $zeroes++;
                if ($zeroes > 1) {
                    $product = 0;
                    break;
                }
            }
        }

        return array_map(function ($num) use ($product, $zeroes) {
            if ($num == 0) return $product;
            if ($num != 0 && $zeroes > 0) return 0;

            return intval($product * pow($num, -1));
        }, $nums);
    }
}