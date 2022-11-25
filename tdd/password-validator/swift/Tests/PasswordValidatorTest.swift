import XCTest
@testable import PasswordValidator

final class PasswordValidatorTest: XCTestCase {
    func testChangeMe() throws {
        let validator = PasswordValidator()
        XCTAssertTrue(validator.changeMe())
    }
}
