import Foundation

public struct ValidationStrategy {
    public let characterCount: Int

    public init(characterCount: Int) {
        self.characterCount = characterCount
    }
}

public struct PasswordValidator {
    public let password: String
    private let strategy: ValidationStrategy
    
    internal init(for password: String, validationStrategy: ValidationStrategy = ValidationStrategy(characterCount: 8)) {
        self.password = password
        self.strategy = validationStrategy
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
        password.count > strategy.characterCount
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
