package com.example.teloculture

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.runtime.Composable
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.example.teloculture.ui.DetailsArticle

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}

@Composable
fun MyApp() {
    val navController = rememberNavController()
    NavHost(navController = navController, startDestination = "HomePage") {
        composable("catalogue") { catalogue(navController) }
        composable("login") { login(navController) }
        composable("HomePage") { HomePage(navController) }
        composable("DetailsArticle") { DetailsArticle(navController) }

    }
}
