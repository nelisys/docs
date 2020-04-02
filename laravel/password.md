# Password

## Reset Password

- User click "Forgot Password"
- Fill out a form with their email address.
- Prepare a unique token (hash) and associate it with the user's accoun (table: password_resets, column: token)
- Send an email with a unique link back to our site that confirms email ownership.
- Link back to website, confirm the token, and set a new password.
