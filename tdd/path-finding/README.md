# Path finding kata

## What do we want to build?

Our friends are lost in the cold wilderness, and all we know is their map co-ordinates plus the co-ordinates of the 
nearest safe place for them to shelter for the night.

Our map co-ordinates use the bottom left as the origin, so if point A is (0,0) and point B is (5,5) then the map would
be like this:

```
5 .....B
4 ......
3 ......
2 ......
1 ......
0 A.....
  012345
```

Like helpful developers we decide to make a navigation service to give them directions to guide them to safety. 

The service will take their current location plus the nearest safe coordinate. It will then return a set of instructions 
using the compass directions N,S,W,E

Examples:

```
Current location:   (0,0)
Nearest safe place: (3,0)

Output: EEE


Current location:   (0,0)
Nearest safe place: (1,1)

Output: EN


Current location:   (0,0)
Nearest safe place: (-2,-4)

Output: WWSSSS


Current location:   (1,2)
Nearest safe place: (0,3)

Output: WN
```


## What do we try to work out with this kata?

Please use strict TDD for this:

- DO NOT write any code until you have a failing test
- DO NOT refactor until you have a passing test

## Too easy? Want something more tricky?

### Level 2

Provide a map output to show your directions on a map:
- axis markings are not required
- "S" shows the start point
- "E" shows the end point
- "*" shows the route
- "." is empty space"

Example:
```
Current location:   (6,2)
Nearest safe place: (1,9)

Output: WWWWWNNNNNNN 

E.....
*.....
*.....
*.....
*.....
*.....
*.....
*****S
```

### Level 3

Our examples provide "Manhattan distance" directions which travel all the way across one axis and then all the way along
the next.

Change your path finder to give the diagonal path instead, but still possible to travel using the NSWE directions.

Example (You do not need to follow this exactly, you can decide your own strategy for a diagonal):
```
Current location:   (6,8)
Nearest safe place: (1,2)

Output: SWSWSSWWSWS
 
.....S
....**
...**.
...*..
.***..
**....
E.....
```
