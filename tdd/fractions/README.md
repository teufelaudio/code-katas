# Fractions Kata

![](https://i.imgur.com/6SVdqjG.png)

Our program will take as data input a text string with the following format:

```
{3/2}+{4/4}/{2/3}
```

Given an input such as `{3/2} + {4/4} / {2/3}`, an output of `3` is expected.

Our software should have resolved the operations between the fractions depending on the priority of the operation or the parentheses and return us the final result of the operation.

# Definition of requirements

## Fraction format

A fraction begins with `{` and ends with `}`. The **numerator** is separated from the **denominator** by `/`.

Both the numerator and denominator are integers that can have a `-` prefix to define them as negative numbers.

- Input: `{9/12}`  represents the following fraction `9/12`.
- Input: `{-9/12}` represents the following fraction `-9/12`.
- Input: `{9/-12}` represents the following fraction `9/-12`.

## Valid fraction operators

The valid operators for this kata are:

- `+` Addition
- `-` Subtraction
- `*` Multiplication
- `/` Divide

The fractions must be able to carry out the list of previous operations. Any other operator is considered an invalid
operator, and it should not be possible to perform any of the operations

## Examples of use cases

- Sum of fractions: `{3/2} + {4/4}`
- Subtraction of fractions: `{3/2} - {4/4}`
- Multiplication of fractions: `{3/2} * {4/4}`
- Division of fractions: `{3/2} / {4/4}`

## Examples of multiple operations

This would be an example of how an input with multiple operations would be solved:

```
{3/2}+{4/4}/{2/3}
```

👁️ If the operation does not have parentheses we have to prioritize, according to operators, in case of having
parentheses, first the parentheses have to be solved and then whatever there is.

**Example of how it would be solved**
```
{3/2}+{4/4}/{2/3}
```
**First step**
```
{4/4}/{2/3}
```

**Second step**
```
{3/2}+RESULT_FROM_FIRST_OPERATION
```

## The command or fractions may be wrong

The commands that we find may be invalid, in these cases the fraction would not be processed

```
'' // Fracción vacía
{
}
{}
({})
({a/a})
{a/a}
{a3/a3}
{3a/3a}
{03/3a}
{a3/03}
{a3/0}
{0/0a}
{0/a0}
{0/0}
{0/3}
{-3/0}
{-1/-2}
{-01/-02}
 { 1 / -2 }
 {1/-2} {1/-2} 
{1/-2}{1/-2}
{1/-2} {1/-2}
1/-2
1/2
12
{1/-3-3}
{-1-1/3}
{}+{}
```
