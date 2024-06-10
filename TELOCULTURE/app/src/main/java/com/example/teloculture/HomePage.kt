package com.example.teloculture

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.items
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.geometry.Offset
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import com.example.teloculture.ui.theme.TELOCULTURETheme

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
                SectionTitle("La littérature", Color(0xFFFF625C))
            }
            item {
                CategoriesRow()
            }
            item {
                SectionTitle("Livres populaires", Color(0xFF6887F6))
            }
            item {
                BooksRow()
            }
            item {
                MoreButton("Voir plus")
            }
            item {
                SectionTitle("Le cinéma", Color(0xFFFF625C))
            }
            item {
                CinemaSection()
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
fun CategoriesRow() {
    val categories = listOf(
        "Roman", "Poésie", "Fantastique", "Magazine", "Actualité"
    )
    LazyRow(
        modifier = Modifier.padding(vertical = 8.dp)
    ) {
        items(categories) { category ->
            Column(
                horizontalAlignment = Alignment.CenterHorizontally,
                modifier = Modifier.padding(horizontal = 8.dp)
            ) {
                Image(
                    painter = painterResource(id = R.drawable.imgbook), // Replace with your actual drawable resource ID
                    contentDescription = null,
                    contentScale = ContentScale.Crop,
                    modifier = Modifier
                        .size(80.dp)
                        .background(Color.LightGray)
                )
                Text(text = category)
            }
        }
    }
}
@Composable
fun BooksRow() {
    val books = List(6) { "Fashionopolis" }

    LazyRow {
        items(books) { book ->
            Books(book)
        }
    }
}
@Composable
fun Books(book: String) {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier.padding(8.dp)
    ) {
        Image(
            painter = painterResource(id = R.drawable.imgbook), // Replace with your actual drawable resource ID
            contentDescription = null,
            contentScale = ContentScale.Crop,
            modifier = Modifier.size(120.dp)
        )
        Text(text = book)
        Text(text = "Dana Thomas")
    }
}
@Composable
fun MoreButton(text: String) {
    Button(
        onClick = { /* Handle click */ },
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
fun CinemaSection() {
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
                MoreButton("Voir plus")
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
