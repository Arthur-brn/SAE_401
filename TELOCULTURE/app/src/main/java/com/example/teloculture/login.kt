package com.example.teloculture

import android.content.Context
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

@Composable
fun login(navController: NavController) {
    var mail by remember { mutableStateOf("") }
    var password by remember { mutableStateOf("") }
    var context = LocalContext.current

    Box(
        modifier = Modifier
            .fillMaxSize()
    ) {
        Image(
            painter = painterResource(id = R.drawable.connection),
            contentDescription = null,
            contentScale = ContentScale.Crop,
            modifier = Modifier.fillMaxSize()
        )

        Box(
            modifier = Modifier
                .fillMaxSize()
        ) {
            Column(
                verticalArrangement = Arrangement.Center,
                horizontalAlignment = Alignment.CenterHorizontally,
                modifier = Modifier
                    .align(Alignment.Center)
                    .padding(16.dp)
            ) {
                Image(
                    painter = painterResource(id = R.drawable.logo),
                    contentDescription = null,
                )
                Text("Bienvenue parmi nous !", fontSize = 32.sp, color = Color.White)
                Text("Retrouver tous vos documents préférés ici", fontSize = 16.sp, color = Color.White)
                Spacer(modifier = Modifier.height(16.dp))
                TextField(
                    value = mail,
                    onValueChange = { mail = it },
                    label = { Text("Email") },
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Text),
                    modifier = Modifier
                        .fillMaxWidth()
                        .padding(8.dp)
                )
                TextField(
                    value = password,
                    onValueChange = { password = it },
                    label = { Text("Mot de passe") },
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
                    modifier = Modifier
                        .fillMaxWidth()
                        .padding(8.dp)
                )
                Spacer(modifier = Modifier.height(16.dp))
                Button(onClick = { handleLogin(mail, password, navController, context)}, modifier = Modifier.padding(8.dp)) {
                    Text("Se connecter")
                }
            }
        }
    }
}

fun handleLogin(mail: String, password: String, navController: NavController, context: Context) {
    val apiService = RetrofitClient.getClient().create(ApiService::class.java)
    val session = SessionManager(context)
    try {
        val response = apiService.login(mail, password).enqueue(object : Callback<LoginResponse> {
            override fun onResponse(call: Call<LoginResponse>, response: Response<LoginResponse>) {
                if (response.isSuccessful) {
                    val loginResponse = response.body()
                    if (loginResponse != null && loginResponse.success) {
                        session.saveToken(loginResponse.firstName
                            +"|"+
                            loginResponse.lastName
                            +"|"+
                            loginResponse.email
                            +"|"+
                            loginResponse.phone)
                        navController.navigate("ProfilePage")
                    } else {
                        println("Erreur de connexion: ${loginResponse?.message ?: "Réponse invalide"}")
                    }
                } else {
                    println("Erreur: ${response.code()}")
                }
            }

            override fun onFailure(call: Call<LoginResponse>, t: Throwable) {
                println("Erreur de connexion: ${t.message}")
            }
        })
    } catch (e: Exception) {
        println("Exception: ${e.message}")
    }
}

