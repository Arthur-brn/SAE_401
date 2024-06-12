package com.example.teloculture

import androidx.compose.foundation.layout.size
import androidx.compose.material3.Icon
import androidx.compose.material3.NavigationBar
import androidx.compose.material3.NavigationBarItem
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.unit.dp
import androidx.navigation.NavController

@Composable
fun BottomNavigationBar(navController: NavController) {
    val session = SessionManager(context = LocalContext.current)
    NavigationBar(
        containerColor = Color.White,
        contentColor = Color.Black
    ) {
        NavigationBarItem(
            icon = {
                Icon(
                    painter = painterResource(id = R.drawable.home),
                    contentDescription = null,
                    modifier = Modifier.size(24.dp) // Ajuster la taille de l'icône
                )
            },
            label = { Text("Accueil") },
            selected = true,
            onClick = { navController.navigate("HomePage") }
        )
        NavigationBarItem(
            icon = {
                Icon(
                    painter = painterResource(id = R.drawable.inventory),
                    contentDescription = null,
                    modifier = Modifier.size(24.dp) // Ajuster la taille de l'icône
                )
            },
            label = { Text("Catalogue") },
            selected = false,
            onClick = { navController.navigate("catalogue") }
        )
        NavigationBarItem(
            icon = {
                Icon(
                    painter = painterResource(id = R.drawable.user_male),
                    contentDescription = null,
                    modifier = Modifier.size(24.dp) // Ajuster la taille de l'icône
                )
            },
            label = { Text("Profil") },
            selected = false,
            onClick = {
                if(session.isLoggedIn){
                    navController.navigate("ProfilePage")
                }
                else{
                    navController.navigate("login")
                }
            } // Correct page name should be "ProfilePage"
        )
    }
}
