#include <string>
#include <gtest/gtest.h>

bool kata_main(std::string input);

TEST(VALIDATEFRAMEWORK, DOESTHEKATAWORK) {
    bool ret = kata_main("THIS IS A STRING");
    // Yay it compiles and runs
    EXPECT_EQ(0, ret);
}