package com.example.teloculture

import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.navigation.NavHostController
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import com.example.teloculture.ui.DetailsArticle

@Composable
fun MyApp(navController: NavHostController) {
    // Conteneur global de l'application
    Column {
        // Espace pour le contenu de la page principale
        Box(modifier = Modifier.weight(1f)) {
            // Affiche le contenu de la page actuelle en fonction de la navigation
            NavHost(navController = navController, startDestination = "HomePage") {
                composable("HomePage") { HomePage(navController) }
                composable("catalogue") { catalogue(navController) }
                composable("login") { login(navController) }
                composable("DetailsArticle") { DetailsArticle(navController) }
                composable("ProfilePage") { ProfilePage(navController) }
                // Ajoutez d'autres destinations de navigation au besoin
            }
        }
        // Barre de navigation en bas
        BottomNavigationBar(navController)
    }
}
