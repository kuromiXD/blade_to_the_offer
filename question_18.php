<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-10-29
 * Time: 下午2:37
 */

include_once "../DataStruct/Node.php";
include_once "../DataStruct/LinkList.php";

function DelNode(&$linkList, $node)
{
    if ($linkList == null || $node == null)
        return false;

    if ($linkList->head == $node)
        $linkList->head = $linkList->head->next;
    elseif ($node->next != null) {
        $linkList->DelNodeBydata($node->data);
    } else {
        $preNode = $linkList->head;
        $pNode = $preNode->next;
        while ($pNode->next != null) {
            $preNode = $pNode;
            $pNode = $pNode->next;
        }
        $preNode->next = null;
    }
}

$linkList = new LinkList(1);
$linkList->DelNodeBydata(1);
print_r($linkList);