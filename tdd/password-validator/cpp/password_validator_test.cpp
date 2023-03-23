#include <string>
#include <gtest/gtest.h>

bool validator(std::string input);

TEST(LENGTHTEST, TEST8CHARS) {
    EXPECT_EQ(validator("12345678"), false);
}

TEST(LENGTHTEST, TEST9CHARS) {
    EXPECT_EQ(validator("123456789"), true);
}