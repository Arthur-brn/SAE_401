package com.example.teloculture

import android.util.Log
import androidx.compose.foundation.Image
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.grid.GridCells
import androidx.compose.foundation.lazy.grid.LazyVerticalGrid
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
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
                BookItem(book = books[index].title, author= books[index].author, picture=books[index].picture) {
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
