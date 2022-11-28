import XCTest
@testable import PasswordValidator

final class PasswordValidatorTest: XCTestCase {
    let strategy2 = ValidationStrategy(characterCount: 6,
                                       characterSets: .uppercaseLetters, .lowercaseLetters, .decimalDigits)
}

// Mark: - Strategy 1, different length

extension PasswordValidatorTest {

    func testValidPasswordForStrategy1() {
        // given
        let sut = PasswordValidator(for: "AAAAAAA8_b")

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testAtLeastEightCharactersFails() {
        // given
        let sut = PasswordValidator(for: "1234567A")

        // then
        XCTAssertFalse(sut.isValid())
    }


    func testContainsACapitalLetterFails() {
        // given
        let sut = PasswordValidator(for: "12345678a")

        // then
        XCTAssertFalse(sut.isValid())
    }
    
    func testContainsALowercaseLetterFails() {
        // given
        let sut = PasswordValidator(for: "12345678A")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testContainsANumberFails() {
        // given
        let sut = PasswordValidator(for: "AAAAAAAAAAa")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testContainsAUnderscoreFails() {
        // given
        let sut = PasswordValidator(for: "12345678Ab")

        // then
        XCTAssertFalse(sut.isValid())
    }
}

// Mark: - Strategy 1, different length

extension PasswordValidatorTest {

    func testPasswordLengthOf10IsRequired() {
        // given
        let strategy = ValidationStrategy(characterCount: 10)
        let sut = PasswordValidator(for: "AAAAAAA8_bABCD", validationStrategy: strategy)

        // then
        XCTAssertTrue(sut.isValid())
    }
}

// Mark: - Strategy 2

extension PasswordValidatorTest {

    func testValidationStragegy2Success() {
        // given
        let sut = PasswordValidator(for: "AAAAAA8a", validationStrategy: strategy2)

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testValidationStragegy2Failure() {
        XCTAssertFalse(PasswordValidator(for: "AAAA8a", validationStrategy: strategy2).isValid())
        XCTAssertFalse(PasswordValidator(for: "AAAAAA8A", validationStrategy: strategy2).isValid())
        XCTAssertFalse(PasswordValidator(for: "aaaaaa8a", validationStrategy: strategy2).isValid())
        XCTAssertFalse(PasswordValidator(for: "aaaaaaAA", validationStrategy: strategy2).isValid())
    }
}
