import Foundation

public struct PasswordValidator {
    public let password: String
    
    internal init(for password: String) {
        self.password = password
    }
    
    public func isValid() -> Bool {
        hasValidCount &&
        hasACharacter(from: .uppercaseLetters) &&
        hasACharacter(from: .lowercaseLetters) &&
        hasACharacter(from: .decimalDigits) &&
        hasACharacter(from: CharacterSet(arrayLiteral: "_"))
    }
}

extension PasswordValidator {

    private var hasValidCount: Bool {
        password.count > 8
    }

    private func hasACharacter(from characterSet: CharacterSet) -> Bool {
        password.rangeOfCharacter(from: characterSet) != nil
    }
}
