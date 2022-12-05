const fs = require("fs");
const path = require("path");

const inputs = fs
  .readFileSync(path.resolve(__dirname, "./inputs"), "utf-8")
  .split("\n");

const points = {
  "B X": 1,
  "C Y": 2,
  "A Z": 3,
  "A X": 4,
  "B Y": 5,
  "C Z": 6,
  "C X": 7,
  "A Y": 8,
  "B Z": 9,
};

let totalPoints = 0;

inputs.forEach((match) => {
  totalPoints = totalPoints + points[match];
});

console.log(totalPoints);

const points2 = {
  "B X": 1,
  "C X": 2,
  "A X": 3,
  "A Y": 4,
  "B Y": 5,
  "C Y": 6,
  "C Z": 7,
  "A Z": 8,
  "B Z": 9,
};

totalPoints = 0;

inputs.forEach((match) => {
  totalPoints = totalPoints + points2[match];
});

console.log(totalPoints);
