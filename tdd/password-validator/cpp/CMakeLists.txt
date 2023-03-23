
cmake_minimum_required(VERSION 3.11)
project(Teufel-Kata)

set(gtest_force_shared_crt ON CACHE BOOL "" FORCE)
include(FetchContent)

FetchContent_Declare(
        googletest
        GIT_REPOSITORY https://github.com/google/googletest.git
        GIT_TAG        release-1.10.0
        GIT_SHALLOW    1
)

FetchContent_GetProperties(googletest)
if(NOT googletest_POPULATED)
    FetchContent_Populate(googletest)
    add_subdirectory(${googletest_SOURCE_DIR} ${googletest_BINARY_DIR})
endif()

include(GoogleTest)
enable_testing()
target_compile_options(gtest PRIVATE "-w")

add_executable(password_validator_test password_validator_test.cpp password_validator.cpp)
target_link_libraries(password_validator_test gtest gmock gtest_main)
target_compile_features(password_validator_test PUBLIC cxx_std_17)
gtest_discover_tests(password_validator_test)