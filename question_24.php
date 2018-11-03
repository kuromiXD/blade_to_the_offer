<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-10-30
 * Time: 下午3:45
 */

require "../DataStruct/Node.php";
require "../DataStruct/LinkList.php";
$linkList = new LinkList(1);
$linkList->AddLinkListInTail(2);
$linkList->AddLinkListInTail(11);
$linkList->AddLinkListInTail(3);
$linkList->ReverseLinkList();
print_r($linkList);