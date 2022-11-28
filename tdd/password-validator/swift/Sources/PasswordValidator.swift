public struct PasswordValidator {
    public let password: String

    internal init(for password: String) {
        self.password = password
    }

    public func isValid() -> Bool {
        password.count > 8
    }
}
