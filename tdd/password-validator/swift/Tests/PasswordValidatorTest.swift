import XCTest
@testable import PasswordValidator

final class PasswordValidatorTest: XCTestCase {

    func testAtLeastEightCharactersFails() {
        // given
        let sut = PasswordValidator(for: "1234567A")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testAtLeastEightCharactersSuccess() {
        // given
        let sut = PasswordValidator(for: "1234567bA")

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
        let sut = PasswordValidator(for: "1234567bA")

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
        let sut = PasswordValidator(for: "12345678Ab")

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
        let sut = PasswordValidator(for: "AAAAAAA8b")

        // then
        XCTAssertTrue(sut.isValid())
    }
}
