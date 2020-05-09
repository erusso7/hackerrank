<?php declare(strict_types = 1);

namespace App\Lists;


class SumNumbers
{
    function addTwoNumbers(?ListNode $l1, ?ListNode $l2)
    {
        $result = null;
        $last = null;
        $carry = 0;
        $adding = !is_null($l1) || !is_null($l2);
        while ($adding) {
            $sum = $carry + ($l1->val ?? 0) + ($l2->val ?? 0);
            $carry = (int)($sum / 10);
            $sum = $sum % 10;

            $newNode = new ListNode($sum);
            if ($result === null) {
                $result = $newNode;
            }

            if ($last === null) {
                $last = $newNode;
            } else {
                $last->next = $newNode;
                $last = $newNode;
            }

            $l1 = $l1->next ?? null;
            $l2 = $l2->next ?? null;
            $adding = !is_null($l1) || !is_null($l2);
        }

        if ($carry !== 0) {
            $last->next = new ListNode($carry);
        }

        return $result;
    }
}
