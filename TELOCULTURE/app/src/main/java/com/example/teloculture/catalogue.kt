package com.example.teloculture

import android.util.Log
import androidx.compose.foundation.Image
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.grid.GridCells
import androidx.compose.foundation.lazy.grid.LazyVerticalGrid
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
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

@Composable
fun catalogue(navController: NavController) {
    val categories = listOf("Livre", "Cinéma", "Romance", "Thriller", "Fiction", "Crime")
    val books = List(6) { "Fashionopolis" }

    Column {
        Text("Les catégories", fontSize = 24.sp, modifier = Modifier.padding(16.dp))
        LazyRow(
            modifier = Modifier.padding(horizontal = 16.dp, vertical = 8.dp)
        ) {
            items(categories) { category ->
                Button(
                    onClick = { selectedCategory = category },
                    colors = ButtonDefaults.buttonColors(
                        containerColor = if (selectedCategory == category) Color.Gray else Color.LightGray,
                        contentColor = Color.Black
                    ),
                    modifier = Modifier.padding(4.dp)
                ) {
                    Text(category)
                }
            }
        }
        LazyVerticalGrid(
            columns = GridCells.Fixed(2),
            modifier = Modifier.padding(16.dp)
        ) {
            items(books.size) { index ->
                BookItem(book = books[index]) {
                    navController.navigate("DetailsArticle")
                }
            }
        }
    }
}

@Composable
fun BookItem(book: String, author: String, picture: String, onClick: () -> Unit) {
    Card(
        modifier = Modifier
            .fillMaxWidth()
            .padding(8.dp)
            .clickable(onClick = onClick) // Rendre la Card cliquable
    ) {
        val imgName = picture.split('.')[0]
        val img = getResourceId(name = imgName)
        Column(modifier = Modifier.padding(16.dp)) {
            Image(
                painter = painterResource(id = img),
                contentDescription = "Image du livre",
                modifier = Modifier.size(120.dp),
                contentScale = ContentScale.Crop
            )
            Spacer(modifier = Modifier.height(8.dp))
            Text(book)
            Text(author)
        }
    }
}
