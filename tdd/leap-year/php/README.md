# Leap Years (PHP)

## How to start?

1. composer install
2. composer test

### Acceptance Criteria

1. All years divisible by 400 ARE leap years (so, for example, 2000 was indeed a leap year),
2. All years divisible by 100 but not by 400 are NOT leap years (so, for example, 1700, 1800, and 1900 were NOT leap
   years, NOR will 2100 be a leap year),
3. All years divisible by 4 but not by 100 ARE leap years (e.g., 2008, 2012, 2016),
4. All years not divisible by 4 are NOT leap years (e.g. 2017, 2018, 2019).

### Extra

Once you've completed the previous requirements, here you got some additional behaviour we would like to have:

1. Display the next 10 leap years from the current year.
   Output: `2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060`

2. Calculate which is the 10th leap year starting from the -6 year.
   Output: `32` (Reason: `4, 0, 4, 8, 12, 16, 20, 24, 28, 32`)
