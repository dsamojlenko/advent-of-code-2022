import os

with open(os.path.join(os.path.dirname(__file__), 'inputs'), 'r') as file:
    inputs = file.read().replace('\n', ' ').split('  ');

def addemup(group):
    #print(group.split(' '))
    return sum(map(int, group.split(' ')))

sums = list(map(addemup, inputs))

print (max(sums))

sums.sort()

print (sum(sums[-3:]))