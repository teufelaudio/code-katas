import XCTest
@testable import PasswordValidator

final class PasswordValidatorTest: XCTestCase {

    func testAtLeastEightCharactersFails() {
        // given
        let sut = PasswordValidator(for: "1234567")

        // then
        XCTAssertFalse(sut.isValid())
    }

    func testAtLeastEightCharactersSuccess() {
        // given
        let sut = PasswordValidator(for: "12345678")

        // then
        XCTAssertTrue(sut.isValid())
    }
}
