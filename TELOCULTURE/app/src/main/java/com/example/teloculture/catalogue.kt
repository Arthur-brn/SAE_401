package com.example.teloculture

import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.grid.GridCells
import androidx.compose.foundation.lazy.grid.LazyVerticalGrid
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController

@Composable
fun catalogue(navController: NavController) {
    val categories = listOf("Arts", "Biography", "Romance", "Thriller", "Fiction", "Crime", "Movies")
    val books = List(6) { "Fashionopolis" }

    Column {
        Text("Les catégories", fontSize = 24.sp, modifier = Modifier.padding(16.dp))
        LazyRow(
            modifier = Modifier.padding(horizontal = 16.dp, vertical = 8.dp)
        ) {
            items(categories) { category ->
                Text(category, modifier = Modifier.padding(8.dp))
            }
        }
        LazyVerticalGrid(
            columns = GridCells.Fixed(2),
            modifier = Modifier.padding(16.dp)
        ) {
            items(books.size) { index ->
                BookItem(books[index])
            }
        }
    }
}

@Composable
fun BookItem(book: String) {
    Card(modifier = Modifier
        .fillMaxWidth()
        .padding(8.dp)) {
        Column(modifier = Modifier.padding(16.dp)) {
            Text(book)
            Text("Dana Thomas")
        }
    }
}
