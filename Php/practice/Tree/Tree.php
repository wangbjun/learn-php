<?php

require_once 'Node.php';

class Tree
{
    /**
     * @var Node
     */
    public $root = null;

    /**
     * 插入
     * @param $key
     * @param $data
     */
    public function insert($key, $data)
    {
        $node = new Node($key, $data);

        if ($this->root == null) {
            $this->root = $node;
        } else {
            $current = $this->root;
            $parent  = null;
            while (true) {
                $parent = $current;
                // 如果数字比当前节点小，则存左边
                if ($key < $current->key) {
                    $current = $current->leftNode;
                    if ($current == null) {
                        $parent->leftNode = $node;
                        return;
                    }
                } else {
                    $current = $current->rightNode;
                    if ($current == null) {
                        $parent->rightNode = $node;
                        return;
                    }
                }
            }
        }
    }

    /**
     * 查找
     * @param $key
     * @return Node|null
     */
    public function find($key)
    {
        $current = $this->root;
        while ($key != $current->key) {
            if ($key > $current->key) {
                $current = $current->rightNode;
            } else {
                $current = $current->leftNode;
            }
            if ($current == null) {
                return null;
            }
        }

        return $current;
    }

    /**
     * 求树的最值
     */
    public function mVal(): array
    {
        $minNode = null;
        $maxNode = null;

        $current = $this->root;
        while ($current != null) {
            $maxNode = $current;
            $current = $current->rightNode;
        }

        $current = $this->root;
        while ($current != null) {
            $minNode = $current;
            $current = $current->leftNode;
        }

        return ['minNode' => $minNode, 'maxNode' => $maxNode];
    }

    /**
     * 反转二叉树
     * @param Node $root
     * @return null
     */
    public function inverse($root)
    {
        if ($root == null) {
            return null;
        }
        $tmp = $root->leftNode;

        $root->leftNode  = $this->inverse($root->rightNode);
        $root->rightNode = $this->inverse($tmp);

        return $root;
    }

    /**
     * 前序遍历算法
     * @param $node
     */
    public function preOrderTraverse($node)
    {
        if ($node == null) {
            return;
        }
        echo $node->key . '--->' . $node->data . "\n";
        $this->preOrderTraverse($node->leftNode);
        $this->preOrderTraverse($node->rightNode);
    }
}


$tree = new Tree();
$tree->insert(56, 'AbC');
$tree->insert(16, 'Jack');
$tree->insert(6, 'Baby');
$tree->insert(61, 'Luck');
$tree->insert(180, 'Ketty');
$tree->insert(69, 'LA');
$tree->insert(51, 'Buck');
$tree->insert(47, 'Jun');
$tree->insert(25, 'Hello');
$tree->insert(5, 'Name');
$tree->insert(23, 'Data');
$tree->insert(18, 'Where');


//$res  = $tree->find(16);
//$mVal = $tree->mVal();
//var_dump($res);
//var_dump($mVal);
//
//$tree->inverse($tree->root);
//var_dump($tree);

$tree->preOrderTraverse($tree->root);
