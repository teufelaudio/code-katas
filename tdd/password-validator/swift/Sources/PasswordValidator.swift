import Foundation

public struct PasswordValidator {
    public let password: String
    
    internal init(for password: String) {
        self.password = password
    }
    
    public func isValid() -> Bool {
        hasValidCount &&
        hasACharacter(from: .uppercaseLetters,
                      .lowercaseLetters,
                      .decimalDigits,
                      .init(arrayLiteral: "_"))
    }
}

extension PasswordValidator {
    
    private var hasValidCount: Bool {
        password.count > 8
    }
    
    private func hasACharacter(from characterSet: CharacterSet...) -> Bool {
        for set in characterSet {
            guard password.rangeOfCharacter(from: set) != nil else {
                return false
            }
        }
        return true
    }
}
