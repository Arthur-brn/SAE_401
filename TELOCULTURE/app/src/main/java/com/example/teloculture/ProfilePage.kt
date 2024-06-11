package com.example.teloculture

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController

@Composable
fun ProfilePage(navController: NavController) {
    Column(
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
            .padding(16.dp)
    ) {
        TopBar()
        Spacer(modifier = Modifier.height(16.dp))
        ProfileHeader()
        Spacer(modifier = Modifier.height(16.dp))
        ProfileContent()
        Spacer(modifier = Modifier.height(16.dp))
    }
}

@Composable
fun ProfileHeader() {
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
        Text(
            text = "Nom de l'utilisateur",
            fontSize = 24.sp,
            fontWeight = FontWeight.Bold
        )
        Text(
            text = "email@example.com",
            fontSize = 16.sp,
            color = Color.Gray
        )
    }
}

@Composable
fun ProfileContent() {
    Column(
        modifier = Modifier.fillMaxWidth()
    ) {
        ProfileSection(title = "Informations personnelles")
        ProfileItem(label = "Nom complet", value = "Nom de l'utilisateur")
        ProfileItem(label = "Email", value = "email@example.com")
        ProfileItem(label = "Téléphone", value = "+33 123 456 789")

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
