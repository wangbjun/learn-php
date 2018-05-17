var index = (function () {
    var cls = function () {
        
    };
    var obj = new cls();

    cls.prototype.what = function () {
        console.log("what?");
    };
    cls.prototype.where = function () {
        console.log("where?");
    };
    return function () {
        obj.what();
    }
})();

console.log(index);
index();
console.log(new index());