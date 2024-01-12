# Do the shuffle (that famous dance move)

## What do we want to build?

### Part 1:

We want some code to shuffle the order of a given array. For example if we provide [1,2,3] we might get back [2,3,1]

### Part 2:

We want to take the output of part 1 and distribute it into a number of output arrays to form groups.

For example if we provide [1,2,3,4,5,6] and request 3 groups we might get back [[3,6],[2,5],[4,1]]

If the input array cannot be distributed evenly (eg groups requested does not perfectly divide into the count of the 
input array) then some groups will be bigger than others. This should still be randomly distributed. You should not 
assume that the first groups will pick up the extra.

Example: [1,2,3,4,5,6,7] and request 3 groups might be [[3,6],[2,5,7],[4,1]]

## What do we try to work out with this kata?

We should use strict TDD for this, eg 
- do not write any code until you have a failing test
- do not refactor until you have a passing test

Spoiler alert: You WILL need to use test doubles to handle random numbers ;-)
