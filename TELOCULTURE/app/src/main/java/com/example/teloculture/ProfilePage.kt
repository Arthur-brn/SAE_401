package com.example.teloculture

import android.util.Log
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

@Composable
fun ProfilePage(navController: NavController) {
    val session = SessionManager(LocalContext.current)
    val user = session.token
    Column(
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
            .padding(16.dp)
    ) {
        TopBar()
        Spacer(modifier = Modifier.height(16.dp))
        ProfileHeader(user)
        Spacer(modifier = Modifier.height(16.dp))
        ProfileContent(user)
        Spacer(modifier = Modifier.height(16.dp))
    }
}

@Composable
fun ProfileHeader(user: String?) {

    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier.fillMaxWidth()
    ) {
        Image(
            painter = painterResource(id = R.drawable.user), // Remplacez par l'ID de l'image de profil
            contentDescription = "Image de profil",
            modifier = Modifier
                .size(100.dp)
                .clip(CircleShape)
                .background(Color.Gray),
            contentScale = ContentScale.Crop
        )
        Spacer(modifier = Modifier.height(8.dp))
        if (user != null) {
            Text(
                text = user.split('|')[0],
                fontSize = 24.sp,
                fontWeight = FontWeight.Bold
            )
        }
        if (user != null) {
            Text(
                text = user.split('|')[2],
                fontSize = 24.sp,
                fontWeight = FontWeight.Bold
            )
        }
    }
}

@Composable
fun ProfileContent(user: String?) {
    Column(
        modifier = Modifier.fillMaxWidth()
    ) {
        ProfileSection(title = "Informations personnelles")
        if (user != null) {
            ProfileItem(label = "Nom complet", value = user.split('|')[0]+" "+user.split('|')[1])
        }
        if (user != null) {
            ProfileItem(label = "Email", value = user.split('|')[2])
        }
        if (user != null) {
            ProfileItem(label = "Téléphone", value = user.split('|')[3])
        }

        Spacer(modifier = Modifier.height(16.dp))

        ProfileSection(title = "Préférences")
        ProfileItem(label = "Notifications", value = "Activées")
        ProfileItem(label = "Langue", value = "Français")
    }
}

@Composable
fun ProfileSection(title: String) {
    Text(
        text = title,
        fontSize = 18.sp,
        fontWeight = FontWeight.Bold,
        modifier = Modifier.padding(vertical = 8.dp)
    )
}

@Composable
fun ProfileItem(label: String, value: String) {
    Row(
        modifier = Modifier
            .fillMaxWidth()
            .padding(vertical = 8.dp),
        horizontalArrangement = Arrangement.SpaceBetween
    ) {
        Text(
            text = label,
            fontSize = 16.sp,
            fontWeight = FontWeight.Normal
        )
        Text(
            text = value,
            fontSize = 16.sp,
            fontWeight = FontWeight.Normal,
            color = Color.Gray
        )
    }
}
