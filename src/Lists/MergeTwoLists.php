<?php declare(strict_types = 1);

namespace App\Lists;

class MergeTwoLists
{
    function mergeTwoLists(
        ?ListNode $l1,
        ?ListNode $l2
    ): ?ListNode {

        if ($l1 === null && $l2 === null) {
            return null;
        }

        /** @var ListNode $merged */
        $merged = null;
        /** @var ListNode $merged */
        $last = null;

        $continue = $l1 !== null || $l2 !== null;
        while ($continue) {

            if (($l1->val ?? PHP_INT_MAX) < ($l2->val ?? PHP_INT_MAX)) {
                $next = $l1;
                $l1 = $l1->next ?? null;
            } else {
                $next = $l2;
                $l2 = $l2->next ?? null;
            }

            if ($merged === null) {
                $merged = $next;
            }

            if ($last !== null) {
                $last->next = $next;
            }

            $last = $next;
            $continue = $last !== null;
        }

        return $merged;
    }
}