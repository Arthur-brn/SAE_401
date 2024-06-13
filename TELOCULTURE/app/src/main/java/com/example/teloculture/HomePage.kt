package com.example.teloculture

import android.annotation.SuppressLint
import android.util.Log
import androidx.annotation.DrawableRes
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.items
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.foundation.shape.RoundedCornerShape
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
import androidx.compose.ui.geometry.Offset
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.graphics.painter.Painter
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import coil.compose.rememberImagePainter
import com.example.teloculture.ui.theme.TELOCULTURETheme
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.IOException

@Composable
fun HomePage(navController: NavController) {
    Column(modifier = Modifier.fillMaxSize()) {
        LazyColumn(
            modifier = Modifier
                .weight(1f)
                .background(Color.White)
                .padding(16.dp)
        ) {
            item {
                TopBar()
            }
            item {
                SectionTitle("Les catégories selon les ressources", Color(0xFFFF625C))
            }
            item {
                CategoriesRow(navController)
            }
            item {
                SectionTitle("Livres populaires", Color(0xFF6887F6))
            }
            item {
                BooksRow()
            }
            item {
                MoreButton("Voir plus", navController)
            }
            item {
                SectionTitle("Le cinéma", Color(0xFFFF625C))
            }
            item {
                CinemaSection(navController)
            }
        }
    }
}

@Composable
fun TopBar() {
    Row(
        modifier = Modifier
            .fillMaxWidth()
            .padding(horizontal = 16.dp, vertical = 8.dp), // Ajout de padding
        horizontalArrangement = Arrangement.Center,
        verticalAlignment = Alignment.CenterVertically
    ) {
        Image(
            painter = painterResource(id = R.drawable.logo), // Remplacez par votre logo
            contentDescription = null,
            modifier = Modifier.size(75.dp) // Ajuster la taille du logo
        )
    }
}

@Composable
fun SectionTitle(title: String, color: Color) {
    Text(
        text = title,
        fontSize = 24.sp,
        color = color,
        modifier = Modifier.padding(vertical = 8.dp)
    )
}

@Composable
fun CategoriesRow(navController: NavController) {
    val categories = listOf(
        "Livre", "Cinéma", "Fantastique", "Actualité", "Poésie"
    )
    val categoryImages = listOf(
        R.drawable.livre, // Remplacez par les IDs de vos ressources drawable
        R.drawable.cinema,
        R.drawable.fantastique,
        R.drawable.actualite,
        R.drawable.poesie
    )

    LazyRow(
        modifier = Modifier.padding(vertical = 8.dp)
    ) {
        items(categories.zip(categoryImages)) { (category, image) ->
            Column(
                horizontalAlignment = Alignment.CenterHorizontally,
                modifier = Modifier
                    .padding(horizontal = 8.dp)
                    .clickable { navController.navigate("catalogue") }
            ) {
                Box(
                    modifier = Modifier
                        .size(80.dp)
                        .clip(CircleShape) // Rond
                        .background(Color.LightGray)
                        .border(1.dp, Color.Gray, CircleShape) // Bordure grise
                ) {
                    Image(
                        painter = painterResource(id = image), // Utilise l'image spécifique de la catégorie
                        contentDescription = null,
                        contentScale = ContentScale.Crop,
                        modifier = Modifier.size(80.dp)
                    )
                }
                Text(text = category)
            }
        }
    }
}

@Composable
fun BooksRow() {
    // Déclarer books en dehors de onResponse
    var books by remember { mutableStateOf<List<Book>>(emptyList()) }

    val apiService = RetrofitClient.getClient().create(ApiService::class.java)
    val call = apiService.getBooks()

    call.enqueue(object : Callback<List<Book>> {
        override fun onResponse(call: Call<List<Book>>, response: Response<List<Book>>) {
            if (response.isSuccessful) {
                // Mettre à jour books lorsque la réponse est réussie
                books = response.body() ?: emptyList()
            }
        }

        override fun onFailure(call: Call<List<Book>>, t: Throwable) {
            Log.e("Error", t.message ?: "An error occurred")
        }
    })

    // Utiliser books dans LazyRow
    LazyRow {
        items(books) { book ->
            Books(book)
        }
    }
}


@SuppressLint("DiscouragedApi")
@Composable
fun Books(book: Book) {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier.padding(8.dp)
    ) {
        val imgName = book.picture.split('.')[0]
        val img = getResourceId(name = imgName)
        Image(
            painter = painterResource(id = img),
            contentDescription = null,
            contentScale = ContentScale.Crop,
            modifier = Modifier.size(120.dp)
        )
        Text(text = book.title)
        Text(text = book.author)
    }
}


@Composable
fun getResourceId(name: String): Int {
    val context = LocalContext.current // Remplacez MyApp.context par votre contexte d'application

    // Obtenez l'ID de ressource de l'image à partir de son nom dans le dossier drawable
    return context.resources.getIdentifier(name, "drawable", context.packageName)
}

@Composable
fun MoreButton(text: String, navController: NavController) {
    Button(
        onClick = { navController.navigate("catalogue") },
        colors = ButtonDefaults.buttonColors(
            containerColor = Color.Transparent,
            contentColor = Color(0xFF6887F6)
        ),
        modifier = Modifier
            .padding(vertical = 8.dp)
            .border(width = 1.dp, color = Color(0xFF6887F6), shape = RoundedCornerShape(4.dp))
    ) {
        Text(text)
    }
}

@Composable
fun CinemaSection(navController: NavController) {
    val gradient = Brush.linearGradient(
        colors = listOf(
            Color(0xFFFFE5E5),
            Color(0xFFF5FFFE),
            Color(0xFFFFFFFF),
        ),
        start = Offset.Zero, // Début du dégradé (coin en haut à gauche)
        end = Offset.Infinite, // Fin du dégradé (coin en bas à droite)
    )
    Box(
        modifier = Modifier
            .fillMaxWidth()
            .background(brush = gradient) // Appliquer le dégradé en tant que background
            .padding(16.dp)
    ) {
        Row(
            modifier = Modifier.fillMaxWidth(),
            verticalAlignment = Alignment.CenterVertically
        ) {
            Column(
                modifier = Modifier.weight(1f)
            ) {
                Text(
                    text = "Les dernières sorties en DVD !",
                    fontSize = 18.sp,
                    color = Color.Blue
                )
                Text(
                    text = "Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et.",
                    fontSize = 14.sp,
                    color = Color.Gray,
                    modifier = Modifier.padding(vertical = 8.dp)
                )
                MoreButton("Voir plus", navController)
            }
            Spacer(modifier = Modifier.width(16.dp)) // Ajout d'un Spacer pour l'espacement
            Image(
                painter = painterResource(id = R.drawable.imgbook), // Remplacez par l'ID de votre image
                contentDescription = null,
                contentScale = ContentScale.Crop,
                modifier = Modifier.fillMaxHeight() // La hauteur maximale de l'image
            )
        }
    }
}
