const fs = require("fs");
const path = require("path");

const input = fs.readFileSync(path.resolve(__dirname, "./input"), "utf-8");

for (let i = 0; i < input.length; i++) {
  if ([...new Set(input.substring(i, i + 4))].length === 4) {
    console.log(i + 4);
    break;
  }
}

for (let i = 0; i < input.length; i++) {
  if ([...new Set(input.substring(i, i + 14))].length === 14) {
    console.log(i + 14);
    break;
  }
}
