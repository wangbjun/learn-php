function Person(name, age) {
    this.name = name;
    this.age = age;
}

Person.prototype.hi = function () {
    console.log('Hi, my name is ' + this.name + '\nI am ' + this.age + ' years old now')
};

Person.prototype.LEGS_NUM = 2;
Person.prototype.ARMS_NUM = 2;

Person.prototype.walk = function () {
    console.log(this.name + ' is walking...');
};

function Student(name, age, className) {
    Person.call(this, name, age);
    this.className = className;
}

Student.prototype = Object.create(Person.prototype);
Student.prototype.constructor = Student;

Student.prototype.learn = function () {
    console.log(this.name + ' is learning at '+this.className);
};

let p1 = new Person('James', 25);
console.log(p1.LEGS_NUM);
console.log(p1.ARMS_NUM);
p1.hi();
p1.walk();

let s1 = new Student('Holes', 30, 'Good Class');
console.log(s1.LEGS_NUM);
console.log(s1.ARMS_NUM);
s1.hi();
s1.walk();
s1.learn();