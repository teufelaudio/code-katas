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
        
        return isCountValid && isUppercased
    }
}
