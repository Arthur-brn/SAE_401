package com.example.teloculture

import android.content.Context

import android.content.SharedPreferences


class SessionManager(private val context: Context) {
    private val pref: SharedPreferences
    private val editor: SharedPreferences.Editor

    init {
        pref = context.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE)
        editor = pref.edit()
    }

    fun saveToken(token: String?) {
        pref.edit().putString(KEY_TOKEN, token).apply()
    }

    val token: String?
        get() = pref.getString(KEY_TOKEN, "")
    val isLoggedIn: Boolean
        get() = token != ""// Vérifie si un token est présent

    fun logout() {
        editor.remove(KEY_TOKEN)
        editor.apply()
    }

    companion object {
        private const val PREF_NAME = "MyAppPrefs"
        private const val KEY_TOKEN = "token"
    }
}
