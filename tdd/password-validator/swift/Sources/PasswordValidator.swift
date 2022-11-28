import Foundation

public struct PasswordValidator {
    public let password: String
    
    internal init(for password: String) {
        self.password = password
    }
    
    public func isValid() -> Bool {
        hasValidCount() && hasAtLeastOneUppercaseLetter() && hasAtLeastOneLowercaseLetter() && hasAtLeastOneNumber() && containsAnUnderscore()
    }

    private func hasValidCount() -> Bool {
        password.count > 8
    }

    private func hasAtLeastOneUppercaseLetter() -> Bool {
        password.rangeOfCharacter(from: .uppercaseLetters) != nil
    }

    private func hasAtLeastOneLowercaseLetter() -> Bool {
        password.rangeOfCharacter(from: .lowercaseLetters) != nil
    }

    private func hasAtLeastOneNumber() -> Bool {
        password.rangeOfCharacter(from: .decimalDigits) != nil
    }

    private func containsAnUnderscore() -> Bool {
        password.contains("_")
    }
}
