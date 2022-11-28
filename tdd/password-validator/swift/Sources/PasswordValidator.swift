import Foundation

public struct ValidationStrategy {
    public let characterCount: Int
    public let characterSets: [CharacterSet]

    public init(characterCount: Int, characterSets: CharacterSet...) {
        self.characterCount = characterCount
        self.characterSets = characterSets.compactMap { $0 }
    }
}

public struct PasswordValidator {
    public let password: String
    private let strategy: ValidationStrategy
    
    internal init(for password: String,
                  validationStrategy: ValidationStrategy = ValidationStrategy(
                    characterCount: 8,
                    characterSets: .uppercaseLetters,
                    .lowercaseLetters,
                    .decimalDigits,
                    .init(arrayLiteral: "_"))) {
                        self.password = password
                        self.strategy = validationStrategy
                    }
    
    public func isValid() -> Bool {
        hasValidCount &&
        hasACharacter(from: strategy.characterSets)
    }
}

extension PasswordValidator {
    
    private var hasValidCount: Bool {
        password.count > strategy.characterCount
    }
    
    private func hasACharacter(from characterSet: [CharacterSet]) -> Bool {
        for set in characterSet {
            guard password.rangeOfCharacter(from: set) != nil else {
                return false
            }
        }
        return true
    }
}
