# Word wrap kata

## What do we want to build?

### Part 1:

We want to create a service to format a string, so it wraps after a given number of characters (column width). 

The input will not contain any newlines. The output will contain newlines where wrapping is applied.

Rules: 
1. Newlines to create wrapping should be added by replacing whitespace, eg between words
2. There should be as many words as possible per line before wrapping
2. If a single word is bigger than the column width, it should be wrapped with a hyphen character before the wrap 
3. If a single word is split into more than 2 lines, there should be a hyphen on each split.

#### Example1, with a column width of 8:

```
The cat sat on the mat.
```

_is converted to_

```
The cat
sat on
the mat.
```

#### Example2, with a column width of 8:

```
supercalifragilisticexpialidocious
```

_is converted to_

```
superca-
lifragi-
listice-
xpialid-
ocious
```

### Part 2:

Still got time to spare?

Change your service to accept a `row height` parameter. If the output exceeds the number of rows it should be truncated
with an elipsis (...) applied to show it is truncated.

#### Example1, with a column width of 8 and row height of 2:

```
The cat sat on the mat.
```

_is converted to_

```
The cat
sat o...
```

#### Example2, with a limit of 8 columns and 4 rows

```
supercalifragilisticexpialidocious
```

_is converted to_

```
superca-
lifragi-
listice-
xpial...
```


## What do we try to work out with this kata?

Please use strict TDD for this:

- DO NOT write any code until you have a failing test
- DO NOT refactor until you have a passing test
