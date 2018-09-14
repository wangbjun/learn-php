# PHP算法之二叉树

有一点需要说明，一般讲算法是不会用PHP来实现的，而且实际应用中用PHP来实现也木有多大意思，所以这里用PHP实现的意思在于方便大家熟悉，了解其中概念。

如果要讲二叉树，肯定得先讲讲树，这里也不讲了，只讲一点，二叉树是一种特殊的树，这里为什么说是二叉树而不是三叉树呢？看图

这是典型的树结构图：

![](http://ww1.sinaimg.cn/large/5f6e3e27ly1fv8v3f7a7pj20do0asgn6.jpg)

这是典型的二叉树结构图：

![](http://ww1.sinaimg.cn/large/5f6e3e27ly1fv8v3mm7k1j20mu0cqq6u.jpg)

区别就在于二叉树每一个树节点最多只有2个子树，但是树就不一定了，可能有一个子树或者多个子树

不过这个和二叉树相关的概念还很多，什么满二叉树，完全二叉树，平衡二叉树，红黑树...这里也不多说了，想要完全消化估计得花时间多看看算法书了，这里就说个最简单的吧！

这里实现的二叉树其实是二叉排序树, 又称二叉查找树

下面就用PHP来实现一个【二叉排序树】插入，查找，以及遍历操作：

### 1.插入
首先，先定义一个节点，这个节点有4个属性，节点key你可以理解为数组下标，然后是节点数据data，这里面可以存储你想要的数据，然后是一个左节点，一个右节点：
```php
class Node
{
    public $key;

    public $data;

    public $leftNode;

    public $rightNode;

    public function __construct($key, $data)
    {
        $this->key  = $key;
        $this->data = $data;
    }

    public function __toString()
    {
        return $this->key . '--->' . $this->data;
    }
}
```
为了方便，节点的所有属性都是public的，可以直接引用, 下面是树的代码：
```php
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
}
```
这里定义了一个root用来存放根节点，插入操作可以分为几步：
1. 先初始化这个节点的数据
2. 判断根节点是否为空，如果为空，就把当前节点当作根节点，插入结束
3. 如果根节点不为空，那把根节点当作起始节点开始一个递归遍历过程
4. 如果当前的节点的key大于起始节点，那么就把起始节点的右子节点当作起始节点，同时判断起始节点是否为空，如果为空，则说明已经到头了，插入节点

文字描述的不准确，大家结合代码多理解一下

下面写一些代码测试一下：
```php
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
```
可以用xdebug查看一下生成的结构是否正确

![](http://ww1.sinaimg.cn/large/5f6e3e27ly1fv8w7e530aj20cv0k1q3x.jpg)

### 2.查找
二叉树的结构生成了，如果查找呢？查找其实还算简单的，也是从根节点开始递归遍历, 判断根节点的key是否等于需要查找的key，如果不等于判断是大还是获取其子树节点：
`````php
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
`````
### 3.翻转
然后再看看翻转二叉树：
`````php
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
`````
翻转有很多种算法，我这里只写了一个最简单的递归算法，比较容易理解！

### 4.遍历
二叉树遍历又分为前序遍历，中序遍历，以及后序遍历，其实没啥区别，区别就在于 echo 那行输出节点的代码位置，这里用的还是递归算法：
`````php
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
`````