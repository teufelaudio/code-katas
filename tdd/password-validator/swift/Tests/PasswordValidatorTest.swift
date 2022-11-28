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
        let sut = PasswordValidator(for: "12345678A")

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
        let sut = PasswordValidator(for: "12345678A")

        // then
        XCTAssertTrue(sut.isValid())
    }
}
