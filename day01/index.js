const fs = require("fs");
const path = require("path");

const inputs = fs.readFileSync(path.resolve(__dirname, './inputs'), 'utf-8').replace(/\n/g, ' ').split('  ');

const sums = inputs.map(input => {
    const numbers = input.split(' ').map(Number);
    return numbers.reduce((a, b) => a + b, 0);
});

console.log(Math.max(...sums));

sums.sort((a, b) => a - b);

console.log(sums.slice(-3).reduce((a, b) => a + b, 0));