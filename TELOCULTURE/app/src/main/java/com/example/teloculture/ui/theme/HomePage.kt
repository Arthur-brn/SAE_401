package com.example.teloculture

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController

@Composable
fun HomePage(navController: NavController) {
    LazyColumn(
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
            .padding(16.dp)
    ) {
        item {
            SectionTitle("La littérature", Color.Red)
        }
        item {
            CategoriesRow()
        }
        item {
            SectionTitle("Livres populaires", Color.Blue)
        }
        item {
            BooksRow()
        }
        item {
            MoreButton("Voir plus")
        }
        item {
            SectionTitle("Le cinéma", Color.Red)
        }
        item {
            CinemaSection()
        }
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
            contentColor = Color.Blue
        ),
        modifier = Modifier.padding(vertical = 8.dp)
    ) {
        Text(text)
    }
}

@Composable
fun CinemaSection() {
    Box(
        modifier = Modifier
            .fillMaxWidth()
            .background(Color(0xFFE0F7FA))
            .padding(16.dp)
    ) {
        Column {
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
            Image(
                painter = painterResource(id = R.drawable.imgbook), // Replace with your actual drawable resource ID
                contentDescription = null,
                contentScale = ContentScale.Crop,
                modifier = Modifier.fillMaxWidth()
            )
        }
    }
}
