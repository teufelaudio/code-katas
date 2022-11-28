import Foundation

public struct PasswordValidator {
    public let password: String
    
    internal init(for password: String) {
        self.password = password
    }
    
    public func isValid() -> Bool {
        let isCountValid = password.count > 8
        var isUppercased = false
        password.forEach { char in
            if char.isUppercase { isUppercased = true }
        }

        var isLowercase = false
        isLowercase = password.rangeOfCharacter(from: .lowercaseLetters) != nil

        let isNumber = password.rangeOfCharacter(from: .decimalDigits) != nil

        return isCountValid && isUppercased && isLowercase && isNumber
    }
}
