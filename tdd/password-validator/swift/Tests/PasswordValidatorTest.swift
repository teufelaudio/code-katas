import XCTest
@testable import PasswordValidator

final class PasswordValidatorTest: XCTestCase {
    private let validPassword = "AAAAAAA8_b"
    private let validPasswordForStrategy2 = "AAAAAA8a"

    let strategy2 = ValidationStrategy(characterCount: 6,
                                      characterSets: .uppercaseLetters,
                                      .lowercaseLetters,
                                      .decimalDigits)

    func testAtLeastEightCharactersFails() {
        // given
        let sut = PasswordValidator(for: "1234567A")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testAtLeastEightCharactersSuccess() {
        // given
        let sut = PasswordValidator(for: validPassword)

        // then
        XCTAssertTrue(sut.isValid())
    }
    
    func testContainsACapitalLetterFails() {
        // given
        let sut = PasswordValidator(for: "12345678a")

        // then
        XCTAssertFalse(sut.isValid())
    }
    
    func testContainsACapitalLetterSuccess() {
        // given
        let sut = PasswordValidator(for: validPassword)

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testContainsALowercaseLetterFails() {
        // given
        let sut = PasswordValidator(for: "12345678A")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testContainsALowercaseLetterSuccess() {
        // given
        let sut = PasswordValidator(for: validPassword)

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testContainsANumberFails() {
        // given
        let sut = PasswordValidator(for: "AAAAAAAAAAa")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testContainsANumberSuccess() {
        // given
        let sut = PasswordValidator(for: validPassword)

        // then
        XCTAssertTrue(sut.isValid())
    }
    
    func testContainsAUnderscoreFails() {
        // given
        let sut = PasswordValidator(for: "12345678Ab")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testContainsAUnderscoreSuccess() {
        // given
        let sut = PasswordValidator(for: validPassword)

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testPasswordLengthOf10IsRequired() {
        // given
        let strategy = ValidationStrategy(characterCount: 10)
        let sut = PasswordValidator(for: "AAAAAAA8_bABCD", validationStrategy: strategy)

        // then
        XCTAssertTrue(sut.isValid())
    }

    func testValidationStragegy2Success() {
        // given
        let sut = PasswordValidator(for: validPasswordForStrategy2, validationStrategy: strategy2)

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
