package com.example.teloculture

data class LoginResponse(
    val success: Boolean,
    val message: String,
    val firstName: String?,
    val lastName: String?,
    val email: String?,
    val phone: String?
)

