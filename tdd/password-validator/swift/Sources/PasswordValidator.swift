import Foundation

public struct PasswordValidator {
    public let password: String
    
    internal init(for password: String) {
        self.password = password
    }
    
    public func isValid() -> Bool {
        hasValidCount &&
        hasAtLeastOneUppercaseLetter &&
        hasAtLeastOneLowercaseLetter &&
        hasAtLeastOneNumber &&
        containsAnUnderscore
    }
}

extension PasswordValidator {

    private var hasValidCount: Bool {
        password.count > 8
    }

    private var hasAtLeastOneUppercaseLetter: Bool {
        password.rangeOfCharacter(from: .uppercaseLetters) != nil
    }

    private var hasAtLeastOneLowercaseLetter: Bool {
        password.rangeOfCharacter(from: .lowercaseLetters) != nil
    }

    private var hasAtLeastOneNumber: Bool {
        password.rangeOfCharacter(from: .decimalDigits) != nil
    }

    private var containsAnUnderscore: Bool {
        password.contains("_")
    }
}
