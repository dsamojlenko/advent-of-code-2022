import os

with open(os.path.join(os.path.dirname(__file__), 'input'), 'r') as file:
    inputs = file.read().replace('\n', ' ').split('  ');

def addemup(group):
    return sum(map(int, group.split(' ')))

sums = list(map(addemup, inputs))

# Part 1
print (max(sums))

sums.sort()

# Part 2
print (sum(sums[-3:]))