<?php
function cutString($string, $keyword, $num)
{
    $pos = mb_strpos($string, $keyword);
    if ($pos >= 100) {
        return mb_substr($string, $pos-20, $num, 'UTF-8');
    } else {
        return $string;
    }
}

$string = "该报告的研究涵盖159个国家，其中提到，在美国和欧洲针对难民的仇视性言论加剧
其带来的影响就是令世界出现更多针对种族和性别的攻击。该报告批评一些过去曾经以帮助他国捍卫
人权为己任的国家，现在自己国内的人权状况却在倒退。“很多领导人不是为人民的权力而斗争
而是采取了一种非人性化的手段谋取眼前的政治资本，”国际特赦组织秘书长萨利尔·赛迪在一份声明中说。
“对于什么事是可以接受的，它的界限已经改变了。政客们正在毫不羞耻并且积极地将一切
针对人们身份认同的仇恨性言论和政策合理化：仇视女性、种族主义以及仇视同性恋";
$keyword = '政客';
$num = 50;
var_dump(cutString($string, $keyword, $num));
