/*
let o = {
    // Old way
    oldDoSthAfterThree: function () {
        let that = this;
        console.log(this)
        setTimeout(function () {
            console.log(this) // Window
            console.log(that) // o
        })
    },
    // Arrow function way
    doSthAfterThree: function () {
        setTimeout(() => {
            console.log(this) // o
        }, 3000)
    }
}
o.doSthAfterThree();
*/
/*
let course = {
    name: 'JS Fundamentals for Frontend Developers'
}

let { a } = course

console.log(a) // full course

function sayMyName ({
                        firstName = 'Zell',
                        lastName = 'Liew'
                    } = {}) {
    console.log(firstName + ' ' + lastName)
}
sayMyName() // Zell Liew
sayMyName({firstName: 'Zell'}) // Zell Liew
sayMyName({firstName: 'Vincy', lastName: 'Zhang'}) // Vincy Zhang

const fullName = 'Zell Liew'

// ES6 way
const Zell = {
    fullName
}
*/
/*const animal = 'lamb'
aaab = "test";
// This a tag
const tagFunction = (str, ps,asp) => {
    console.log(str)
    console.log(ps)
    console.log(asp)
    return "ok"
}

// This tagFunction allows you to manipulate the template literal.
const output = tagFunction `Mary ${animal} had a little  ${aaab}`
console.log(output)*/

//lastNameCaps.call(s);

///s.lastNameCaps = lastNameCaps;
//lastNameCaps();
/*
x = adder(10);
console.log(x(5))

function adder(a) {
    return function (b) {
        console.log(a)
        console.log(b)
        return a+b;
    }
}

function test1(){
    var te  = {};
    te.onAction = function () {

        console.log(this.onAction);
    }
    te.onAction();
}
test1();
const Person = function () {
    return {
        firstName : "Park",
        lastName : "Juhoon",
        getName : function (){
            return this;
        },
        obj : {
            firstobj : "first"
        }
    };
};
p1 = new Person();
p2 = new Person();
p1.firstName = "kim";

console.log(p1.firstName)
console.log(p2.firstName)
function Person2 () {
    return {
        firstName : "Park",
        lastName : "Juhoon",
        getName : function (){
            return this;
        },
        obj : {
            firstobj : "first"
        }
    };
};
a1 = new Person2();
a2 = new Person2();
a1.firstName = "ju";
a1.obj.firstobj = "ju";
console.log(a1)
console.log(a2)


person3 = {
    firstName: "park",
    name: "juhoon",
    hobby: "skateboard"
};

var pp1 = new Object(person3);
var pp2 = new Object(person3);

console.log(pp1.__proto__);



function TestFunc () {
    this.name = {
        firstname : function(){
            return "first";
        },
        middleName : "MIDDLE",
        ajob : function (){
            return this;
        }
    };
    this.job = this;
    this.age = "no age";
    console.log(this)

}

var test = new TestFunc();
console.log(test.ab)

*/
function Person(first, last, age, gender, interests) {
    this.name = {
        'first': first,
        'last' : last
    };
    this.age = age;
    this.gender = gender;
    this.interests = interests;
    this.bio = function() {
        alert(this.name.first + ' ' + this.name.last + ' is ' + this.age + ' years old. He likes ' + this.interests[0] + ' and ' + this.interests[1] + '.');
    };
    this.greeting = function() {
        alert('Hi! I\'m ' + this.name.first + '.');
    };
}

function Teacher(first, last, age, gender, interests,subject) {
    Person.call(this,first, last, age, gender, interests);
    this.subject = subject;
}
var person1 = new Teacher('Bob', 'Smith', 32, 'male', ['music', 'skiing'],"history");

//console.log(Object.getOwnPropertyNames(Person.prototype))

function testMethod(...ag) {
    console.log(ag)
}

testMethod();

var SomeService = function(...args) {
    var el;
    var i;
    test = 1;
    for (i = 0, len = args.length; i < len ; i ++) {
        el = args[i];
        this.member1 = el;
    }

    this.member1 = "mem1";
    this.member2 = "mem2";
    member1 = "member";
    this.init = function () {
        console.log(member1)
        console.log(this.member1)
    };
    this.second = function () {
        return this;
    };
    this.init();
}
s = new SomeService("a","b","c");


function service2 () {
    var name = "name1";
    function getName() {
        return name;
    }
    return getName();
}
var makeCounter = function() {
    var privateCounter = 0;
    function changeBy(val) {
        privateCounter += val;
    }
    return {
        increment: function() {
            changeBy(1);
        },
        decrement: function() {
            changeBy(-1);
        },
        value: function() {
            return privateCounter;
        }
    }
};


var counter1 = makeCounter();
var counter2 = makeCounter();
console.log(counter1.value()); /* 0 */
counter1.increment();
counter1.increment();
console.log(counter1.value()); /* 2 */
console.log(counter2.value()); /* 0 */

