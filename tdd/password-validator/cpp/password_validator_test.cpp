#include <gtest/gtest.h>
#include <string>

bool validator(std::string input);

TEST(HAPPYPATH, HAPPYPATH) { EXPECT_EQ(validator("Aa9_12345"), true); }

TEST(LENGTHTEST, TEST8CHARS) { EXPECT_EQ(validator("Aa9_1234"), false); }

TEST(CAPITALTEST, NOCAPITAL) { EXPECT_EQ(validator("aa9_12345"), false); }

TEST(CAPITALTEST, NOLOWERCASE) { EXPECT_EQ(validator("AA9_12345"), false); }

TEST(CAPITALTEST, NONUMBER) { EXPECT_EQ(validator("AAa_teest"), false); }

TEST(CAPITALTEST, NOUNDERSCORE) { EXPECT_EQ(validator("AA9a12345"), false); }