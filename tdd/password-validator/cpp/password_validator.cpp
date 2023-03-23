#include <algorithm>
#include <cctype>
#include <iostream>
#include <string>

// do something to a string
inline std::string do_to_string(std::string str, const auto& fn) {
  std::transform(std::begin(str), std::end(str), std::begin(str),
                 [&](const std::string::value_type &x) {
                   return fn(x);
                 });
  return str;
}

bool validator(std::string input) {
  if (input.size() < 9)
    return false;

  if (input == do_to_string(input, [](auto x){return std::tolower(x);}))
    return false;

  if (input == do_to_string(input, [](auto x){return std::toupper(x);}))
    return false;

  if (std::find_if(input.begin(), input.end(), ::isdigit) == input.end())
    return false;

  return true;
}
