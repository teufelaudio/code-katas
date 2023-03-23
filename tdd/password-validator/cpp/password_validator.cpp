#include <algorithm>
#include <iostream>
#include <string>

inline std::string to_lower(std::string str) {
  std::transform(std::begin(str), std::end(str), std::begin(str),
                 [](const std::string::value_type &x) {
                   return std::tolower(x, std::locale());
                 });
  return str;
}

bool validator(std::string input) {
  if (input.size() < 9)
    return false;

  if (input == to_lower(input))
    return false;

  return true;
}
