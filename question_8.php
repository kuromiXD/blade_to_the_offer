<?php
//二叉树(中序)的下一个节点
include_once ('question_7.php');
function NextNode($biTree, $node)
{
    if ($node == null) {
        return false;
    }
    $nextNode = new BiTreeNode();
    $nextNode = null;                                                     //防止该节点的下一节点不存在
    if ($node->right != null) {                                           //如果该节点的右孩子不为空,则下一节点为右孩子的最左节点
        $rightNode = new BiTreeNode();
        $rightNode = $node->right;
        while ($rightNode) {
            $rightNode = $rightNode->left;
        }
        $nextNode = $rightNode;
    } elseif ($node->parent != null) {                                   //如果右孩子为空且它父亲节点不为空同时它又为该父亲节点的左孩子，要么下一节点为其父亲节点
        $curNode = new BiTreeNode();                                     //否则往上遍历到节点非父节点的右孩子节点或父节点为空（根节点）
        $parentNode = new BiTreeNode();
        while ($parentNode->right == $curNode && $parentNode != null) {
            $curNode = $parentNode;
            $parentNode = $curNode->parent;
        }
        $nextNode = $parentNode;
    }

    return $nextNode;
}
$biTree = new BiTree($biTreeNode);
$biTree->findNode($biTree->root, 'i');
print(NextNode($biTree, BiTree::$findNode));

