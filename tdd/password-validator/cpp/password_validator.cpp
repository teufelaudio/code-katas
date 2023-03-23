#include <algorithm>
#include <cctype>
#include <iostream>
#include <string>

// do something to a string
inline std::string do_to_string(std::string str, int (*fn)(int)) {
  std::transform(std::begin(str), std::end(str), std::begin(str),
                 [&](const std::string::value_type &x) { return fn(x); });
  return str;
}

bool validator(std::string input) {
  if (input.size() < 9)
    return false;

  if (input == do_to_string(input, std::tolower))
    return false;

  if (input == do_to_string(input, std::toupper))
    return false;

  if (std::find_if(input.begin(), input.end(), ::isdigit) == input.end())
    return false;

  if (input.find('_') == std::string::npos)
    return false;

  return true;
}
