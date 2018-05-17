var str = "string";
var strObj = new String("string");
console.log(str);
console.log(strObj);
console.log(str.length);
var a = new Number(2);
var xyz = function (x, y) {
    this.x = x;
    this.y = y;

    this.say = function () {
        console.log(this.x + '->' + this.y);
    }
};

class student{
    constructor(name){
        this.name = name;
    }
}


stu = new student('Jun');

abc = new xyz(1, 6);
console.log(abc);
abc.say();
