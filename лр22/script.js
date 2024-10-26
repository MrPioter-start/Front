let str = "ahb acb aeb aeeb adcb",
  check = /a.b/g;
console.log(str.match(check));
let str2 = "aba aca aea abba adca abea",
  check2 = /a..a/g;
console.log(str2.match(check2));
let str3 = "aba aca aea abba adca abea",
  check3 = /a.[^c]a/g;
console.log(str3.match(check3).filter((x) => x.length === 4));
let str4 = "a.a aba aea",
  check4 = /a\.a/g;
console.log;
console.log(str4.match(check4));
let str5 = "2+3 223 2223",
  check5 = /2\+3/g;
console.log(str5.match(check5));
let str6 = "23 2+3 2++3 2+++3 345 567",
  check6 = /2\+{1,}3/g;
console.log(str6.match(check6));
let str7 = "23 2+3 2++3 2+++3 345 567",
  check7 = /2\+{0,}3/g;
console.log(str7.match(check7));
