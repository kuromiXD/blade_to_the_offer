<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-12
 * Time: 上午10:56
 */
//重建二叉树
//通过前序遍历序列和后序遍历序列查找
include_once("BiTreeNode.php");
function CreateBITree($preOrder, $inOrder)
{
    $biTreeNode = new BiTreeNode();
    if (empty($preOrder) || empty($inOrder)) {
        return -1;
    }
    $biTreeNode->value = $preOrder[0];
    $biTreeNode->left = null;
    $biTreeNode->right = null;
    $inleft = array();
    $inright = array();
    $preleft = array();
    $preright = array();
    for ($i = 0; $i < count($inOrder); $i++) {
        if ($inOrder[$i] == $preOrder[0]) {
            break;
        }
    }
    if ($i == count($inOrder)) {
        return -1;
    }
    for ($j = 0; $j < $i; $j++)
        $inleft[] = $inOrder[$j];
    for ($k = $i+1; $k < count($preOrder); $k++)
        $inright[] = $inOrder[$k];
    for ($p = 1; $p <= count($inleft); $p++) {
        $preleft[] = $preOrder[$p];
    }
    for ($q = $p; $q < count($preOrder); $q++) {
        $preright[] = $preOrder[$q];
    }

    if ($preleft != array() ||  $inleft != array())
        $biTreeNode->left = CreateBITree($preleft, $inleft);
    if ($preright != array() || $inright != array())
        $biTreeNode->right = CreateBITree($preright, $inright);

    return $biTreeNode;
}

$biTreeNode = CreateBITree(array(1,2,3,4,5),array(5,4,3,2,1));

